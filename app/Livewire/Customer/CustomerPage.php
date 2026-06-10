<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Customer Services — TEI Tarlac Electric')]
class CustomerPage extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.customer-page');
    }
}
