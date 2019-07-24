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

Route::get('/login', function () { return view('auth/login'); });

Route:: resource('investigacion/investigador','InvestigadorController'); //probada
Route:: resource('investigacion/categoria','CategoriaController'); //probada
Route:: resource('investigacion/grupo','GrupoController');//probada
Route:: resource('facultades','FacultadController');//probada
Route:: resource('escuelas','EscuelaController');//PROBADA
Route:: resource('carreras','CarreraController');
Route:: resource('proyectosInvestigacion/dominiosAcademicos','DominiosAcademicosController');//PROBADA
Route:: resource('proyectosInvestigacion/lineasInvestigacion','LineasInvestigacionController');//PROBADA
Route:: resource('proyectosInvestigacion/proyectosPostulados','PI_PostuladosController');//probada
Route:: resource('proyectosInvestigacion/proyectos','ProyectoInvestigacionController');//probada
Route:: resource('proyectosInvestigacion/lineas_x_pi_postulado','LineasxpipostuladosController');//Probada
Route:: resource('publicaciones/areasAcademicas','AreasAcademicasController');//PROBADA
Route:: resource('publicaciones/publicaciones_noproyectos','PublicacionesNoProyectoController');//probada
Route:: resource('eventos','EventosController');//probada
Route:: resource('noticias','NoticiasController');//probada
Route:: resource('centrosInvestigacion','CentrosInvestigacionController');//probada
Route:: resource('programas','ProgramasController');//probada
Route:: resource('invesNoProyecto','InvPubNoProyController');//probada
Route:: resource('elementosMultimedia','ElementosMultimediaController');//probada
Route:: resource('laboratorios','LaboratorioController');//probada
Route:: resource('investigacionProyectos','InvestigacionProyectosController');//probada
Route:: resource('laboratoriosProyectos','LaboratorioProyectoController');//probada
Route:: resource('proyectosFacultad','ProyectosFacultadController');//probada
Route:: resource('publicaciones/publicacionesProyectos','PublicacionesProyectosController');//probada


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {    
    return view('welcome');
});
//publicacionPaginaPrincipal
Route::resource('publicacionC', 'PublicacionController')->except(['show']);
Route::get('/', 'noticiasC@publicaciones');

//investigacionPaginaPrincipal
Route::resource('investigacionC', 'InvestigacionController')->except(['show']);
Route::resource('investigacionC/investigadoresC', 'investigadoresC');

//noticiasPaginaPrincipal
Route::resource('noticiasC', 'noticiasC');

//laboratoriosPaginaPrincipal
//Route::resource('laboratoriosC', 'LaboratorioC');
//contactenosPaginaPrincipal
Route::resource('contacto', 'ContactoController');

//proyectosPaginaPrincipal
Route::resource('proyectosC', 'ProyectosController');

//centrosInvestigacionPaginaPrincipal
Route::resource('centinvC', 'CentinvController');

//laboratoriosPaginaPrincipal
Route::resource('labotC', 'LabotController');


//PublicacionesPaginaPrincipal
Route::resource('publicacionesarea', 'PublicacionesareaController');

//LineasPaginaPrincipal
Route::resource('lineasC', 'LineasController');


//LineasPaginaPrincipal
Route::resource('eventC', 'EventController');



//ElementosMultimediaPaginaPrincipal
Route::resource('elementosMultimediaC', 'ElementosMultimediaC');
