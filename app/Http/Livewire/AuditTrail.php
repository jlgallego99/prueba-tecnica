<?php

namespace App\Http\Livewire;

use App\Models\AuditTrail as ModelsAuditTrail;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AuditTrail extends Component
{
    public Collection $audits;

    public function mount()
    {
        $this->audits = ModelsAuditTrail::query()->get();
    }

    public function render()
    {
        return view('livewire.audit-trail');
    }
}
