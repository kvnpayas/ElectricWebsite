<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Service Application — TEI Tarlac Electric')]
class ServiceApplication extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.service-application');
    }
}
