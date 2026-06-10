<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('How to Read Your Bill — TEI Tarlac Electric')]
class HowToReadBill extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.how-to-read-bill');
    }
}
