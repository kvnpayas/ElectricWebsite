<?php

namespace App\Livewire\RateAndAdvisory;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Rates & Advisories — TEI Tarlac Electric')]
class RateAndAdvisory extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.rate-and-advisory.rate-and-advisory');
    }
}
