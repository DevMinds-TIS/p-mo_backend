<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

Route::get('/admins', [AdminController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);

Route::post('/admins', [AdminController::class, 'store']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::post('/students', [StudentController::class, 'store']);
