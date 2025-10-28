<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $tasks = [
        'pending' => [
            ['id' => 1, 'title' => 'Task A', 'description' => 'Description for Task A'],
            ['id' => 2, 'title' => 'Task B', 'description' => 'Description for Task B'],
        ],
        'in_progress' => [
            ['id' => 3, 'title' => 'Task C', 'description' => 'Description for Task C'],
        ],
        'completed' => [],
    ];

    public function render()
    {
        $user = Auth::user();

        if ($user) {
            return view('livewire.dashboard', compact('user'));
        } else {
            $this->redirect('/');
        }
    }
}
