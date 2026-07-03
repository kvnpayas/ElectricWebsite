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
#[Title('Net Metering — TEI Tarlac Electric')]
class NetMeteringPrimer extends Component
{
    #[Computed]
    public function setting(): HostingCapacitySetting
    {
        return HostingCapacitySetting::firstOrCreate([]);
    }

    #[Computed]
    public function asOfLabel(): string
    {
        $date = $this->setting->getRawOriginal('as_of_date');
        return $date ? 'As of ' . \Carbon\Carbon::parse($date)->format('F d, Y') : '';
    }

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
