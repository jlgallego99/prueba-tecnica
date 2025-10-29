<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::find($taskId);

        // Check that the task belongs to this user and changes status
        if ($task && $task->user_id === Auth::id() && $newStatus !== $task->status) {
            $task->status = $newStatus;
            $task->save();
        }
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
