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
Route::get('/admin/artist/{id}/show/', 'AdminController@ShowArtist');
Route::get('/admin/artist/add/', 'AdminController@ViewAddFormArtist');
Route::post('/admin/artist/add/', 'AdminController@AddArtist');
Route::get('/admin/artist/{id}/edit/', 'AdminController@ViewEditFormArtist');
Route::post('/admin/artist/{id}/edit/', 'AdminController@EditArtist');

Route::get('/admin/event/', 'AdminController@listEvent');
Route::get('/admin/artist/{id}/show/', 'AdminController@ShowArtist');
Route::get('/admin/event/add/', 'AdminController@ViewAddFormEvent');
Route::post('/admin/event/add/', 'AdminController@AddEvent');
Route::get('/admin/event/{id}/edit/', 'AdminController@ViewEditFormEvent');
Route::post('/admin/event/{id}/edit/', 'AdminController@EditEvent');

Route::get('/admin/news/', 'AdminController@listNews');
Route::get('/admin/news/{id}/show/', 'AdminController@ShowNews');
Route::get('/admin/news/add/', 'AdminController@ViewAddFormNews');
Route::post('/admin/news/add/', 'AdminController@AddNews');
Route::get('/admin/news/{id}/edit/', 'AdminController@ViewEditFormNews');
Route::post('/admin/news/{id}/edit/', 'AdminController@EditNews');

Route::get('/admin/sponsor/', 'AdminController@listSponsor');
Route::get('/admin/sponsor/{id}/show/', 'AdminController@ShowSponsor');
Route::get('/admin/sponsor/add/', 'AdminController@ViewAddFormSponsor');
Route::post('/admin/sponsor/add/', 'AdminController@AddSponsor');
Route::get('/admin/sponsor/{id}/edit/', 'AdminController@ViewEditFormSponsor');
Route::post('/admin/sponsor/{id}/edit/', 'AdminController@EditSponsor');

Route::get('/admin/stage/', 'AdminController@listStage');
Route::get('/admin/stage/{id}/show/', 'AdminController@ShowStage');
Route::get('/admin/stage/add/', 'AdminController@ViewAddFormStage');
Route::post('/admin/stage/add/', 'AdminController@AddStage');
Route::get('/admin/stage/{id}/edit/', 'AdminController@ViewEditFormStage');
Route::post('/admin/stage/{id}/edit/', 'AdminController@EditStage');

Route::get('/admin/performance/', 'AdminController@listPerformance');
Route::get('/admin/performance/{id}/show/', 'AdminController@ShowPerformance');
Route::get('/admin/performance/add/', 'AdminController@ViewAddFormPerformance');
Route::post('/admin/performance/add/', 'AdminController@AddPerformance');
Route::get('/admin/performance/{id}/edit/', 'AdminController@ViewEditFormPerformance');
Route::post('/admin/performance/{id}/edit/', 'AdminController@EditPerformance');

//----------------------------------------------------------------------------------------
// Routes for contact controller

Route::get('/contact/', 'ContactController@index');

//----------------------------------------------------------------------------------------

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

    // routes for importing eventkit data into bigrivers.nl website
    Route::get('/eventkit/artists', 'ConsumeAPIController@artists_list');
    Route::get('/eventkit/artists/checked', 'ConsumeAPIController@artists_list_checked');
    Route::post('/eventkit/artists', 'ConsumeAPIController@artists_addbatch');


});
