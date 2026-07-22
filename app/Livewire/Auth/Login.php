<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
  public string $email = '';
  public string $password = '';
  public bool $remember = false;

  public function authenticate(): void
  {
    $this->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'min:6'],
    ]);

    $user = User::where('email', $this->email)->first();

    if (!$user || !Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
      $this->addError('email', 'These credentials do not match our records.');
      return;
    }

    if ($user->status !== 'Active') {
      Auth::logout();
      $this->addError('email', 'Your account has been deactivated. Please contact the administrator.');
      return;
    }

    session()->regenerate();

    $user->update(['last_login' => now()]);

    $this->redirect(route('admin.dashboard'), navigate: true);
  }

  public function render()
  {
    return view('livewire.auth.login');
  }
}
