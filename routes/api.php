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

    // Masyarakat
    Route::resource('masyarakat', 'MasyarakatController', [
        // karena tidak membutuhkan tampilan create dan edit tidak dibutuhkan
        'except' => ['create', 'edit']
    ]);

    // Petugas
    Route::resource('petugas', 'PetugasController', [
        'except' => ['create', 'edit']
    ]);

    // Barang
    Route::resource('barang', 'BarangController', [
        'except' => ['create', 'edit']
    ]);
});
