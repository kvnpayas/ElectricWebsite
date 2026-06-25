<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Company Profile — TEI Tarlac Electric')]
class Profile extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.profile');
    }
}
