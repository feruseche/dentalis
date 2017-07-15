<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('layouts.inicio');
});

Route::get('/historias.historia','HistoriasController@index');

Route::get('/historias.filtro','HistoriasController@filtro');

Route::name('detalle')->get('/historias/detalle/{id}', 'HistoriasController@show');


Route::get('/odontologos.index','OdontologosController@index');

Route::get('/servicios.index','ServiciosController@index');

Route::get('/servicios.filtro','ServiciosController@filtro');

Route::get('/vademecum.index','VademecumController@index');

Route::get('/vademecum.filtro','VademecumController@filtro');

Route::get('/citas.pacientes', function () {
    return view('citas.pacientes');
});

Route::get('/citas.sms_pacientes', function () {
    return view('citas.sms_pacientes');
});

Route::get('/citas.notificaciones_pacientes', function () {
    return view('citas.notificaciones_pacientes');
});

Route::get('/citas.notificaciones_odontologos', function () {
    return view('citas.notificaciones_odontologos');
});



