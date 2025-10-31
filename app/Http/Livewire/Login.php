<?php

namespace App\Http\Livewire;

use App\Traits\Auditable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    use Auditable;

    public $email;

    public $password;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->log('login', Auth::user());
            return redirect()->route('dashboard');
        } else {
            $this->emitTo('notification', 'notify', 'Incorrect credentials', 'error');
            $this->log('login failed');
        }
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('livewire.login');
    }
}
