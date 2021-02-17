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

Route::get('/', function () {
    return view('home');
});

Route::auth();



Route::get('/home', 'HomeController@index2');

Route::get('/updatepost', 'HomeController@updatepost');

Route::get('/main', 'HomeController@index');

Route::get('/usersposts', 'HomeController@usersposts');

Route::get('/addfriends', 'HomeController@addfriends');

Route::get('/friends','HomeController@friends');

Route::delete('/deletefriends','HomeController@deletefriends');

Route::get('/welcome','HomeController@welcome');

Route::post('/createpost','HomeController@create_post');

Route::post('/addfriend','HomeController@add_friend');

Route::post('/search','HomeController@search');

Route::get('/search_friend', 'HomeController@search_friend');

Route::post('/savepost','HomeController@savepost');



Route::delete('/deleteposts','HomeController@deleteposts');

