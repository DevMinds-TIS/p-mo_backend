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
//prueva
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

Route::get('/proyectos', [ProjectController::class, 'index']);

Route::post('/proyecto', [ProjectController::class, 'store']);
Route::get('/proyecto/{id}', [ProjectController::class, 'show']);
Route::get('/proyectos/{id}', [ProjectController::class, 'show2']);
Route::patch('/proyecto/{id}', [ProjectController::class, 'updatePartial']);

//rutas para Equipo
Route::get('/equipo', [EquipoController::class, 'index']);
Route::post('/equipo', [EquipoController::class, 'store']);
Route::get('/equipos/{id}', [EquipoController::class, 'show']);//agregado
Route::put('/equipos/{id}', [EquipoController::class, 'update']);
Route::delete('/equipos/{id}', [EquipoController::class, 'delete']);
Route::get('/equiposS/buscar', [EquipoController::class, 'search']);
Route::get('/equipotable', [EquipoController::class, 'indexTabla']);

Route::get('/equipos/usuario/{id}', [EquipoController::class, 'obtenerEquiposPorUsuario']);

//rutas para docente

Route::get('/docentes', [DocenteController::class, 'index']);
Route::post('/docentes', [DocenteController::class, 'store']);

//rutas para ESTUDIANTE

Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);

//vista completa de docemte
Route::get('/actors', [ActorController::class, 'getActorsWithType']);
Route::get('/actors/{id}', [ActorController::class, 'showE']);
Route::get('/summary', [ActorController::class, 'showSummary']);

