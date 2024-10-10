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
Route::post('/users', [UserController::class, 'store']);

Route::get('/criterions', [CriterionController::class, 'index']);

Route::get('/crossEvaluations', [CrossEvaluationController::class, 'index']);

Route::get('/documents', [DocumentController::class, 'index']);

Route::get('/peerEvaluations', [PeerEvaluationController::class, 'index']);

Route::get('/plannings', [PlanningController::class, 'index']);
Route::post('/plannings', [PlanningController::class, 'store']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);

Route::get('/selfAssessments', [SelfAssessmentController::class, 'index']);

Route::get('/sisCode', [SiscodeController::class, 'index']);
Route::post('/sisCode', [SiscodeController::class, 'store']);

Route::get('/spaces', [SpaceController::class, 'index']);
Route::post('/spaces', [SpaceController::class, 'store']);

Route::get('/sprints', [SprintController::class, 'index']);
Route::post('/sprints', [SprintController::class, 'store']);

Route::get('/stories', [StoryController::class, 'index']);
Route::post('/stories', [StoryController::class, 'store']);

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/teams', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);

Route::get('/teamMembers', [TeamMemberController::class, 'index']);
Route::post('/teamMembers', [TeamMemberController::class, 'store']);

Route::get('/tokens', [TokenController::class, 'index']);
Route::post('/tokens', [TokenController::class, 'store']);

Route::get('/trackings', [TrackingController::class, 'index']);
Route::post('/trackings', [TrackingController::class, 'store']);

Route::get('/weeklies', [WeeklyController::class, 'index']);
Route::post('/weeklies', [WeeklyController::class, 'store']);
Route::get('/proyectos', [ProjectController::class, 'index']);

Route::post('/proyecto', [ProjectController::class, 'store']);
Route::get('/proyecto/{id}', [ProjectController::class, 'show']);
Route::get('/proyectos/{id}', [ProjectController::class, 'show2']);
Route::patch('/proyecto/{id}', [ProjectController::class, 'updatePartial']);

// ------------------------------------------------------------------------------------------------------------------
// Route::get('/equipo', [EquipoController::class, 'index']);
// Route::post('/equipo', [EquipoController::class, 'store']);
// Route::get('/equipos/{id}', [EquipoController::class, 'show']);//agregado
// Route::put('/equipos/{id}', [EquipoController::class, 'update']);
// Route::delete('/equipos/{id}', [EquipoController::class, 'delete']);
// Route::get('/equiposS/buscar', [EquipoController::class, 'search']);
// Route::get('/equipotable', [EquipoController::class, 'indexTabla']);

// Route::get('/equipos/usuario/{id}', [EquipoController::class, 'obtenerEquiposPorUsuario']);

// //rutas para docente

// Route::get('/docentes', [DocenteController::class, 'index']);
// Route::post('/docentes', [DocenteController::class, 'store']);

// //rutas para ESTUDIANTE

// Route::get('/estudiantes', [EstudianteController::class, 'index']);
// Route::post('/estudiantes', [EstudianteController::class, 'store']);

// //vista completa de docemte
// Route::get('/actors', [ActorController::class, 'getActorsWithType']);
// Route::get('/actors/{id}', [ActorController::class, 'showE']);
// Route::get('/summary', [ActorController::class, 'showSummary']);
