<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* ALUMNOS */
Route::apiResource('/alumnos', AlumnoController::class);
Route::get('/alumno/{id}', [AlumnoController::class, 'show']);
Route::post('/alumno', [AlumnoController::class, 'store']);
Route::put('/alumno/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumno/{id}', [AlumnoController::class, 'destroy']);
/* ALUMNOS */

/*MAESTROS*/ 
Route::apiResource('/docentes', DocenteController::class);
Route::get('/docentes/{id}', [DocenteController::class, 'show']);
Route::post('/docentes', [DocenteController::class, 'store']);
Route::put('/docentes/{id}', [DocenteController::class, 'update']);
Route::delete('/docentes/{id}', [DocenteController::class, 'destroy']);
/*MAESTROS*/ 

/* MATRICULA */
Route::apiResource('/matricula', MatriculaController::class);
Route::get('/matricula/{id}', [MatriculaController::class, 'show']);
Route::post('/matricula', [MatriculaController::class, 'store']);
Route::put('/matricula/{id}', [MatriculaController::class, 'update']);
Route::delete('/matricula/{id}', [MatriculaController::class, 'destroy']);
/* MATRICULA */

/* ASISTENCIA */
Route::apiResource('/asistencia', AsistenciaController::class);
Route::get('/asistencia/{id}', [AsistenciaController::class, 'show']);
Route::post('/asistencia', [AsistenciaController::class, 'store']);
Route::put('/asistencia/{id}', [AsistenciaController::class, 'update']);
Route::delete('/asistencia/{id}', [AsistenciaController::class, 'destroy']);
/* ASISTENCIA */


/* CURSOS */
Route::apiResource('/cursos', CursoController::class);
Route::get('/cursos/{id}', [CursoController::class, 'show']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::put('/cursos/{id}', [CursoController::class, 'update']);
Route::delete('/cursos/{id}', [CursoController::class, 'destroy']);
/* CURSOS */

