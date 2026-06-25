<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Executive Officers — TEI Tarlac Electric')]
class ExecutiveOfficers extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.executive-officers');
    }
}
