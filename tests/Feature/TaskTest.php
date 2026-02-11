<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


uses(RefreshDatabase::class);


//Verify that the task list is displayed correctly (Code 200)
it('renders the tasks index page', function () {
    $response = $this->get('/tasks');

    $response->assertStatus(200);
    $response->assertSee('Task Manager'); //Check that a specific text is present.
});

//verify that creating a task works in the database
it('can create a new task', function () {
    $taskData = ['title' => 'Task tested with Pest'];

    $response = $this->post('/tasks', $taskData);

    $response->assertRedirect('/tasks');
    $this->assertDatabaseHas('tasks', $taskData);
});

it('can toggle a task completion status', function(){
    $task = \App\Models\Task::create(['title' => 'Toggle test task', 'is_completed' => false]);

    //1. Create an unfinished task
    $response = $this->patch(route('tasks.toggle', $task));

    //2. The toggle route is called
    $response->assertRedirect();
    //3. Check the redirection and the change in the database
    $this->assertDatabaseHas('tasks', [
        'id' => $task->id,
        'is_completed' => true
    ]);
});