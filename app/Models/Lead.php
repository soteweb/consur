<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'vehicle_id',
        'branch_id',
        'assigned_to_user_id',
        'full_name',
        'email',
        'phone',
        'city',
        'message',
        'financing_plan',
        'trade_in_vehicle',
        'preferred_date',
        'preferred_time',
        'status',
        'internal_notes',
        'last_contacted_at',
        'ip_address',
        'user_agent',
        'utm_source',
        'utm_campaign',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'last_contacted_at' => 'datetime',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function getStatusBadgeAttribute(): array
    {
        return match($this->status) {
            'nuevo' => ['label' => 'Nuevo', 'class' => 'bg-emerald-50 text-emerald-700 border-emerald-200'],
            'en_gestion' => ['label' => 'En Gestión', 'class' => 'bg-amber-50 text-amber-700 border-amber-200'],
            'contactado' => ['label' => 'Contactado', 'class' => 'bg-sky-50 text-sky-700 border-sky-200'],
            'cerrado_ganado' => ['label' => 'Venta Concretada', 'class' => 'bg-indigo-50 text-indigo-700 border-indigo-200'],
            'cerrado_perdido' => ['label' => 'Descartado', 'class' => 'bg-rose-50 text-rose-700 border-rose-200'],
            default => ['label' => ucfirst($this->status), 'class' => 'bg-slate-50 text-slate-700 border-slate-200'],
        };
    }
}
