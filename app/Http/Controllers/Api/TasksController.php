<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TasksRequest;
use App\Http\Resources\Api\TasksResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return TasksResource::collection(Task::all());
    }

    public function store(TasksRequest $request)
    {
        return new TasksResource(Task::create($request->all()));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return new TasksResource($task);
    }

    public function update(TasksRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return new TasksResource($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada exitosamente']);
    }
}
