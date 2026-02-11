<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//manage the standard CRUD actions
Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//specific (non-standard) action
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
