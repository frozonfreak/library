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
    return Redirect::to('/books');
});

//AUTH
//

Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'UserController@login']);
Route::post('auth/login','UserController@auth');

Route::get('auth/signup', ['as' => 'auth.signup', 'uses' => 'UserController@signup']);
Route::post('auth/signup', ['as' => 'auth.signup.store', 'uses' => 'UserController@store']);

Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

Route::get('/books', ['as' => 'books', 'uses' => 'BooksController@index']);
Route::get('/books/{id}', ['as' => 'books.show', 'uses' => 'BooksController@show']);


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'UserDashboardController@index']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'UserDashboardController@index']);
});