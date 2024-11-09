<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskRequest;
use App\Http\Resources\Api\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(TaskRequest $request)
    {
        return new TaskResource(Task::create($request->all()));
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada exitosamente']);
    }
}
