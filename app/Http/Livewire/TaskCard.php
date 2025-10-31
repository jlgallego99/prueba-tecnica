<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TaskCard extends Component
{
    public string $title = '';
    public string $description = '';
    public int|null $taskId = null;

    public function openTask(): void
    {
        $this->emitUp('openTask', $this->taskId);
    }

    public function render()
    {
        return view('livewire.task-card');
    }
}
