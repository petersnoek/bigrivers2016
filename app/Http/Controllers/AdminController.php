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
        return view('admin/index')->with(['ButtonText' => 'Add artist']);
    }

    /**
     * @return $this
     */
    public function list()
    {
        return view('admin/index')->with(['ButtonText' => 'Add list.blade.php']);
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
