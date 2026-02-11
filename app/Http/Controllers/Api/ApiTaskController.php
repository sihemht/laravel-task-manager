<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;


class ApiTaskController
{
public function index(){
    $task = Task::all();

    return response()->json($task, 200);
}

public function store(Request $request){
    $validation = $request->validate([
        'title' => 'required|string|min:3|max:255',
    ]);
    $task = Task::create($validation);
    return response()->json($task, 201);
}
public function show(Task $task){
    return response()->json($task, 200);
}
public function update(Request $request, Task $task){
    $validation = $request->validate([
        'title' => 'sometimes|required|string|min:3',
        'is_completed' => 'sometimes|required|boolean',
    ]);
    $task->update($validation);
    return response()->json($task, 200);
}
public function destroy(Task $task){
    $task->delete();
    return response()->json(['message' => 'Task deleted successfully'], 204);
}
}
