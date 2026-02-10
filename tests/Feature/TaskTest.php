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
