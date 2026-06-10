<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('User Maintenance — TEI Admin')]
class UserMaintenance extends Component
{
  public array $allUsers = [];
  public string $search = '';
  public string $roleFilter = 'all';
  public string $statusFilter = 'all';
  public bool $showModal = false;
  public ?int $deleteTarget = null;

  public string $formUserId = '';
  public string $formName = '';
  public string $formEmail = '';
  public string $formRole = 'editor';
  public string $formStatus = 'Active';
  public ?string $formPassword = null;
  public string $formMode = 'add';

  #[Computed]
  public function users()
  {
    return User::query()
      ->when($this->search, function ($q) {
        $q->where(function ($q) {
          $q->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%');
        });
      })
      ->when($this->roleFilter !== 'all', fn($q) => $q->where('role', $this->roleFilter))
      ->when($this->statusFilter !== 'all', fn($q) => $q->where('status', $this->statusFilter))
      ->latest()
      ->paginate(10);
  }

  #[Computed]
  public function stats(): array
  {
    $total = User::count();
    $active = User::where('status', 'active')->count();
    $admins = User::where('role', 'admin')->count();
    $editor = User::where('role', 'editor')->count();

    return [
      'total' => $total,
      'active' => $active,
      'inactive' => $total - $active,
      'admins' => $admins,
      'editor' => $editor,
    ];
  }

  public function openAdd(): void
  {
    $this->reset(['formName', 'formEmail', 'formRole', 'formStatus', 'formPassword']);
    $this->formRole = 'editor';
    $this->formStatus = 'Active';
    $this->formMode = 'add';
    $this->showModal = true;
    $this->resetErrorBag();
  }

  public function closeModal(): void
  {
    $this->showModal = false;
    $this->resetErrorBag();
  }

  public function saveUser(): void
  {
    if ($this->formMode === 'edit') {
      $this->updateUser();
    } else {
      $this->createUser();
    }
  }

  public function createUser(): void
  {
    $this->validate([
      'formName' => ['required', 'min:2'],
      'formEmail' => ['required', 'email', 'unique:users,email'],
      'formPassword' => ['required', 'min:8'],
    ]);

    User::create([
      'name' => $this->formName,
      'email' => $this->formEmail,
      'role' => $this->formRole,
      'status' => $this->formStatus,
      'password' => Hash::make($this->formPassword),
    ]);

    $this->closeModal();
    session()->flash('success', "User \"{$this->formName}\" was added.");
  }

  public function openEdit(int $id): void
  {
    $user = User::findOrFail($id);
    $this->formUserId = $id;
    $this->formName = $user->name;
    $this->formEmail = $user->email;
    $this->formRole = $user->role;
    $this->formStatus = $user->status;
    $this->formPassword = null;
    $this->formMode = 'edit';
    $this->showModal = true;
  }

  public function updateUser(): void
  {
    $this->validate([
      'formName' => ['required', 'min:2'],
      'formEmail' => ['required', 'email', 'unique:users,email,' . $this->formUserId],
    ]);

    $user = User::findOrFail($this->formUserId);
    $user->update([
      'name' => $this->formName,
      'email' => $this->formEmail,
      'role' => $this->formRole,
      'status' => $this->formStatus,
    ]);

    $this->closeModal();
    session()->flash('success', "User \"{$this->formName}\" was updated.");
  }

  public function toggleStatus(int $id): void
  {
    $user = User::findOrFail($id);
    $user->update([
      'status' => $user->status === 'Active' ? 'Inactive' : 'Active',
    ]);
  }
  public function confirmDelete(int $id): void
  {
    $this->deleteTarget = $id;
  }
  public function cancelDelete(): void
  {
    $this->deleteTarget = null;
  }

  public function deleteUser(): void
  {
    $user = User::findOrFail($this->deleteTarget);
    $name = $user->name;
    $user->delete();

    $this->deleteTarget = null;
    session()->flash('success', "\"{$name}\" was removed.");
  }

  public function render()
  {
    return view('livewire.admin.user-maintenance');
  }
}
