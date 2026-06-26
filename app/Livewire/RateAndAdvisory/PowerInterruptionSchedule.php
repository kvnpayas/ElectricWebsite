<?php

namespace App\Livewire\RateAndAdvisory;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Power Interruption Schedule — TEI Tarlac Electric')]
class PowerInterruptionSchedule extends Component
{
    public string $filter = 'all';

    // Replace with Eloquent query once DB model is ready
    protected array $advisories = [
        [
            'id'       => 1,
            'status'   => 'ongoing',
            'title'    => 'Scheduled Interruption — Cut Cut 1 & Poblacion',
            'date'     => 'June 21, 2026',
            'time'     => '6:00 AM – 12:00 NN',
            'areas'    => ['Cut Cut 1', 'Poblacion', 'San Vicente', 'STI Tarlac'],
            'reason'   => 'Reconfiguration of primary pole and tapping of primary line along F. Tañedo St. and M.H. Del Pilar St.',
        ],
        [
            'id'       => 2,
            'status'   => 'ongoing',
            'title'    => 'Scheduled Interruption — Ligtasan Zone B',
            'date'     => 'June 21, 2026',
            'time'     => '6:00 AM – 6:30 AM, 11:30 AM – 12:00 NN',
            'areas'    => ['Ligtasan', 'Block 1', 'Block 2', 'Mabini'],
            'reason'   => 'Relocation of primary poles due to DPWH road-widening project from Balete to DPCH.',
        ],
        [
            'id'       => 3,
            'status'   => 'scheduled',
            'title'    => 'Scheduled Interruption — Zone A',
            'date'     => 'June 25, 2026',
            'time'     => '8:00 AM – 5:00 PM',
            'areas'    => ['Brgy. San Sebastian', 'San Vicente', 'San Jose'],
            'reason'   => 'Tree trimming and preventive line maintenance.',
        ],
        [
            'id'       => 4,
            'status'   => 'scheduled',
            'title'    => 'Line Maintenance — Tarlac City Proper',
            'date'     => 'June 27, 2026',
            'time'     => '7:00 AM – 4:00 PM',
            'areas'    => ['Brgy. Sto. Cristo', 'San Nicolas', 'Sinait'],
            'reason'   => 'Replacement of deteriorated distribution lines.',
        ],
        [
            'id'       => 5,
            'status'   => 'scheduled',
            'title'    => 'Scheduled Interruption — Sto. Niño & San Roque',
            'date'     => 'June 28, 2026',
            'time'     => '9:00 AM – 3:00 PM',
            'areas'    => ['Sto. Niño', 'San Roque', 'Barangay Hall Area'],
            'reason'   => 'Installation of additional primary pole and line re-routing.',
        ],
        [
            'id'       => 6,
            'status'   => 'resolved',
            'title'    => 'Scheduled Interruption — Poblacion Zone',
            'date'     => 'June 18, 2026',
            'time'     => '6:00 AM – 12:00 NN',
            'areas'    => ['Poblacion', 'Espinosa Street', 'F. Tañedo Street', 'Juan Luna Street'],
            'reason'   => 'Reconfiguration of primary pole along F. Tañedo St. and M.H. Del Pilar St., Brgy. Poblacion.',
        ],
        [
            'id'       => 7,
            'status'   => 'resolved',
            'title'    => 'Scheduled Interruption — Ligtasan & Mabini',
            'date'     => 'June 17, 2026',
            'time'     => '6:00 AM – 6:30 AM, 11:30 AM – 12:00 NN',
            'areas'    => ['Ligtasan', 'Block 1', 'Mabini', 'Portion of Block 2'],
            'reason'   => 'Relocation of primary poles due to DPWH road-widening project from Balete to DPCH.',
        ],
        [
            'id'       => 8,
            'status'   => 'resolved',
            'title'    => 'Scheduled Interruption — Sta. Catalina',
            'date'     => 'June 5, 2026',
            'time'     => '6:00 AM – 12:00 NN',
            'areas'    => ['Sta. Catalina', 'Phase 1 & 2, DPC Homes', 'Road from DPCH to Balete', 'St. Joseph Homes'],
            'reason'   => 'Preventive maintenance and pole replacement along the Sta. Catalina feeder line.',
        ],
    ];

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function render(): \Illuminate\View\View
    {
        $filtered = $this->filter === 'all'
            ? $this->advisories
            : array_values(array_filter($this->advisories, fn ($a) => $a['status'] === $this->filter));

        return view('livewire.rate-and-advisory.power-interruption-schedule', [
            'advisories'        => $filtered,
            'ongoingAdvisories' => array_values(array_filter($this->advisories, fn ($a) => $a['status'] === 'ongoing')),
            'counts'            => [
                'all'       => \count($this->advisories),
                'scheduled' => \count(array_filter($this->advisories, fn ($a) => $a['status'] === 'scheduled')),
                'ongoing'   => \count(array_filter($this->advisories, fn ($a) => $a['status'] === 'ongoing')),
                'resolved'  => \count(array_filter($this->advisories, fn ($a) => $a['status'] === 'resolved')),
            ],
        ]);
    }
}
