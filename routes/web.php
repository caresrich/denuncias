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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para las denuncias
Route::get('/getAllDenuncias','denunciasController@getAllDenuncias');
Route::get('/createDenunciaGet','denunciasController@createDenunciaGet');
Route::post('/createDenunciaPost','denunciasController@createDenunciaPost');
Route::get('/detalleDenuncia/{id}','denunciasController@detalleDenuncia');
Route::get('/editarDenunciaGet/{id}','denunciasController@editarDenunciaGet');
Route::post('/editarDenunciaPost','denunciasController@editarDenunciaPost');
Route::post('/buscarDenuncia','denunciasController@buscarDenuncia');

//rutas para los reportes
Route::get('/reporteGeneral','reportesController@reporteGeneral');
Route::get('/reportePdfFechaIngreso','reportesController@reportePdfFechaIngreso');
Route::get('/reportePdfGeneral','reportesController@reportePdfGeneral');

Route::get('/reporteDistrito','reportesController@reporteDistrito');
Route::get('/reportePdfFechaDistrito','reportesController@reportePdfFechaDistrito');
Route::get('/reportePdfAllDistrito','reportesController@reportePdfAllDistrito');

Route::get('/reporteFalta','reportesController@reporteFalta');
Route::get('/reportePdfFechaFalta','reportesController@reportePdfFechaFalta');
Route::get('/reportePdfAllFalta','reportesController@reportePdfAllFalta');
