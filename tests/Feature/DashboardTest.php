<?php

use App\Http\Livewire\CreateTask;
use App\Http\Livewire\Dashboard;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->user2 = User::factory()->create();
    $this->actingAs($this->user);

    Livewire::test(CreateTask::class, ['status' => 'pending'])
        ->set('title', 'Task A')
        ->call('submit')
        ->assertEmittedUp('taskCreated');

    Livewire::test(Dashboard::class)
        ->call('showCreateTaskOnColumn', 'pending')
        ->emit('taskCreated', 'Task A')
        ->assertSee('Task A')
        ->assertViewHas('tasks', function ($tasks) {
            return count($tasks['pending']) === 1 && count($tasks['in_progress']) === 0 && count($tasks['completed']) === 0;
        });
});

it('creates a task successfully', function () {
    $task = Task::query()->first();
    expect($task)->not->toBeNull()
        ->and($task->title)->toBe('Task A')
        ->and($task->status)->toBe('pending');
});

it('links a task to an user, and only that user', function () {
    $task = Task::query()->first();
    expect($task->user_id)->toBe($this->user->id)
        ->and($task->user_id)->not->toBe($this->user2->id);
});
