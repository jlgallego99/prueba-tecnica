<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
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
