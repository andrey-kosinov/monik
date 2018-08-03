<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/test', function () {
    $site = App\Site::find(1);
    $site->checkSiteURL();
});

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/sites', 'SitesController@index');
Route::post('/site', 'SitesController@store');
Route::delete('/site/{site}', 'SitesController@destroy');

