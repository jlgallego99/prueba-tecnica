<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskView extends Component
{
    public int|null $taskId = null;
    public Task|null $task = null;

    public function mount()
    {
        if ($this->taskId) {
            $this->task = Task::query()->where('id', '=', $this->taskId)->first();
        }
    }

    public function render()
    {
        return view('livewire.task-view');
    }
}
