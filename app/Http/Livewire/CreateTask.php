<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateTask extends Component
{
    public string $title = "";

    public function submit(): void
    {
        $this->emitUp('taskCreated', $this->title);
    }

    public function render()
    {
        return view('livewire.create-task');
    }
}
