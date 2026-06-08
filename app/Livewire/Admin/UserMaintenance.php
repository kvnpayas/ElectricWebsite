<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('User Maintenance — TEI Admin')]
class UserMaintenance extends Component
{
    public array  $allUsers     = [];
    public string $search       = '';
    public string $roleFilter   = 'all';
    public string $statusFilter = 'all';
    public bool   $showModal    = false;
    public ?int   $deleteTarget = null;

    public string $formName     = '';
    public string $formEmail    = '';
    public string $formRole     = 'staff';
    public string $formStatus   = 'active';
    public string $formPassword = '';

    public function mount(): void
    {
        $this->allUsers = [
            ['id'=>1,  'name'=>'Maria Santos',    'email'=>'m.santos@tarlacelectric.com',     'role'=>'admin',    'status'=>'active',   'joined'=>'Jan 15, 2024', 'last_login'=>'Jun 8, 2026'],
            ['id'=>2,  'name'=>'Jose Reyes',       'email'=>'j.reyes@tarlacelectric.com',      'role'=>'staff',    'status'=>'active',   'joined'=>'Mar 22, 2024', 'last_login'=>'Jun 7, 2026'],
            ['id'=>3,  'name'=>'Ana Garcia',       'email'=>'a.garcia@tarlacelectric.com',     'role'=>'staff',    'status'=>'active',   'joined'=>'Apr 10, 2024', 'last_login'=>'Jun 5, 2026'],
            ['id'=>4,  'name'=>'Pedro Dela Cruz',  'email'=>'p.delacruz@tarlacelectric.com',   'role'=>'customer', 'status'=>'active',   'joined'=>'May 3, 2024',  'last_login'=>'Jun 1, 2026'],
            ['id'=>5,  'name'=>'Rosa Mendoza',     'email'=>'r.mendoza@tarlacelectric.com',    'role'=>'customer', 'status'=>'inactive', 'joined'=>'May 18, 2024', 'last_login'=>'Apr 20, 2026'],
            ['id'=>6,  'name'=>'Carlos Lim',       'email'=>'c.lim@tarlacelectric.com',        'role'=>'staff',    'status'=>'active',   'joined'=>'Jun 1, 2024',  'last_login'=>'Jun 6, 2026'],
            ['id'=>7,  'name'=>'Elena Torres',     'email'=>'e.torres@tarlacelectric.com',     'role'=>'admin',    'status'=>'active',   'joined'=>'Feb 8, 2024',  'last_login'=>'Jun 8, 2026'],
            ['id'=>8,  'name'=>'Miguel Ramos',     'email'=>'m.ramos@tarlacelectric.com',      'role'=>'customer', 'status'=>'inactive', 'joined'=>'Jun 3, 2024',  'last_login'=>'May 15, 2026'],
            ['id'=>9,  'name'=>'Lucia Villanueva', 'email'=>'l.villanueva@tarlacelectric.com', 'role'=>'staff',    'status'=>'active',   'joined'=>'Mar 5, 2024',  'last_login'=>'Jun 4, 2026'],
            ['id'=>10, 'name'=>'Antonio Bautista', 'email'=>'a.bautista@tarlacelectric.com',   'role'=>'customer', 'status'=>'active',   'joined'=>'Jun 5, 2024',  'last_login'=>'Jun 3, 2026'],
            ['id'=>11, 'name'=>'Josephine Cruz',   'email'=>'j.cruz@tarlacelectric.com',       'role'=>'staff',    'status'=>'active',   'joined'=>'Jan 28, 2024', 'last_login'=>'Jun 2, 2026'],
            ['id'=>12, 'name'=>'Roberto Aquino',   'email'=>'r.aquino@tarlacelectric.com',     'role'=>'customer', 'status'=>'active',   'joined'=>'Apr 22, 2024', 'last_login'=>'May 28, 2026'],
        ];
    }

    #[Computed]
    public function filteredUsers(): array
    {
        $q = strtolower(trim($this->search));
        return array_values(array_filter($this->allUsers, function ($u) use ($q) {
            $matchSearch = $q === ''
                || str_contains(strtolower($u['name']), $q)
                || str_contains(strtolower($u['email']), $q);
            $matchRole   = $this->roleFilter   === 'all' || $u['role']   === $this->roleFilter;
            $matchStatus = $this->statusFilter === 'all' || $u['status'] === $this->statusFilter;
            return $matchSearch && $matchRole && $matchStatus;
        }));
    }

    #[Computed]
    public function stats(): array
    {
        $active = count(array_filter($this->allUsers, fn($u) => $u['status'] === 'active'));
        $admins = count(array_filter($this->allUsers, fn($u) => $u['role']   === 'admin'));
        $staff  = count(array_filter($this->allUsers, fn($u) => $u['role']   === 'staff'));
        return [
            'total'    => count($this->allUsers),
            'active'   => $active,
            'inactive' => count($this->allUsers) - $active,
            'admins'   => $admins,
            'staff'    => $staff,
        ];
    }

    public function openAdd(): void
    {
        $this->reset(['formName', 'formEmail', 'formRole', 'formStatus', 'formPassword']);
        $this->formRole   = 'staff';
        $this->formStatus = 'active';
        $this->showModal  = true;
        $this->resetErrorBag();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetErrorBag();
    }

    public function saveUser(): void
    {
        $this->validate([
            'formName'     => ['required', 'min:2'],
            'formEmail'    => ['required', 'email'],
            'formPassword' => ['required', 'min:8'],
        ]);

        $newId = max(array_column($this->allUsers, 'id')) + 1;
        $this->allUsers[] = [
            'id'         => $newId,
            'name'       => $this->formName,
            'email'      => $this->formEmail,
            'role'       => $this->formRole,
            'status'     => $this->formStatus,
            'joined'     => now()->format('M d, Y'),
            'last_login' => '—',
        ];

        $this->closeModal();
        session()->flash('success', "User \"{$this->formName}\" was added.");
    }

    public function toggleStatus(int $id): void
    {
        foreach ($this->allUsers as &$u) {
            if ($u['id'] === $id) {
                $u['status'] = $u['status'] === 'active' ? 'inactive' : 'active';
                break;
            }
        }
        unset($u);
    }

    public function confirmDelete(int $id): void { $this->deleteTarget = $id; }
    public function cancelDelete(): void         { $this->deleteTarget = null; }

    public function deleteUser(): void
    {
        $name = collect($this->allUsers)->firstWhere('id', $this->deleteTarget)['name'] ?? 'User';
        $this->allUsers = array_values(
            array_filter($this->allUsers, fn($u) => $u['id'] !== $this->deleteTarget)
        );
        $this->deleteTarget = null;
        session()->flash('success', "\"{$name}\" was removed.");
    }

    public function render()
    {
        return view('livewire.admin.user-maintenance');
    }
}
