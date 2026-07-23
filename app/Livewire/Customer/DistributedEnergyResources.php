<?php

namespace App\Livewire\Customer;

use App\Models\HostingCapacityRow;
use App\Models\HostingCapacitySetting;
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
    public function setting(): HostingCapacitySetting
    {
        return HostingCapacitySetting::firstOrCreate([]);
    }

    #[Computed]
    public function asOfLabel(): string
    {
        $date = $this->setting->getRawOriginal('der_as_of_date');
        return $date ? 'As of ' . \Carbon\Carbon::parse($date)->format('F d, Y') : '';
    }

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
