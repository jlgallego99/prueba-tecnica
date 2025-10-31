<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public string|null $creatingOnColumn = null;
    public string|null $selectedTaskId = null;

    protected $listeners = [
        'taskCreated' => 'createTask',
        'openTask' => 'showTaskView',
        'closeTask' => 'closeTaskView',
        'deleteTask' => 'deleteTask',
        'updateTask' => 'updateTask',
    ];

    public function updateTaskStatus($taskId, $newStatus): void
    {
        $task = Task::find($taskId);

        // Check that the task belongs to this user and changes status
        if ($task && $task->user_id === Auth::id() && $newStatus !== $task->status) {
            $task->status = $newStatus;
            $task->save();

            // Notify task updated
            $this->emitTo('notification', 'notify', 'Task status updated correctly');
        }
    }

    public function createTask($taskTitle): void
    {
        if ($taskTitle && $this->creatingOnColumn && !empty($taskTitle)) {
            auth()->user()->tasks()->create([
                'title' => $taskTitle,
                'status' => $this->creatingOnColumn,
                'description' => '',
            ]);

            // Notify new task created
            $this->emitTo('notification', 'notify', 'New task created');
        } else {
            // Notify error on new task created
            $this->emitTo('notification', 'notify', 'Error creating task', 'error');
        }

        // Also close the form if the user tries to input an empty title, like in trello
        $this->creatingOnColumn = null;
    }

    public function deleteTask($taskId): void
    {
        $task = Task::query()->where('id', '=', $taskId)->first();

        if ($task && $task->user_id === Auth::id()) {
            $task->delete();

            // Notify task deleted
            $this->emitTo('notification', 'notify', 'Task deleted correctly');
        } else {
            // Notify task updated error
            $this->emitTo('notification', 'notify', 'Error deleting task', 'error');
        }

        $this->selectedTaskId = null;
    }

    public function updateTask($taskId, $taskTitle, $taskDescription): void
    {
        $task = Task::query()->where('id', '=', $taskId)->first();

        if ($task && $task->user_id === Auth::id()) {
            $task->title = $taskTitle;
            $task->description = $taskDescription;
            $task->save();

            // Notify task updated
            $this->emitTo('notification', 'notify', 'Task updated correctly');
        } else {
            // Notify task updated error
            $this->emitTo('notification', 'notify', 'Error updating task', 'error');
        }

        $this->selectedTaskId = null;
    }

    public function showCreateTaskOnColumn($column)
    {
        $this->creatingOnColumn = $column;
    }

    public function showTaskView($taskId)
    {
        $this->selectedTaskId = $taskId;
    }

    public function closeTaskView()
    {
        $this->selectedTaskId = null;
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
