<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Management Team — TEI Tarlac Electric')]
class ManagementTeam extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.management-team');
    }
}
