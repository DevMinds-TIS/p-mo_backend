<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ActorController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\EquipoController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
// Rutas para ActorController
Route::get('/actores', [ActorController::class, 'index']);
Route::get('/actores/{id}', [ActorController::class, 'show']);
Route::post('/actores', [ActorController::class, 'store']);
Route::put('/actores/{id}', [ActorController::class, 'update']);
Route::patch('/actores/{id}', [ActorController::class, 'updatePartial']);
Route::delete('/actores/{id}', [ActorController::class, 'delete']);
Route::get('/actores/buscar', [ActorController::class, 'search']);

//login 
Route::post('/login', [AuthController::class, 'login']);


//rutas para PROYECTO

Route::get('/proyecto', [ProjectController::class, 'index']);
Route::post('/proyecto', [ProjectController::class, 'store']);

//rutas para Equipo
Route::get('/equipo', [EquipoController::class, 'index']);
Route::post('/equipo', [EquipoController::class, 'store']);
Route::get('/equipos/{id}', [EquipoController::class, 'show']);//agregado
Route::put('/equipos/{id}', [EquipoController::class, 'update']);
Route::delete('/equipos/{id}', [EquipoController::class, 'delete']);
Route::get('/equipos/buscar', [EquipoController::class, 'search']);

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::post('/admin', 'App\Http\Controllers\AdminController@store');
Route::put('/admin/{id}', 'App\Http\Controllers\AdminController@update');
Route::delete('/admin/{id}', 'App\Http\Controllers\AdminController@destroy');

Route::get('/teacher', 'App\Http\Controllers\TeacherController@index');
Route::post('/teacher', 'App\Http\Controllers\TeacherController@store');
Route::put('/teacher/{id}', 'App\Http\Controllers\TeacherController@update');
Route::delete('/teacher/{id}', 'App\Http\Controllers\TeacherController@destroy');
