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

    /**
     * @return $this
     */
    public function listArtist()
    {
        dd();
        return view('admin/Artist/list');
    }

    /**
     * @return $this
     */
    public function Artist()
    {
        return view('admin/AddArtist')->with(['ButtonText' => 'Add artist']);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function AddArtist()
    {
        Artist::create(Request::all());

        return redirect('/admin');
    }
}
