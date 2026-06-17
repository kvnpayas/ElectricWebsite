<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Appliance Calculator — TEI Tarlac Electric')]
class Calculator extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.calculator');
    }
}
