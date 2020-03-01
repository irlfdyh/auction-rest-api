<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function(){

    // Society CRUD operation
    Route::resource('society', 'SocietyController', [
        'only' => ['update', 'show', 'index']
    ]);

    // Officier CRUD operation
    Route::resource('officer', 'OfficerController', [
        'only' => ['update', 'show', 'index']
    ]);

    // Stuff CRUD operation
    Route::resource('stuff', 'StuffController', [
        'except' => ['create', 'edit']
    ]);

    // Category CRUD operation
    Route::resource('category', 'CategoryController', [
        'except' => ['create', 'edit']
    ]);

    // Level Test
    Route::resource('level', 'LevelController', [
        'only' => ['index']
    ]);

    // Auction
    Route::resource('auction', 'AuctionController', [
        'except' => ['create', 'edit']
    ]);

    // Society following the auction
    Route::resource('biding', 'BiddersController', [
        'only' => ['store']
    ]);
});

Route::group(['prefix' => 'auth'], function() {

    // Creating new user
    Route::post('register', 'AuthController@register');

    // user sign in
    Route::post('signin', 'AuthController@signin');

});
