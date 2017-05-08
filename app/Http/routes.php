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

// Api Group Routes
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api', 'throttle:10'], function () {

    // List all people
    Route::get('/', 'PeopleController@index');

    // Show a person by id
    Route::get('/{id}', 'PeopleController@show');

    // Add a new person
    Route::post('/add', 'PeopleController@store');

    // Update a person by id
    Route::put('/update/{id}', 'PeopleController@update');

    // Delete a person by Id
    Route::delete('/delete/{id}', 'PeopleController@destroy');
});
