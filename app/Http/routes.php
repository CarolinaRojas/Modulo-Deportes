<?php
session_start();
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


Route::get('/personaDeportista/{id}','PersonaDeportistaController@obtener');
Route::get('/personaBuscarDeportista/{id}','PersonaDeportistaController@buscar');
Route::get('/personaDeportistaDatos/{id}','PersonaDeportistaController@InformacionDeportia');


Route::get('/personas', '\Idrd\Usuarios\Controllers\PersonaController@index');
Route::get('/personas/service/obtener/{id}', '\Idrd\Usuarios\Controllers\PersonaController@obtener');
Route::get('/personas/service/ciudad/{id_pais}', 'Controllers\LocalizacionController@buscarCiudades');
Route::post('/personas/service/procesar/', '\Idrd\Usuarios\Controllers\PersonaController@procesar');
Route::get('/personas/service/buscar/{key}', '\Idrd\Usuarios\Controllers\PersonaController@buscar');


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
Route::any('/', 'DeportistaController@show');
Route::any('/logout', 'DeportistaController@logout');

Route::group(['middleware' => ['web']], function () {    
    
    Route::get('DatosDeportista','DeportistaController@index');
    Route::get('deportista/{id}','DeportistaController@datos');
    Route::get('entrenador/{id}','DeportistaController@datosEntrenador');    
    Route::get('Dentrenadores/{id}','DeportistaController@deportistaEntrenadores');    
    Route::get('getDeportes/{id}', 'DeportistaController@getDeporte');
    Route::get('getModalidades/{id}', 'DeportistaController@getModalidad');
    
    
    Route::get('getEtapasNac/{id_tipo_etapa_nac}', 'DeportistaController@getEtapasNac');    
    Route::get('getEtapasInter/{id_tipo_etapa_inter}', 'DeportistaController@getEtapasInter');    
    
    
    Route::get('getTallas/{id_genero}/{id_tipo}', 'DeportistaController@getTallas');    
    Route::get('getOnlyTalla/{id}', 'DeportistaController@getOnlyTalla');    
    
    Route::get('HEtapa/{id}','DeportistaController@HistorialEtapa');    
    Route::post('AddImagen/{id}','DeportistaController@AgregarImagen'); 
    Route::resource('AddDatos', 'DeportistaController');
    Route::post('EditDatos/{id}', 'DeportistaController@update');
    Route::resource('AddDeportiva', 'DeportistaController');    
    Route::post('EditDeportiva/{id}', 'DeportistaController@storeDeportiva');    
    Route::resource('AddEstimulo','DeportistaController@AgregarEstimulo');
    
    /***************RUTAS PARA REPORTES******************/
    Route::get('HistorialIndividual/{id}/{inicio}','ReportesController@HistorialIndividual');
    Route::get('HistorialEstimulos/{id}/{inicio}/{fin}','ReportesController@ReporteDeportistaEstimulos');
    Route::resource('reportes','ReportesController');
    
    /************RUTAS PARA ENTRENADORES*********************/
    Route::get('GestionEntrenador','EntrenadorController@index');
    Route::get('entrenadir/{id}','EntrenadorController@datos');
    
});
