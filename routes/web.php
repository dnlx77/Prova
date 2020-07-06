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

Route::get('fumetti/create', 'FumettiController@create')->name('fumetti.create');
Route::post('fumetti/store', 'FumettiController@store')->name('fumetti.store');
Route::get('fumetti', 'FumettiController@index')->name('fumetti.index');
Route::get('fumetti/{id_fumetti}/edit', 'FumettiController@edit')->name('fumetti.edit');
Route::post('fumetti/{id_fumetti}/update', 'FumettiController@update')->name('fumetti.update');

Route::get('ruolo/create', 'RuoloController@create')->name('ruolo.create');
Route::post('ruolo/store', 'RuoloController@store')->name('ruolo.store');
Route::get('ruolo', 'RuoloController@index')->name('ruolo.index');
Route::get('ruolo/{id_autore}/edit', 'RuoloController@edit')->name('ruolo.edit');
Route::post('ruolo/{id_autore}/update', 'RuoloController@update')->name('ruolo.update');

Route::get('autore/create', 'AutoreController@create')->name('autore.create');
Route::post('autore/store', 'AutoreController@store')->name('autore.store');
Route::get('autore', 'AutoreController@index')->name('autore.index');
Route::get('autore/{id_autore}/edit', 'AutoreController@edit')->name('autore.edit');
Route::post('autore/{id_autore}/update', 'AutoreController@update')->name('autore.update');
