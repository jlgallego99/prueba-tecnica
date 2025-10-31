<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\Auditable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    use Auditable;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        $this->log('create', $user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
