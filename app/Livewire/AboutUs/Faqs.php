<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('FAQs — TEI Tarlac Electric')]
class Faqs extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.faqs');
    }
}
