<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $message = $request->session()->get('message');
        
        return view('welcome')->with(['message' => $message]);
    }
}
