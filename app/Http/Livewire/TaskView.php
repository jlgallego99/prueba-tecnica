<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskView extends Component
{
    public int|null $taskId = null;
    public string $title = "";
    public string $description = "";
    public string $status = "";

    public bool $confirmDelete = false;

    public function mount()
    {
        if ($this->taskId) {
            $task = Task::query()->where('id', '=', $this->taskId)->first();
            $this->title = $task->title;
            $this->description = $task->description;
            $this->status = str_replace('_', ' ', $task->status);
        } else {
            $this->emitUp('closeTask');
        }
    }

    public function submit(): void
    {

    }

    public function deleteTask(): void
    {
        if ($this->confirmDelete) {
            $this->emitUp('deleteTask', $this->taskId);
        } else {
            $this->confirmDelete = true;
        }
    }

    public function cancelDelete(): void
    {
        $this->confirmDelete = false;
    }

    public function close()
    {
        $this->emitUp('closeTask');
    }

    public function render()
    {
        return view('livewire.task-view');
    }
}
