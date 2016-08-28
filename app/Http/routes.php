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

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function () {
    Route::get('/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@index']);

    Route::group(['prefix' => 'books'], function () {
    	Route::get('/', ['as' => 'admin.books', 'uses' => 'AdminBooksController@index']);
    	Route::get('/create', ['as' => 'admin.books.create', 'uses' => 'AdminBooksController@create']);

    	Route::get('/{id}', ['as' => 'admin.books.show', 'uses' => 'AdminBooksController@show']);
    	
    	Route::post('/edit/{id}', ['as' => 'admin.books.update', 'uses' => 'AdminBooksController@edit']);
    	Route::post('/store', ['as' => 'admin.books.store', 'uses' => 'AdminBooksController@store']);
    	
    	Route::delete('/{id}', ['as' => 'admin.books.delete', 'uses' => 'AdminBooksController@destroy']);
    });
    
    Route::group(['prefix' => 'members'], function () {
        Route::get('/', ['as' => 'admin.users', 'uses' => 'AdminMembersController@index']);
        Route::get('/create', ['as' => 'admin.users.create', 'uses' => 'AdminMembersController@create']);

        Route::get('/{id}', ['as' => 'admin.users.show', 'uses' => 'AdminMembersController@show']);
        
        Route::post('/edit/{id}', ['as' => 'admin.users.update', 'uses' => 'AdminMembersController@edit']);
        Route::post('/store', ['as' => 'admin.users.store', 'uses' => 'AdminMembersController@store']);
        
        Route::delete('/{id}', ['as' => 'admin.users.delete', 'uses' => 'AdminMembersController@destroy']);
    });

});