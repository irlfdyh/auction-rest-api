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

    // User CRUD operation
    Route::resource('user', 'UserController', [
        // 'create', 'edit', 'delete' isn't need.
        'except' => ['create', 'edit', 'destroy']
    ]);

    // Officier CRUD operation
    Route::resource('officer', 'OfficerController', [
        'except' => ['create', 'edit', 'destroy']
    ]);

    // Stuff CRUD operation
    Route::resource('stuff', 'StuffController', [
        'except' => ['create', 'edit']
    ]);

    // Category CRUD operation
    Route::resource('category', 'CategoryController', [
        'except' => ['create', 'edit']
    ]);

    Route::resource('level', 'LevelController', [
        'only' => ['index']
    ]);
});
