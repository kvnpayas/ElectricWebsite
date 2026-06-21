<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Application Requirements — TEI Tarlac Electric')]
class ApplicationRequirements extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.application-requirements');
    }
}
