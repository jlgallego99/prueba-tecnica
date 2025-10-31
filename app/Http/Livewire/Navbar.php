<?php

namespace App\Http\Livewire;

use App\Traits\Auditable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    use Auditable;

    public function logout()
    {
        Auth::logout();

        $this->log('logout');

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
