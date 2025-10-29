<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public string|null $creatingOnColumn = null;

    protected $listeners = [
        'taskCreated' => 'createTask',
    ];

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::find($taskId);

        // Check that the task belongs to this user and changes status
        if ($task && $task->user_id === Auth::id() && $newStatus !== $task->status) {
            $task->status = $newStatus;
            $task->save();
        }
    }

    public function createTask($taskTitle)
    {
        if ($taskTitle && $this->creatingOnColumn && !empty($taskTitle)) {
            auth()->user()->tasks()->create([
                'title' => $taskTitle,
                'status' => $this->creatingOnColumn,
                'description' => '',
            ]);
        }

        // Also close the form if the user tries to input an empty title, like in trello
        $this->creatingOnColumn = null;
    }

    public function showCreateTaskOnColumn($column) {
        $this->creatingOnColumn = $column;
    }

    public function render()
    {
        $user = Auth::user();

        if ($user) {
            return view('livewire.dashboard', [
                'user' => $user,
                'tasks' => [
                    'pending' => Task::query()->where('user_id', '=', $user->id)->where('status', '=', 'pending')->get(),
                    'in_progress' => Task::query()->where('user_id', '=', $user->id)->where('status', '=', 'in_progress')->get(),
                    'completed' => Task::query()->where('user_id', '=', $user->id)->where('status', '=', 'completed')->get(),
                ],
            ]);
        }
    }
}
