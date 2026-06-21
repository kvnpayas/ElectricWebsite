<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Application Procedure — TEI Tarlac Electric')]
class ApplicationProcedure extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.application-procedure');
    }
}
