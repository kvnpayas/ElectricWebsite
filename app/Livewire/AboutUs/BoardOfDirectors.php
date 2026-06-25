<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Board of Directors — TEI Tarlac Electric')]
class BoardOfDirectors extends Component
{
    public function render(): \Illuminate\View\View
    {
        return view('livewire.about-us.board-of-directors');
    }
}
