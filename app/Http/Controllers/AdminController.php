<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Events;
use App\Genres;
use App\Genresrelationtoartist;
use App\Newsitems;
use App\Performance;
use App\Sponsor;
use App\Stages;

use App\Http\Requests;
use App\Http\Requests\ArtistRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\PerformanceRequest;
use App\Http\Requests\SponsorRequest;
use App\Http\Requests\StageRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    public function index(Request $request)
    {
        $message = $request->session()->get('message');
        
        return view('admin/index')->with(['message' => $message]);
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Artiesten/bands" word behandeld en verwerkt.

    /**
     * @param $id
     * @return $this
     */
    public function ShowArtist($id)
    {
        $artist = Artist::findOrFail($id);
        return view('admin/artist/show')->with(['artist' => $artist]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function ListArtist(Request $request)
    {
        $artists = Artist::all();

        $message = $request->session->get('message');

        return view('admin/artist/list')->with(['artists' => $artists]);        
    }

    /**
     * @return $this
     */
    public function ViewAddFormArtist()
    {
        return view('admin/artist/Add')->with(['ButtonText' => 'Artist toevoegen']);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormArtist($id)
    {
        $output = Artist::findOrFail($id);
//        dd($output);
        return view('admin/artist/edit')->with(['ButtonText' => 'Artist bijwerken', 'output' => $output]);
    }

    /**
     * @param ArtistRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddArtist(ArtistRequest $request)
    {
        $input = $request->all();
        
        $upload_dir = 'pictures/';
        for($index=1; $index<=3; $index++)
        {
            //artist section
            if(isset($input['press_photo'.$index]))
            {
                list($img_check,) = explode("/", $input['press_photo'.$index]->getClientMimeType());
                ${"name" .$index} = $input['press_photo'.$index]->getClientoriginalName();
                ${"name" .$index} .= time('Hms');
                ${"md5ed_img_name" . $index} = md5(${"name" .$index});

                $save = "".$upload_dir.${"md5ed_img_name" . $index}.".jpeg"; //This is the new file you saving
                $file = $_FILES['press_photo'.$index]['tmp_name']; //This is the original file

                list($width, $height) = getimagesize($file) ;

                $tn = imagecreatetruecolor($width, $height) ;
                $image = $this->imageCreateFromAny($file);
                imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

                imagejpeg($tn, $save, 70) ;

                $input['press_photo'.$index] = $upload_dir.${"md5ed_img_name" . $index}.'.jpeg';
            }
            else
            {
                $input['press_photo'.$index] = null;
            }
        }
        $input_Artist = $input;

        $artist_id = Artist::create($input_Artist)->id;

        //genre section

        $AllGenres_object = Genres::all();
        $genres = explode(', ',$input['Genre']);

        foreach($genres as $genre)
        {
            if (!property_exists($AllGenres_object, $genre))
            {
                $genre_array = ['name' => $genre];

                $genre_id = Genres::create($genre_array)->id;

                $genre_relation_ids = array (
                    "genre_id"  => $genre_id,
                    "artist_id" => $artist_id,
                );

                Genresrelationtoartist::create($genre_relation_ids);
            }
        }
        return redirect('/admin');
    }

    /**
     * @param ArtistRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function EditArtist($id, ArtistRequest $request)
    {
        $Artist= Artist::findOrFail($id);
        $input = $request->all();

        $upload_dir = 'pictures/';
        for($index=1; $index<=3; $index++)
        {
            //artist section
            if(isset($input['press_photo'.$index]))
            {
                list($img_check,) = explode("/", $input['press_photo'.$index]->getClientMimeType());
                ${"name" .$index} = $input['press_photo'.$index]->getClientoriginalName();
                ${"name" .$index} .= time('Hms');
                ${"md5ed_img_name" . $index} = md5(${"name" .$index});

                $save = "".$upload_dir.${"md5ed_img_name" . $index}.".jpeg"; //This is the new file you saving
                $file = $_FILES['press_photo'.$index]['tmp_name']; //This is the original file

                list($width, $height) = getimagesize($file) ;

                $tn = imagecreatetruecolor($width, $height) ;
                $image = $this->imageCreateFromAny($file);
                imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

                imagejpeg($tn, $save, 70) ;

                $input['press_photo'.$index] = $upload_dir.${"md5ed_img_name" . $index}.'.jpeg';
            }
            else
            {
                $input['press_photo'.$index] = null;
            }
        }

        $input_Artist = $input;

        $Artist->update($input_Artist);

        //genre section

        $AllGenres_object = Genres::all();
        $genres = explode(', ',$input['Genre']);

        foreach($genres as $genre)
        {
            if (!property_exists($AllGenres_object, $genre))
            {
                $genre_array = ['name' => $genre];

                if (Genres::where('name', '=', $genre_array)->exists()) {
                }
                else
                {
                    Genres::Create($genre_array);
                }

            }
        }

        return redirect('/admin/artist/');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Evenementen" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function ListEvent()
    {
        $Events = Events::all();
        return view('admin/event/list')->with(['Events' => $Events]);
    }

    /**
     * @return $this
     */
    public function ViewAddFormEvent()
    {
        return view('admin/event/Add')->with(['ButtonText' => 'Artist toevoegen']);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormEvent($id)
    {
        $output = Events::findOrFail($id);
//        dd($output);
        return view('admin/event/edit')->with(['ButtonText' => 'Evenement bijwerken', 'output' => $output]);
    }

    /**
     * @param EventRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddEvent(EventRequest $request)
    {
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file) ;

            $tn = imagecreatetruecolor($width, $height) ;
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

            imagejpeg($tn, $save, 70) ;

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        Events::create($input);

        return redirect('/admin');
    }

    /**
     * @param EventRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function EditEvent(EventRequest $request, $id)
    {
        $events= Events::findOrFail($id);
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file) ;

            $tn = imagecreatetruecolor($width, $height) ;
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

            imagejpeg($tn, $save, 70) ;

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        $events->update($input);

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "News" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listNews()
    {
        $Newsitems = Newsitems::all();
        return view('admin/news/list')->with(['Newsitems' => $Newsitems]);
    }

    /**
     * @return $this
     */
    public function ViewAddFormNews()
    {
        return view('admin/news/Add')->with(['ButtonText' => 'Nieuws toevoegen']);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormNews($id)
    {
        $output = Newsitems::findOrFail($id);
//        dd($output);
        return view('admin/news/edit')->with(['ButtonText' => 'Nieuws bijwerken', 'output' => $output]);
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddNews(NewsRequest $request)
    {
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file);

            $tn = imagecreatetruecolor($width, $height);
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);

            imagejpeg($tn, $save, 70);

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        Newsitems::create($input);

        return redirect('/admin');
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse|Redirector
     */
    public function EditNews(NewsRequest $request, $id)
    {
        $Newsitems = Newsitems::findOrFail($id);
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file);

            $tn = imagecreatetruecolor($width, $height);
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);

            imagejpeg($tn, $save, 70);

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        $Newsitems->update($input);

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Sponsor" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listSponsor()
    {
        $Sponsors = Sponsor::all();
        return view('admin/sponsor/list')->with(['Sponsors' => $Sponsors]);
    }

    /**
     * @return $this
     */
    public function ViewAddFormSponsor()
    {
        return view('admin/sponsor/Add')->with(['ButtonText' => 'Sponser toevoegen']);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormSponsor($id)
    {
        $output = Sponsor::findOrFail($id);
//        dd($output);
        return view('admin/sponsor/edit')->with(['ButtonText' => 'Sponser bijwerken', 'output' => $output]);
    }

    /**
     * @param SponsorRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddSponsor(SponsorRequest $request)
    {
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file) ;

            $tn = imagecreatetruecolor($width, $height) ;
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

            imagejpeg($tn, $save, 70) ;

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        Sponsor::create($input);

        return redirect('/admin');
    }

    /**
     * @param SponsorRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function EditSponsor(SponsorRequest $request, $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $input= $request->all();

        $upload_dir = 'pictures/';

        if(isset($input['image']))
        {
            list($img_check,) = explode("/", $input['image']->getClientMimeType());
            $name = $input['image']->getClientoriginalName();
            $name .= time('Hms');
            $md5ed_img_name = md5($name);

            $save = $upload_dir.$md5ed_img_name.".jpeg"; //This is the new file you saving
            $file = $_FILES['image']['tmp_name']; //This is the original file

            list($width, $height) = getimagesize($file) ;

            $tn = imagecreatetruecolor($width, $height) ;
            $image = $this->imageCreateFromAny($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;

            imagejpeg($tn, $save, 70) ;

            $input['image'] = $upload_dir.$md5ed_img_name.'.jpeg';
        }
        else
        {
            $input['image'] = null;
        }

        $sponsor->update($input);

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Stages" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listStage()
    {
        $Stages = Stages::all();
        return view('admin/stage/list')->with(['Stages' => $Stages]);
    }

    /**
     * @return $this
     */
    public function ViewAddFormStage()
    {
        return view('admin/stage/Add')->with(['ButtonText' => 'Sponser toevoegen']);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormStage($id)
    {
        $output = Stages::findOrFail($id);
//        dd($output);
        return view('admin/stage/edit')->with(['ButtonText' => 'Podia bijwerken', 'output' => $output]);
    }

    /**
     * @param StageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddStage(StageRequest $request)
    {
        Stages::create($request->all());

        return redirect('/admin');
    }

    /**
     * @param StageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function EditStage(StageRequest $request, $id)
    {
        $Stage = Stages::findOrFail($id);
        $Stage->update($request->all());

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "performance" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listPerformance()
    {
        $Preformence = Performance::all();
        return view('admin/performance/list')->with(['performance' => $Preformence]);
    }

    /**
     * @return $this
     */
    public function ViewAddFormPerformance()
    {
        $events = Events::all();
        $artists = Artist::all();
        $stages = Stages::all();

        return view('admin/performance/Add')->with(['ButtonText' => 'Sponser toevoegen', 'events' => $events, 'artists' => $artists, 'stages' => $stages]);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ViewEditFormPerformance($id)
    {
        $output = Performance::findOrFail($id);
//        dd($output);
        return view('admin/performance/edit')->with(['ButtonText' => 'Podia bijwerken', 'output' => $output]);
    }

    /**
     * @param PerformanceRequest $request
     * @return RedirectResponse|Redirector
     */
    public function AddPerformance(PerformanceRequest $request)
    {
        $input = $request->all();

        $start = $input['start_date'];
        $start .= ' '.$input['start_time'];

        $finish = $input['finish_date'];
        $finish .= ' '.$input['finish_time'];

        $input['start'] = $start;
        $input['finish'] = $finish;

        Performance::create($input);

        return redirect('/admin')->with(['message' => 'Optreden toegevoegd']);
    }

    /**
     * @param PerformanceRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function EditPerformance(PerformanceRequest $request, $id)
    {
        $Performance = Performance::findOrFail($id);
        $Performance->update($request->all());

        return redirect('/admin');
    }

    /**
     * @param $filepath
     * @return bool|resource
     */
    public function imageCreateFromAny($filepath)
    {
        $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
        $allowedTypes = array(
            1,  // [] gif
            2,  // [] jpg
            3,  // [] png
            6   // [] bmp
        );
        if (!in_array($type, $allowedTypes)) {
            return false;
        }
        switch ($type) {
            case 1 :
                $im = imageCreateFromGif($filepath);
                break;
            case 2 :
                $im = imageCreateFromJpeg($filepath);
                break;
            case 3 :
                $im = imageCreateFromPng($filepath);
                break;
            case 6 :
                $im = imageCreateFromBmp($filepath);
                break;
        }
        return $im;
    }

}
