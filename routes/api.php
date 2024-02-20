<?php

use App\Http\Controllers\AlumnoController;
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

Route::apiResource('/', AlumnoController::class);

Route::get('/alumno/{id}', [AlumnoController::class, 'show']);

Route::post('/alumno', [AlumnoController::class, 'store']);

Route::put('/alumno/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumno/{id}', [AlumnoController::class, 'destroy']);

