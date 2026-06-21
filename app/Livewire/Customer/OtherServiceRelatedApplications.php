<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Other Service Related Applications — TEI Tarlac Electric')]
class OtherServiceRelatedApplications extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.other-service-related-applications');
    }
}
