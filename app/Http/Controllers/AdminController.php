<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genres;
use App\Http\Requests\CreateArtistRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        return view('admin/index')->with(['ButtonText' => 'Add artist']);
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Artiesten/bands" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function ListArtist()
    {
        $artists = Artist::all();

        return view('admin/artist/list')->with(['artists' => $artists]);
    }

    /**
     * @param $id
     * @return $this
     */
    public function ShowArtist($id)
    {
        $artist = Artist::findOrFail($id);
//dd($artist);
        return view('admin/artist/show')->with(['artist' => $artist]);
    }

    /**
     * @return $this
     */
    public function Artist()
    {
        return view('admin/artist/Add')->with(['ButtonText' => 'Artist toevoegen']);
    }

    /**
     * @param CreateArtistRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddArtist(CreateArtistRequest $request)
    {
        $input= $request->all();

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

        Artist::create($input_Artist);

        //genre section

        $AllGenres_object = Genres::all();
        $genres = explode(', ',$input['Genre']);

        foreach($genres as $genre)
        {
            if (!property_exists($AllGenres_object, $genre))
            {
                $genre_array = ['name' => $genre];
                Genres::create($genre_array);
            }
        }

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Evenementen" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function ListEvenement()
    {
        return view('admin/evenement/list');
    }

    /**
     * @return $this
     */
    public function Evenement()
    {
        return view('admin/evenement/Add')->with(['ButtonText' => 'Evenement toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddEvenement()
    {
        Evenement::create(Request::all());

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Genre" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listGenre()
    {
        return view('admin/genre/list');
    }

    /**
     * @return $this
     */
    public function Genre()
    {
        return view('admin/genre/Add')->with(['ButtonText' => 'Genre toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddGenre()
    {
        Genre::create(Request::all());

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "News" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listNews()
    {
        return view('admin/news/list');
    }

    /**
     * @return $this
     */
    public function News()
    {
        return view('admin/news/Add')->with(['ButtonText' => 'News toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddNews()
    {
        News::create(Request::all());

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Sponsor" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listSponsor()
    {
        return view('admin/sponsor/list');
    }

    /**
     * @return $this
     */
    public function Sponsor()
    {
        return view('admin/sponsor/Add')->with(['ButtonText' => 'Sponsor toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddSponsor()
    {
        Sponsor::create(Request::all());

        return redirect('/admin');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Stages" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function listStages()
    {
        return view('admin/stages/list');
    }

    /**
     * @return $this
     */
    public function Stages()
    {
        return view('admin/stages/Add')->with(['ButtonText' => 'Podia toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddStages()
    {
        Sponsor::create(Request::all());

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
