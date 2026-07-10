<?php

namespace App\Livewire\RateAndAdvisory;

use App\Models\PowerInterruptionSchedule as Schedule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Power Interruption Schedule — TEI Tarlac Electric')]
class PowerInterruptionSchedule extends Component
{
    public string $filter = 'all';

    #[Computed]
    public function schedules()
    {
        return Schedule::query()
            ->whereIn('status', ['scheduled', 'ongoing'])
            ->when($this->filter !== 'all', fn ($q) => $q->where('status', $this->filter))
            ->with('files')
            ->orderByRaw("CASE WHEN status = 'ongoing' THEN 0 ELSE 1 END")
            ->orderByDesc('created_at')
            ->get();
    }

    #[Computed]
    public function ongoingAdvisories()
    {
        return Schedule::where('status', 'ongoing')
            ->with('files')
            ->orderByDesc('scheduled_date')
            ->get();
    }

    #[Computed]
    public function counts(): array
    {
        $totals = Schedule::whereIn('status', ['scheduled', 'ongoing'])
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return [
            'all'       => $totals->sum(),
            'scheduled' => $totals->get('scheduled', 0),
            'ongoing'   => $totals->get('ongoing', 0),
        ];
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.rate-and-advisory.power-interruption-schedule');
    }
}
