<?php

namespace App\Livewire\Customer;

use App\Models\HostingCapacityRow;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Distributed Energy Resources — TEI Tarlac Electric')]
class DistributedEnergyResources extends Component
{
    #[Computed]
    public function feederRows(): Collection
    {
        return HostingCapacityRow::where('type', 'der-feeder')
            ->orderBy('sort_order')
            ->get();
    }

    #[Computed]
    public function substationRows(): Collection
    {
        return HostingCapacityRow::where('type', 'der-substation')
            ->orderBy('sort_order')
            ->get();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.distributed-energy-resources');
    }
}
