<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('About Us — TEI Tarlac Electric')]
class AboutUs extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.about-us');
    }
}
