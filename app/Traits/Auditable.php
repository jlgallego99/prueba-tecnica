<?php

namespace App\Traits;

use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    protected function log(string $action): void
    {
        // Prevent recursion
        if ($this instanceof AuditTrail) {
            return;
        }

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => $action,
        ]);
    }
}
