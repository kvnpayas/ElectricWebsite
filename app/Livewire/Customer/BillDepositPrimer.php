<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Bill Deposit Primer — TEI Tarlac Electric')]
class BillDepositPrimer extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.bill-deposit-primer');
    }
}
