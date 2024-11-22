<?php

use App\Http\Controllers\Api\CriterionController;
use App\Http\Controllers\Api\CrossEvaluationController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\PeerEvaluationsController;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Controllers\Api\PlanningsController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\Api\SelfAssessmentsController;
use App\Http\Controllers\Api\SiscodeController;
use App\Http\Controllers\Api\SpaceController;
use App\Http\Controllers\Api\SprintController;
use App\Http\Controllers\Api\StoriesController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TrackingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeekliesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Resources\Api\UserResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post("login", [AuthenticatedUserController::class, "login"]);
Route::post("register-admin", [RegisteredUserController::class, "registerAdmin"]);
Route::post("register-student", [RegisteredUserController::class, "registerStudent"]);
Route::post("register-teacher", [RegisteredUserController::class, "registerTeacher"]);
Route::apiResource("role-user", RoleUserController::class);
Route::apiResource("users", UserController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user()->load(['roles', 'user']));
});


Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::post("logout", [AuthenticatedUserController::class, "logout"]);
    Route::apiResource("roles", RoleController::class);
    Route::apiResource("permissions", PermissionsController::class);
    Route::apiResource("siscode", SiscodeController::class);
    Route::apiResource("projects", ProjectController::class);
    Route::apiResource("documents", DocumentController::class);
    Route::apiResource("spaces", SpaceController::class);
    Route::apiResource("plannings", PlanningsController::class);
    Route::apiResource("teams", TeamController::class);
    Route::apiResource("team-member", TeamMemberController::class);
    Route::apiResource("sprints", SprintController::class);
    Route::apiResource("trackings", TrackingController::class);
    Route::apiResource("weeklies", WeekliesController::class);
    Route::apiResource("stories", StoriesController::class);
    Route::apiResource("tasks", TaskController::class);
    Route::apiResource("criterions", CriterionController::class);
    Route::apiResource("self-assessments", SelfAssessmentsController::class);
    Route::apiResource("peer-evaluations", PeerEvaluationsController::class);
    Route::apiResource("cross-evaluations", CrossEvaluationController::class);
});