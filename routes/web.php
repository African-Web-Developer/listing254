<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile/{username}', ['uses'=>'UserDetailsController@show','middleware'=>'auth']);

Route::get('/search', ['uses'=>'ItemsController@search' ,'as'=>'search']);

Route::post('/reviews', ['uses'=>'ItemsController@createReviews' ,'as'=>'review.create']);

Route::resource('items', 'ItemsController');
Route::resource('cats', 'CatsController');
Route::resource('comments', 'CommentsController');