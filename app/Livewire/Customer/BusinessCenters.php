<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.guest')]
#[Title('Business Centers — TEI Tarlac Electric')]
class BusinessCenters extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.business-centers');
    }
}
