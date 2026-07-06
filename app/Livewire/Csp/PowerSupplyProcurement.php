<?php

namespace App\Livewire\Csp;

use App\Models\CspBid;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Power Supply Procurement — TEI Tarlac Electric')]
class PowerSupplyProcurement extends Component
{
    #[Computed]
    public function bids(): Collection
    {
        return CspBid::with(['capacityRows', 'timelineRows', 'documents', 'bidBulletins', 'updates'])
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderByDesc('posted_date')
            ->get();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.csp.power-supply-procurement');
    }
}
