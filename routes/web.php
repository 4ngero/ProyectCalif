<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CalificacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AlumnosController::class,'show']);
Route::post('/alumno_store',[AlumnosController::class,'store']);

Route::get('/calificaciones/{id}',[CalificacionesController::class,'show']);
Route::post('/alumno_update/{id}',[AlumnosController::class,'update']);

Route::post('/alumno_create/{id}',[CalificacionesController::class,'create']);

Route::post('/calificaciones/update/{id}', [CalificacionesController::class, 'update']);

