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
Route::get('ruolo/{id_ruolo}/elimina-form', 'RuoloController@ruoloEliminaForm')->name('ruolo.elimina_form');
Route::post('ruolo/{id_ruolo}/elimina-execute', 'RuoloController@ruoloEliminaExecute')->name('ruolo.elimina_execute');

Route::get('editore/create', 'EditoreController@create')->name('editore.create');
Route::post('editore/store', 'EditoreController@store')->name('editore.store');
Route::get('editore', 'EditoreController@index')->name('editore.index');
Route::get('editore/{id_editore}/edit', 'EditoreController@edit')->name('editore.edit');
Route::post('editore/{id_editore}/update', 'EditoreController@update')->name('editore.update');
Route::get('editore/{id_editore}/elimina-form', 'EditoreController@editoreEliminaForm')->name('editore.elimina_form');
Route::post('editore/{id_editore}/elimina-execute', 'EditoreController@editoreEliminaExecute')->name('editore.elimina_execute');

Route::get('autore/create', 'AutoreController@create')->name('autore.create');
Route::post('autore/store', 'AutoreController@store')->name('autore.store');
Route::get('autore', 'AutoreController@index')->name('autore.index');
Route::get('autore/{id_autore}/edit', 'AutoreController@edit')->name('autore.edit');
Route::post('autore/{id_autore}/update', 'AutoreController@update')->name('autore.update');
Route::get('autore/{id_autore}/elimina-form', 'AutoreController@autoreEliminaForm')->name('autore.elimina_form');
Route::post('autore/{id_autore}/elimina-execute', 'AutoreController@autoreEliminaExecute')->name('autore.elimina_execute');

Route::get('titolo/{id_titolo}/aggiungi-autore', 'RelTitoloAutoreRuoloController@aggiungiAutore')->name('titolo.aggiungi_autore');
Route::post('titolo/{id_titolo}/store-autore', 'RelTitoloAutoreRuoloController@storeAutore')->name('titolo.store_autore');
Route::get('titolo/{id_titolo}/autori', 'RelTitoloAutoreRuoloController@index')->name('titolo.autore');
Route::get('titolo/{id_titolo}/{id_autore}/services/get-ruoli-json', 'RelTitoloAutoreRuoloController@getRuoliJson')->name('titolo.get_ruoli_json');
Route::get('titolo/elimina-autore-form/{id_titolo}/{id_autore}', 'RelTitoloAutoreRuoloController@eliminaAutoreForm')->name('titolo.elimina_autore_form');
Route::post('titolo/elimina-autore-execute/{id_titolo}/{id_autore}', 'RelTitoloAutoreRuoloController@eliminaAutoreExecute')->name('titolo.elimina_autore_execute');

Route::get('titolo/create', 'TitoloController@create')->name('titolo.create');
Route::post('titolo/store', 'TitoloController@store')->name('titolo.store');
Route::get('titolo', 'TitoloController@index')->name('titolo.index');
Route::get('titolo/{id_titolo}/edit', 'TitoloController@edit')->name('titolo.edit');
Route::post('titolo/{id_titolo}/update', 'TitoloController@update')->name('titolo.update');
Route::get('titolo/{id_titolo}/elimina-form', 'TitoloController@titoloEliminaForm')->name('titolo.elimina_form');
Route::post('titolo/{id_titolo}/elimina-execute', 'TitoloController@titoloEliminaExecute')->name('titolo.elimina_execute');

Route::get('collana/create', 'CollanaController@create')->name('collana.create');
Route::post('collana/store', 'CollanaController@store')->name('collana.store');
Route::get('collana', 'CollanaController@index')->name('collana.index');
Route::get('collana/{id_collana}/edit', 'CollanaController@edit')->name('collana.edit');
Route::post('collana/{id_collana}/update', 'CollanaController@update')->name('collana.update');
Route::get('collana/{id_collana}/elimina-form', 'CollanaController@collanaEliminaForm')->name('collana.elimina_form');
Route::post('collana/{id_collana}/elimina-execute', 'CollanaController@collanaEliminaExecute')->name('collana.elimina_execute');

Route::get('albo/create', 'AlboController@create')->name('albo.create');
Route::post('albo/store', 'AlboController@store')->name('albo.store');
Route::get('albo', 'AlboController@index')->name('albo.index');
Route::get('albo/{id_albo}/edit', 'AlboController@edit')->name('albo.edit');
Route::post('albo/{id_albo}/update', 'AlboController@update')->name('albo.update');
Route::get('albo/{id_albo}/elimina-form', 'AlboController@alboEliminaForm')->name('albo.elimina_form');
Route::post('albo/{id_albo}/elimina-execute', 'AlboController@alboEliminaExecute')->name('albo.elimina_execute');