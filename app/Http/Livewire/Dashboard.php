<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
