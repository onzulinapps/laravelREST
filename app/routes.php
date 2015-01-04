<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello');
});
Route::resource('usuarios', 'UsuariosController');
//ruta para el servicio RESTFul registro de usuarios
Route::group(array('prefix' => '/api/rest'), function()
{
    //Route::resource('photos', 'PhotoController');
    Route::resource('users', 'UsuariosRestController');
    //Route::resource('categories', 'CategoryController');

});
//login para la parte del servicio REST de login de Smartphone y Windows 8.1
//Route::group(array('prefix' => '/api/rest'), function()
//{
    Route::get('login', 'AuthController@showLogin'); // Mostrar login
    Route::post('login', 'AuthController@postLogin'); // Verificar datos
    Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
    Route::get('login', 'AuthController@index'); // mostrar los usuarios por json
//});