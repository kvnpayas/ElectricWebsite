<?php

namespace App\Livewire\Csp;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Power Supply Procurement — TEI Tarlac Electric')]
class PowerSupplyProcurement extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.csp.power-supply-procurement');
    }
}
