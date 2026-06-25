<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Contact Us — TEI Tarlac Electric')]
class ContactUs extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.contact-us');
    }
}
