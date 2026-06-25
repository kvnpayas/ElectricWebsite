<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Privacy Policy — TEI Tarlac Electric')]
class PrivacyPolicy extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.privacy-policy');
    }
}
