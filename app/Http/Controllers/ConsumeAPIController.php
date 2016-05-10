<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App;
use App\Artist;

class Comparison
{
    var $eventkit;
    var $ek_naam;
    var $ek_id;
    var $ek_updated_at;
    var $ek_short_bio;

    var $artist;
    var $at_naam;
    var $at_id;
    var $at_updated_at;
    var $at_short_bio;

    var $checked = false;
}


class ConsumeAPIController extends Controller
{
    public function artists_list_checked(Request $request, $testmessage = null, $checked = true)
    {
        return $this->artists_list($request, $testmessage = null, true);
    }

    public function artists_list(Request $request, $testmessage = null, $checked = null)
    {
        // call Eventkit json webservice. code=authentication, part=table to receive
        $arguments = array(
            "code" => "5ecbe48c01e663d9f1f9baa4f27b0da6",
            "part" => "artiesten"
        );
        $result = $this->CallAPI("GET", "https://www.eventkit.eu/api/", $arguments);
        $jsoneventkit = json_decode($result);

        $comparisons = [];
        $artists = DB::table('artists')->get();  // get an array with objects

        // loop eventkit results and find matching artists in our database.
        foreach ($jsoneventkit as $eventkitrow) {
            $c = new Comparison();

            if ($checked) $c->checked = true;

            $c->eventkit = $eventkitrow;
            $c->ek_naam = $eventkitrow->naamartiestband;
            $c->ek_id = $eventkitrow->artistid;
            $c->ek_updated_at = $eventkitrow->lastupdate;
            $c->ek_short_bio = $this->first20last20words($eventkitrow->biografie);

            // see if a matching artist can be found in the database
            $a = $this->getObjectByName($artists, $eventkitrow->naamartiestband);
            if (isset($a)) {
                $c->artist = $a;
                $c->at_naam = $a->NameBand;
                $c->at_id = $a->id;
                $c->at_updated_at = $a->updated_at;
                $c->at_short_bio = $this->first20last20words($a->biography);

            } else {
                $c->at_naam = '';
                $c->at_updated_at = '';
            }

            array_push($comparisons, $c);
        }

        // store comparisons in session so it can be used if user confirms
        $request->session()->put('comparisons', $comparisons);

        return view('eventkit/artists')->with('json', $comparisons)->with('message', $testmessage);
    }

    // http://bigrivers.nl/eventkit/artist_confirm
    public function artists_addbatch(Request $request)
    {
        //echo '<h1>confirm</h1>';
        //dd($_POST);

        if (isset($_POST['submit'])) {

            $comparisons = $request->session()->get('comparisons');

            // debug: show all comparisons
            $updatecount = ( isset ( $_POST['update'] ) ? count($_POST['update']) : 0);
            $insertcount = ( isset ( $_POST['insert'] ) ? count($_POST['insert']) : 0);

            if (!empty($_POST['update'])) {

                foreach ($_POST['update'] as $selected) {
                    $comparison = $this->getComparisonById($comparisons, $selected);
                    $a = Artist::findOrFail($comparison->at_id);

                    $a->update([
                        'biography' => $comparison->eventkit->biografie,
                        'press_photo1' => $comparison->eventkit->persfoto1,
                        'press_photo2' => $comparison->eventkit->persfoto2,
                        'press_photo3' => $comparison->eventkit->persfoto3,
                        'website_url' => $comparison->eventkit->website,
                        'youtube_url' => $comparison->eventkit->youtube,
                        'facebook_url' => $comparison->eventkit->facebook,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            if (!empty($_POST['insert'])) {
                foreach ($_POST['insert'] as $selected) {
                    $comparison = $this->getComparisonById($comparisons, $selected);
                    DB::table('artists')->insert([
                        'NameBand' => $comparison->eventkit->naamartiestband,
                        'biography' => $comparison->eventkit->biografie,
                        'press_photo1' => $comparison->eventkit->persfoto1,
                        'press_photo2' => $comparison->eventkit->persfoto2,
                        'press_photo3' => $comparison->eventkit->persfoto3,
                        'website_url' => $comparison->eventkit->website,
                        'youtube_url' => $comparison->eventkit->youtube,
                        'facebook_url' => $comparison->eventkit->facebook,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            // remove $comparisons from session
            $request->session()->forget('comparisons');

            $message = $insertcount . '  artiesten gemaakt, ' . $updatecount . ' artiesten bijgewerkt.';

            return $this->artists_list($request, $message);

        }
    }

    public function getObjectByName($array, $searchterm)
    {
        foreach ($array as $row) {
            if ($row->NameBand == $searchterm) return $row;
        }
        return NULL;
    }

    public function getComparisonById($array, $searchterm)
    {
        foreach ($array as $row) {
            if ($row->ek_id == $searchterm) return $row;
        }
        return NULL;
    }

    public function performances()
    {
        // to view raw json response, browse to https://eventkit.eu/api/?code=5ecbe48c01e663d9f1f9baa4f27b0da6&part=programma
    }


    // Method: POST, PUT, GET etc
    // Data: array("param" => "value") ==> index.php?param=value
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }


    public function first20last20words($text)
    {
        $words = [];
        $pos = [];
        $out = '';

        if (str_word_count($text, 0) > 20) {
            // return associative array
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $out = substr($text, 0, $pos[20]) . ' ... ';
        }

        $wordcount = sizeof($words);
        if (str_word_count($text, 0) > 40) {
            $out = $out . substr($text, $pos[$wordcount - 20], $pos[$wordcount - 1]);
        }

        return $out;
    }
}

