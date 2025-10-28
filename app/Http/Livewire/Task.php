<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Task extends Component
{
    public string $title = '';
    public string $description = '';

    public function render()
    {
        return view('livewire.task');
    }
}
