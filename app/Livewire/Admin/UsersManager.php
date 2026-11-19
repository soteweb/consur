<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class UsersManager extends BaseCrudComponent
{
    // Filtros de búsqueda
    public string $filterRole = '';
    public string $filterStatus = '';

    // Campos del formulario
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $role = 'vendedor';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $is_active = true;

    protected function resetInputFields(): void
    {
        $this->selectedId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->role = 'vendedor';
        $this->password = '';
        $this->password_confirmation = '';
        $this->is_active = true;
    }

    public function mount()
    {
        abort_unless(auth()->user()->isAdmin(), 403, 'Acceso restringido a Administradores.');
    }

    public function edit(int $id)
    {
        $this->resetInputFields();
        $user = User::findOrFail($id);

        $this->selectedId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone ?? '';
        $this->role = $user->role;
        $this->is_active = (bool) $user->is_active;
        $this->password = '';
        $this->password_confirmation = '';

        $this->isOpen = true;
    }

    public function save()
    {
        $emailRule = Rule::unique('users', 'email');
        if ($this->selectedId) {
            $emailRule->ignore($this->selectedId);
        }

        $rules = [
            'name' => 'required|string|min:3|max:120',
            'email' => ['required', 'email', $emailRule],
            'phone' => 'nullable|string|max:40',
            'role' => ['required', Rule::in(['admin', 'gestor', 'vendedor'])],
        ];

        // Validar contraseña solo si es nuevo o si se completó el campo al editar
        if (!$this->selectedId || !empty($this->password)) {
            $rules['password'] = 'required|min:6|same:password_confirmation';
        }

        $this->validate($rules, [
            'password.same' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'email.unique' => 'Ya existe un usuario con este correo electrónico.',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ?: null,
            'role' => $this->role,
            'is_active' => $this->is_active,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->selectedId) {
            $user = User::findOrFail($this->selectedId);
            $user->update($data);
            $msg = "Usuario '{$user->name}' actualizado correctamente.";
            ActivityLog::log('update_user', "Actualizó los datos del usuario: {$user->name} ({$user->role})", $user);
        } else {
            $user = User::create($data);
            $msg = "Usuario '{$user->name}' creado con el rol " . $user->role_label . ".";
            ActivityLog::log('create_user', "Creó nuevo usuario: {$user->name} ({$user->role})", $user);
        }

        $this->closeModal();
        $this->notify($msg);
    }

    public function toggleActive(int $id)
    {
        // Evitar que el admin actual se desactive a sí mismo
        if (auth()->id() === $id) {
            $this->notify('No puedes desactivar tu propia cuenta activa.', 'warning');
            return;
        }

        $user = User::findOrFail($id);
        $user->update(['is_active' => !$user->is_active]);

        $statusStr = $user->is_active ? 'activada' : 'desactivada';
        ActivityLog::log('toggle_user_status', "Cuenta {$statusStr} para el usuario: {$user->name}", $user);
        $this->notify("Cuenta de {$user->name} {$statusStr}.");
    }

    public function delete(int $id)
    {
        // Evitar que el admin actual se elimine a sí mismo
        if (auth()->id() === $id) {
            $this->notify('No puedes eliminar tu propia cuenta.', 'danger');
            return;
        }

        $user = User::findOrFail($id);
        $name = $user->name;
        $user->delete();

        ActivityLog::log('delete_user', "Eliminó el usuario: {$name}");
        $this->notify("Usuario '{$name}' eliminado del sistema.", 'warning');
    }

    public function render()
    {
        $query = User::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%");
            });
        }

        if (!empty($this->filterRole)) {
            $query->where('role', $this->filterRole);
        }

        if ($this->filterStatus !== '') {
            $query->where('is_active', (bool) $this->filterStatus);
        }

        $users = $query->orderBy('name', 'asc')->paginate(12);

        $counts = [
            'total' => User::count(),
            'admin' => User::whereIn('role', ['admin', 'super_admin'])->count(),
            'gestor' => User::where('role', 'gestor')->count(),
            'vendedor' => User::whereIn('role', ['vendedor', 'ventas'])->count(),
        ];

        return view('livewire.admin.users-manager', compact('users', 'counts'));
    }
}
