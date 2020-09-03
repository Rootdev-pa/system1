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

Route::group(['middleware' => 'rol:admin'], function() {

    //Roles
    Route::get('/roles', 'RolController@index');
    Route::get('/getroles', 'RolController@getRoles');
    Route::post('/crear-rol', 'RolController@store');
    Route::post('/rol/actualizar', 'RolController@update');
    Route::post('/rol/borrar', 'RolController@destroy');

    //Permisos
    Route::get('/permisos', 'PermisoController@index');
    Route::get('/getpermisos', 'PermisoController@getPermisos');
    Route::post('/crear-permiso', 'PermisoController@store');
    Route::post('/permiso/actualizar', 'PermisoController@update');
    Route::post('/permiso/borrar', 'PermisoController@destroy');

 });