<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Senior Citizen Discount — TEI Tarlac Electric')]
class SeniorCitizenDiscount extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.senior-citizen-discount');
    }
}
