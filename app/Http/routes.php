<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DefaultController@index');
Route::get('/home', 'DefaultController@index');

Route::get('/login', 'LoginController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/artist/', 'AdminController@listArtist');
Route::get('/admin/artist/add/', 'AdminController@AddArtist');
Route::POST('/admin/artist/add/', 'AdminController@AddArtist');

Route::get('/eventkit', 'ConsumeAPIController@eventkit');
Route::get('/html', 'ConsumeAPIController@html');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
