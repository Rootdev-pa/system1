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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/roles', 'PermisoController@Permiso');

Route::group(['middleware' => 'rol:admin'], function() {
    Route::get('/permisos', 'PermisoController@index');
    Route::get('/permiso', 'PermisoController@permisos');
    Route::get('/editrol/{id}', 'PermisoController@editRol');

 });