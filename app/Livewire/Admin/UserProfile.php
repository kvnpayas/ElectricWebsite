<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('My Profile — TEI Admin')]
class UserProfile extends Component
{
    public string $name  = '';
    public string $email = '';

    public string $currentPassword         = '';
    public string $newPassword             = '';
    public string $newPasswordConfirmation = '';

    public function mount(): void
    {
        $user        = Auth::user();
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function saveProfile(): void
    {
        $user = Auth::user();

        $this->validate([
            'name'  => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ], attributes: [
            'name'  => 'full name',
            'email' => 'email address',
        ]);

        $user->update([
            'name'  => trim($this->name),
            'email' => trim($this->email),
        ]);

        $this->logChange('Profile updated');
        $this->dispatch('toast', message: 'Profile saved successfully.');
    }

    public function changePassword(): void
    {
        $this->validate([
            'currentPassword'         => ['required', 'string'],
            'newPassword'             => ['required', 'string', Password::min(8), 'different:currentPassword'],
            'newPasswordConfirmation' => ['required', 'same:newPassword'],
        ], messages: [
            'newPassword.different'        => 'New password must differ from your current password.',
            'newPasswordConfirmation.same' => 'Passwords do not match.',
        ], attributes: [
            'currentPassword'         => 'current password',
            'newPassword'             => 'new password',
            'newPasswordConfirmation' => 'password confirmation',
        ]);

        $user = Auth::user();

        if (! Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'Current password is incorrect.');
            return;
        }

        $user->update(['password' => Hash::make($this->newPassword)]);

        $this->currentPassword         = '';
        $this->newPassword             = '';
        $this->newPasswordConfirmation = '';

        $this->logChange('Password changed');
        $this->dispatch('toast', message: 'Password updated successfully.');
    }

    private function logChange(string $label): void
    {
        $userId   = Auth::id();
        $userName = Auth::user()?->name ?? 'System';
        $ip       = request()->ip();

        ActivityLog::create([
            'user_id'       => $userId,
            'user_name'     => $userName,
            'action'        => 'updated',
            'subject_type'  => 'User',
            'subject_id'    => $userId,
            'subject_label' => $label,
            'ip_address'    => $ip,
        ]);

        Log::channel('user-logs')->info(sprintf(
            '[UPDATED] %s (ID:%s) — %s from %s',
            $userName, $userId ?? '—', $label, $ip
        ));
    }

    public function render(): \Illuminate\View\View
    {
        $user = Auth::user();

        return view('livewire.admin.user-profile', [
            'user'         => $user,
            'loginHistory' => ActivityLog::where('user_id', $user->id)
                                ->where('action', 'login')
                                ->latest()
                                ->take(5)
                                ->get(),
        ]);
    }
}
