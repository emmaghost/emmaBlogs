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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', 'GeneralController@home');

Route::group(['prefix' => 'articulo'], function() {
Route::get('/generaNuevo', 'ArticuloController@generaNuevo');
Route::get('/modal_create', 'ArticuloController@modal_create');
Route::get('/data_listar_articulos', 'ArticuloController@data_listar_articulos');
Route::get('/data_listar_comentarios/{id_articulo}', 'ArticuloController@data_listar_comentarios');
Route::get('/modal_genera_comentario/{id_articulo}', 'ArticuloController@modal_genera_comentario');
Route::get('/verArticulo/{id}', 'ArticuloController@verArticulo')->middleware('existeArti::id');
Route::get('/editarArticulo/{id}', 'ArticuloController@editarArticulo')->middleware('existeArti::id');
Route::get('/modal_edita_articulo/{id}', 'ArticuloController@modal_edita_articulo')->middleware('existeArti::id');
Route::post('/saveNewArt', 'ArticuloController@saveNewArt');
Route::post('/save_edita_articulo', 'ArticuloController@save_edita_articulo');
Route::post('/guardaComentario', 'ArticuloController@guardaComentario');

});
