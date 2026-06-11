<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Net Metering — TEI Tarlac Electric')]
class NetMeteringPrimer extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.net-metering-primer');
    }
}
