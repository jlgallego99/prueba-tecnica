<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TaskCard extends Component
{
    public string $title = '';
    public string $description = '';
    public string $taskId = '';

    public function render()
    {
        return view('livewire.task-card');
    }
}
