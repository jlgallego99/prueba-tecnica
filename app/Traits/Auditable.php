<?php

namespace App\Traits;

use App\Models\AuditTrail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    protected function log(string $action, Task|User|null $model = null): void
    {
        // Prevent recursion
        if ($this instanceof AuditTrail) {
            return;
        }

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'auditable_type' => $model ? $model->id : null,
            'auditable_id' => $model ? get_class($model) : null
        ]);
    }

    public function auditTrails()
    {
        return $this->morphMany(AuditTrail::class, 'auditable');
    }
}
