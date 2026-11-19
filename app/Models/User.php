<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'is_active',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public const ROLE_ADMIN = 'admin';
    public const ROLE_GESTOR = 'gestor';
    public const ROLE_VENDEDOR = 'vendedor';

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'assigned_to_user_id');
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    public function isGestor(): bool
    {
        return $this->role === 'gestor';
    }

    public function isVendedor(): bool
    {
        return in_array($this->role, ['vendedor', 'ventas']);
    }

    public function hasRole(string|array ...$roles): bool
    {
        $flattened = [];
        foreach ($roles as $role) {
            if (is_array($role)) {
                $flattened = array_merge($flattened, $role);
            } else {
                $flattened[] = $role;
            }
        }

        if ($this->isAdmin() && (in_array('admin', $flattened) || in_array('super_admin', $flattened))) {
            return true;
        }
        if ($this->isGestor() && in_array('gestor', $flattened)) {
            return true;
        }
        if ($this->isVendedor() && (in_array('vendedor', $flattened) || in_array('ventas', $flattened))) {
            return true;
        }

        return in_array($this->role, $flattened);
    }

    public function canManageContent(): bool
    {
        return $this->isAdmin() || $this->isGestor();
    }

    public function canManageCommercial(): bool
    {
        return $this->isAdmin() || $this->isVendedor();
    }

    public function canManageSystem(): bool
    {
        return $this->isAdmin();
    }

    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'admin', 'super_admin' => 'Administrador',
            'gestor' => 'Gestor de Contenido',
            'vendedor', 'ventas' => 'Vendedor',
            default => ucfirst($this->role),
        };
    }

    public function getRoleBadgeClassAttribute(): string
    {
        return match ($this->role) {
            'admin', 'super_admin' => 'bg-purple-100 text-purple-800 border-purple-200',
            'gestor' => 'bg-sky-100 text-sky-800 border-sky-200',
            'vendedor', 'ventas' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            default => 'bg-slate-100 text-slate-800 border-slate-200',
        };
    }

    public function getRoleBadgeAttribute(): array
    {
        return [
            'label' => $this->role_label,
            'class' => $this->role_badge_class,
        ];
    }

    // Compatibilidad retroactiva
    public function isSuperAdmin(): bool
    {
        return $this->isAdmin();
    }

    public function isSales(): bool
    {
        return $this->canManageCommercial();
    }

    public function isAfterSales(): bool
    {
        return $this->isAdmin() || $this->role === 'posventa';
    }
}
