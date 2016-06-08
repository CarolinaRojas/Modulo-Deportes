<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {                
    return view('welcome');
});

Route::get('uno', function () {                
    return 'welcome';
});

Route::get('/deportista','DeportistaController@datos');
Route::get('/personaDeportista/{id}','PersonaDeportistaController@obtener');
Route::get('/personaBuscarDeportista/{id}','PersonaDeportistaController@buscar');
Route::get('/personaDeportistaDatos/{id}','PersonaDeportistaController@InformacionDeportia');




Route::get('/personas', '\Idrd\Usuarios\Controllers\PersonaController@index');
Route::get('/personas/service/obtener/{id}', '\Idrd\Usuarios\Controllers\PersonaController@obtener');
Route::get('/personas/service/ciudad/{id_pais}', 'Controllers\LocalizacionController@buscarCiudades');
Route::post('/personas/service/procesar/', '\Idrd\Usuarios\Controllers\PersonaController@procesar');
Route::get('/service/buscar/{key}', '\Idrd\Usuarios\Controllers\PersonaController@buscar');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
