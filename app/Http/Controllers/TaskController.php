<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->get(); // SELECT * FROM tasks ORDER BY created_at DESC
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'title' => 'required|max:255',
        ]);
     
        Task::create($request->all()); //Saves one line in the DB
        return redirect('/tasks')->with('success', 'Task added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function toggle(Task $task){
        //Invert the current value (true becomes false, false becomes true)
        $task->update([
            'is_completed' => !$task->is_completed
        ]);
        //The user is redirected to the previous page with a success message
        return back()->with('success','Task status updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task successfully deleted!');
    }
}
