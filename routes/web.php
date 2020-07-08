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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ruolo/create', 'RuoloController@create')->name('ruolo.create');
Route::post('ruolo/store', 'RuoloController@store')->name('ruolo.store');
Route::get('ruolo', 'RuoloController@index')->name('ruolo.index');
Route::get('ruolo/{id_ruolo}/edit', 'RuoloController@edit')->name('ruolo.edit');
Route::post('ruolo/{id_ruolo}/update', 'RuoloController@update')->name('ruolo.update');

Route::get('autore/create', 'AutoreController@create')->name('autore.create');
Route::post('autore/store', 'AutoreController@store')->name('autore.store');
Route::get('autore', 'AutoreController@index')->name('autore.index');
Route::get('autore/{id_autore}/edit', 'AutoreController@edit')->name('autore.edit');
Route::post('autore/{id_autore}/update', 'AutoreController@update')->name('autore.update');
<<<<<<< HEAD
=======
Route::get('titolo/{id_titolo}/aggiungi-autore', 'RelTitoloAutoreRuoloController@aggiungiAutore')->name('titolo.aggiungi_autore');
Route::post('titolo/{id_titolo}/store-autore', 'RelTitoloAutoreRuoloController@storeAutore')->name('titolo.store_autore');
>>>>>>> 31470dce5c8f8496b40d5101bb9522f3f440e250

Route::get('titolo/create', 'TitoloController@create')->name('titolo.create');
Route::post('titolo/store', 'TitoloController@store')->name('titolo.store');
Route::get('titolo', 'TitoloController@index')->name('titolo.index');
Route::get('titolo/{id_titolo}/edit', 'TitoloController@edit')->name('titolo.edit');
Route::post('titolo/{id_titolo}/update', 'TitoloController@update')->name('titolo.update');
Route::get('titolo/{id_titolo}/aggiungi-autore', 'RelTitoloAutoreRuoloController@aggiungiAutore')->name('titolo.aggiungi_autore');
