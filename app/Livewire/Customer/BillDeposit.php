<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Bill Deposit — TEI Tarlac Electric')]
class BillDeposit extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.bill-deposit');
    }
}
