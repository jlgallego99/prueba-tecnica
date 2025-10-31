<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Notification extends Component
{
    public string|null $notificationId = null;
    public string $message = '';
    public int $timeout = 5000;
    public string $type = 'info';

    protected $listeners = [
        'notify' => 'create',
        'close-notification' => 'close'
    ];

    public function create(string $message, $type = 'info', $timeout = 5000): void
    {
        $this->notificationId = Str::uuid();
        $this->message = $message;
        $this->timeout = $timeout;
        $this->type = $type;
    }

    public function close(): void
    {
        $this->notificationId = null;
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
