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

Route::get('/home', 'DefaultController@index');
Route::get('/', 'DefaultController@index');

Route::get('/login', 'LoginController@index');

//--------------------------------------------------------------------------------------
// Routes for admin controller
Route::get('/admin', 'AdminController@index');

Route::get('/admin/artist/', 'AdminController@listArtist');
Route::get('/admin/artist/show/{id}', 'AdminController@ShowArtist');
Route::get('/admin/artist/add/', 'AdminController@Artist');
Route::post('/admin/artist/add/', 'AdminController@AddArtist');

Route::get('/admin/evenement/', 'AdminController@listEvenement');
Route::get('/admin/evenement/add/', 'AdminController@Evenement');
Route::post('/admin/evenement/add/', 'AdminController@AddEvenement');

Route::get('/admin/news/', 'AdminController@listNews');
Route::get('/admin/news/add/', 'AdminController@News');
Route::post('/admin/news/add/', 'AdminController@News');

Route::get('/admin/sponsor/', 'AdminController@listSponsor');
Route::get('/admin/sponsor/add/', 'AdminController@Sponsor');
Route::post('/admin/sponsor/add/', 'AdminController@AddSponsor');

Route::get('/admin/stages/', 'AdminController@listStagest');
Route::get('/admin/stages/add/', 'AdminController@Stages');
Route::post('/admin/stages/add/', 'AdminController@AddStages');

//----------------------------------------------------------------------------------------
// Routes for contact controller

Route::get('/contact/', 'ContactController@index');

//----------------------------------------------------------------------------------------
// routes for importing eventkit data into bigrivers.nl website
Route::get('/eventkit/artists', 'ConsumeAPIController@artists_list');
Route::post('/eventkit/artists', 'ConsumeAPIController@artists_confirm');
Route::post('/eventkit/artists_process', 'ConsumeAPIController@artists_process');
Route::get('/eventkit/performances', 'ConsumeAPIController@performances');

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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

//    Route::get('/home', 'HomeController@index');
});
