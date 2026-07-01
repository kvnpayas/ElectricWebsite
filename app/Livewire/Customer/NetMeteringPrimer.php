<?php

namespace App\Livewire\Customer;

use App\Models\HostingCapacityRow;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Net Metering — TEI Tarlac Electric')]
class NetMeteringPrimer extends Component
{
    #[Computed]
    public function hostingRows(): Collection
    {
        return HostingCapacityRow::where('type', 'net-metering')
            ->orderBy('sort_order')
            ->get();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.customer.net-metering-primer');
    }
}
