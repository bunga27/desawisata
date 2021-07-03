<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'RedirectIfAuthenticatedController');
Auth::routes();
Route::group(['Ceklevel'=>'super'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/dataadmin', 'userkontrol');
    Route::resource('/wisata', 'wisatakontrol');
    Route::resource('/event', 'eventkontrol');
    Route::resource('/ulasan', 'ulasankontrol');
    Route::resource('/gambar', 'gambarkontrol');
    Route::get('/wisata/{id}/galeri', 'wisatakontrol@galeri');
    Route::get('/galeriok', 'gambarkontrol@back');


    Route::post('/wisata', 'wisatakontrol@store');
    Route::get('/wisata/create', 'wisatakontrol@create');
    Route::get('/wisata', 'wisatakontrol@index');
    Route::get('/wisata/{wisata}/edit', 'wisatakontrol@edit');
    Route::patch('/wisata/{wisata}', 'wisatakontrol@update');
    Route::delete('/wisata/{wisata}', 'wisatakontrol@destroy');

});



