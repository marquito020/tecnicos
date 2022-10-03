<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FormularioClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TurnoController;
use App\Models\FormularioCliente;
use Illuminate\Support\Facades\Route;

/* Nuevas Rutas */
use Illuminate\Support\Facades\Auth;
/* Ruta Servicio */
use App\Http\Controllers\ServicioController;
/* Administrativos */
use App\Http\Controllers\AdministrativoController;
/* Trabajo Asiganos */
use App\Http\Controllers\TrabajoAsignadoController;
/* Asignar Trabajo */
use App\Http\Controllers\AsignarTrabajoController;
/* Control trabajo */
use App\Http\Controllers\ControlTrabajoController;
use App\Http\Controllers\CrearFormularioClienteController;
/* Marcar control trabajo */
use App\Http\Controllers\MarcarControlTrabajoController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('tecnicos', TecnicoController::class)->middleware('auth');

Route::resource('clientes', ClienteController::class)->middleware('auth');

Route::resource('formularioClientes', FormularioClienteController::class)->middleware('auth');

Route::resource('asistencias', AsistenciaController::class)->middleware('auth')->names('asistencia');

/* ruta marcado */
Route::get('marcado', [VerificationController::class, 'marcado'])
    ->name('marcado')->middleware('auth');

/* Marcar Entrada y salida */
//marcar entrada y salida
Route::post('marcarEntrada', [VerificationController::class, 'marcarEntrada'])
    ->name('marcarEntrada')->middleware('auth');

Route::put('marcarSalida/{marcado}', [VerificationController::class, 'marcarSalida'])
    ->name('marcarSalida')->middleware('auth');

/* Servicios */
Route::resource('servicios', ServicioController::class)->middleware('auth');

/* administrativos */
Route::resource('administrativos', AdministrativoController::class)->middleware('auth');

/* trabajos asignados */
Route::resource('trabajo_asignados', TrabajoAsignadoController::class)->middleware('auth');

/* Asignar Trabajo */
Route::resource('asignar_trabajos', AsignarTrabajoController::class)->middleware('auth');

/* Control Trabajo */
Route::resource('control_trabajos', ControlTrabajoController::class)->middleware('auth');

/* Marcar Control Trabajos */
Route::resource('marcar_control_trabajos', MarcarControlTrabajoController::class)->middleware('auth');
Route::put('marcar_control_trabajos/{id}', [MarcarControlTrabajoController::class, 'update'])
    ->name('marcar_control_trabajos')->middleware('auth');

/* Inicio */
Route::get('inicio', function () {
    return view('inicio');
})->name('inicio');

/* Cliente crea formulario */
Route::resource('cliente_crea_formulario', CrearFormularioClienteController::class);