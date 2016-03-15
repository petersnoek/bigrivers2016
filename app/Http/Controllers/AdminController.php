<?php

namespace App\Http\Controllers;

use App\Artist;
use Request;

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
        return view('admin/index');
    }

//    ------------------------------------------------------------------------------------------------------
//    Vanaf hier begint de sectie waar alle onderdelen van "Artiesten/bands" word behandeld en verwerkt.

    /**
     * @return $this
     */
    public function ListArtist()
    {
        return view('admin/artist/list');
    }

    /**
     * @return $this
     */
    public function Artist()
    {
        return view('admin/artist/Add')->with(['ButtonText' => 'Artist toevoegen']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddArtist()
    {
        $input= Request::all();

        $upload_dir = '/pictures/';
        for($index=1; $index<=3; $index++)
        {
            if(isset($input['press_photo'.$index]))
            {
                list($img_check,) = explode("/", $input['press_photo'.$index]->getClientMimeType());
                ${"name" .$index} = $input['press_photo'.$index]->getClientoriginalName();
                ${"name" .$index} .= time('Hms');
                ${"md5ed_img_name" . $index} = md5(${"name" .$index});

                $input['press_photo'.$index] = $upload_dir.${"md5ed_img_name" . $index}.'.jpg';
            }
            else
            {
                $input['press_photo'.$index] = null;
            }
        }
        dd($input);
        Artist::create($input);

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
}
