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

Route::get('fumetti/ruolo/create', 'RuoloController@create')->name('ruolo.create');
Route::post('fumetti/ruolo/store', 'RuoloController@store')->name('ruolo.store');
Route::get('fumetti/ruolo', 'RuoloController@index')->name('ruolo.index');
