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

    // Create and Update user data
    Route::resource('user', 'AuthController', [
        'only' => ['store', 'update'] 
    ]);

    // user sign in
    Route::post('signin', 'AuthController@signin');

});
