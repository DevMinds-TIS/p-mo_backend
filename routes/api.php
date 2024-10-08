<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\CrossEvaluationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PeerEvaluationController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SelfAssessmentController;
use App\Http\Controllers\SiscodeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\WeeklyController;




Route::get('/roles', [RolesController::class, 'index']);
Route::post('/roles', [RolesController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);

