<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ActorController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GrupoController;



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

// // Rutas para DocenteController
// Route::get('/docentes', [DocenteController::class, 'index']);
// Route::get('/docentes/{id}', [DocenteController::class, 'show']);
// Route::post('/docentes', [DocenteController::class, 'store']);
// Route::put('/docentes/{id}', [DocenteController::class, 'update']);
// Route::patch('/docentes/{id}', [DocenteController::class, 'updatePartial']);
// Route::delete('/docentes/{id}', [DocenteController::class, 'delete']);

// // Rutas para EstudianteController
// Route::get('/estudiantes', [EstudianteController::class, 'index']);
// Route::get('/estudiantes/{id}', [EstudianteController::class, 'show']);
// Route::post('/estudiantes', [EstudianteController::class, 'store']);
// Route::put('/estudiantes/{id}', [EstudianteController::class, 'update']);
// Route::patch('/estudiantes/{id}', [EstudianteController::class, 'updatePartial']);
// Route::delete('/estudiantes/{id}', [EstudianteController::class, 'delete']);

// // Rutas para GrupoController
// Route::get('/grupos', [GrupoController::class, 'index']);
// Route::get('/grupos/{id}', [GrupoController::class, 'show']);
// Route::post('/grupos', [GrupoController::class, 'store']);
// Route::put('/grupos/{id}', [GrupoController::class, 'update']);
// Route::patch('/grupos/{id}', [GrupoController::class, 'updatePartial']);
// Route::delete('/grupos/{id}', [GrupoController::class, 'delete']);