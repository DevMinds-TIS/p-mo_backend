<?php

use App\Http\Controllers\Api\DocumentsController;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Controllers\Api\PlanningsController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\SiscodeController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedUserController;
use Illuminate\Support\Facades\Route;

Route::post("login", [AuthenticatedUserController::class, "login"]);
Route::post("register", [RegisteredUserController::class, "register"]);

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::post("logout", [AuthenticatedUserController::class, "logout"]);
    Route::apiResource("roles", RolesController::class);
    Route::apiResource("users", UsersController::class);
    Route::apiResource("permissions", PermissionsController::class);
    Route::apiResource("siscode", SiscodeController::class);
    Route::apiResource("projects", ProjectsController::class);
    Route::apiResource("documents", DocumentsController::class);
    Route::apiResource("plannings", PlanningsController::class);
});
