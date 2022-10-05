<?php

use App\Http\Controllers\ApiAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* login */
Route::post('/login', [AutenticarController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AutenticarController::class, 'logout']);
    Route::post('/datos', [AutenticarController::class, 'datos']);
    Route::post('/datos_asistencia', [ApiAsistencia::class, 'datosAsistencia']);
    Route::post('/marcar_asistencia_inicio', [ApiAsistencia::class, 'marcarEntrada']);
    Route::post('/marcar_asistencia_fin', [ApiAsistencia::class, 'marcarSalida']);
});
