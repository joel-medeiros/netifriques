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
    return view('welcome');
});


Route::group(['middleware'=>'web'], function (){

    Route::auth();

    Route::group(['as' =>'movies', 'prefix' => 'movies'], function(){
        Route::get('/', 'MoviesController@index');
        Route::post('/', 'MoviesController@index');
    });

    Route::get('/home', 'HomeController@index');

});


Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api', 'throttle:10'], function () {
    Route::get('/', 'PeopleController@index');
    Route::get('/{id}', 'PeopleController@show');
    Route::post('/add', 'PeopleController@store');
    Route::put('/update/{id}', 'PeopleController@update');
    Route::delete('/delete/{id}', 'PeopleController@destroy');
});
