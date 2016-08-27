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

Route::get('login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::post('login', ['as' => 'login.auth', 'uses' => 'UserController@auth']);

Route::get('signup', ['as' => 'signup', 'uses' => 'UserController@signup']);
Route::post('signup', ['as' => 'signup.store', 'uses' => 'UserController@store']);

Route::get('/books', ['as' => 'books', 'uses' => 'BooksController@index']);
Route::get('/books/{id}', ['as' => 'books.show', 'uses' => 'BooksController@show']);