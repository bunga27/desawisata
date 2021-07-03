<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    });

//Route::get('berita', 'Api\BeritaController@index');
//Route::get('berita', 'Api\BeritaController@index');

    Route::apiResource('wisata', 'Api\WisataController')->names([
            'index' => 'wisata-api.index',
    ])->only(['index']);
    Route::get('wisata/{kategori}' , 'Api\WisataController@getKategori');


    Route::apiResource('event', 'Api\EventController')->names([
        'index' => 'event-api.index',
    ])->only(['index']);
    Route::get('event/{kategori}' , 'Api\EventController@getKategori');

    Route::apiResource('ulasan', 'Api\UlasanController')->names([
            'index' => 'ulasan-api.index',
            'store' => 'ulasan-api.store',
    ])->only(['index', 'store']);

    Route::get('ulasan/{wisata_id}' , 'Api\UlasanController@getUlasan');

    Route::apiResource('ulasansatuan/{wisata_id}', 'Api\UlasansatuanController')->names([
        'index' => 'ulasansatuan-api.index',
    ])->only(['index']);

