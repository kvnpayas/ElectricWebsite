<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Organizational Structure — TEI Tarlac Electric')]
class OrganizationalStructure extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.organizational-structure');
    }
}
