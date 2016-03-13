<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ConsumeAPIController extends Controller
{

    public function artists_list()
    {
        // to view raw json response, browse to https://www.eventkit.eu/api/?code=5ecbe48c01e663d9f1f9baa4f27b0da6&part=artiesten
        // call Eventkit json webservice. code=authentication, part=table to receive
        $arguments = array(
            "code"=>"5ecbe48c01e663d9f1f9baa4f27b0da6",
            "part" => "artiesten"
        );
        $result = $this->CallAPI("GET", "https://www.eventkit.eu/api/", $arguments);
        $jsoneventkit = json_decode($result);

        $comparisons = [];
        // loop eventkit results and find matching artists in our database.
        foreach($jsoneventkit as $eventkitrow)
        {
            $c = new Comparison();
            $c->eventkit = $eventkitrow;
            $c->ek_naam = $eventkitrow->naamartiestband;
            $c->ek_updated_at = $eventkitrow->lastupdate;

            $a = DB::table('artists')->where('NameBand',$eventkitrow->naamartiestband)->get();
            $cnt = count($a);
            if ($cnt == 1)
            {
                $c->artist = (object) $a[0];
                $c->at_naam = $c->artist->NameBand;
                $c->at_updated_at = $c->artist->updated_at;
            }
            else
            {
                $c->at_naam = '';
                $c->at_updated_at = '';
            }

            array_push($comparisons, $c);
        }

        return view('eventkit/artists')->with('json', $comparisons )->with('message', 'testmessage');
    }

    // http://bigrivers.nl/eventkit/artist_confirm
    public function artists_confirm()
    {
        echo 'post received';

        //dd($_POST);

        if (isset($_POST['submit'])) {

            // show "updates"
            if (!empty($_POST['update'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['update']);
                echo "Bijwerken " . $checked_count . " artiesten: <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach ($_POST['update'] as $selected) {
                    echo "<p>" . $selected . "</p>";
                }
            }
            // show "inserts"
            if (!empty($_POST['insert'])) {
                // Counting number of checked checkboxes.
                $checked_count = count($_POST['insert']);
                echo "Toevoegen " . $checked_count . " artiesten: <br/>";
                // Loop to store and display values of individual checked checkbox.
                foreach ($_POST['insert'] as $selected) {
                    echo "<p>" . $selected . "</p>";
                }
            }

            return view('eventkit/artists_confirm')->with('json', $comparisons );

        }
    }

    public function artists_process()
    {
        // do the actual database work, set success/fail alert, and redirect to artist sync
        return artists_list("Imported");
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

        switch ($method)
        {
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


}

class Comparison
{
    var $eventkit;
    var $ek_naam;
    var $ek_updated_at;

    var $artist;
    var $at_naam;
    var $at_updated_at;
}
