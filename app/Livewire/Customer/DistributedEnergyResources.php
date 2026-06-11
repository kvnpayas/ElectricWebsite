<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Distributed Energy Resources — TEI Tarlac Electric')]
class DistributedEnergyResources extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.distributed-energy-resources');
    }
}
