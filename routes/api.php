<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ActorController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\GrupoController;

use App\Http\Controllers\AuthController;

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
Route::post('/login', [AuthController::class, 'login']);