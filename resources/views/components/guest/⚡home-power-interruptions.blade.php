<?php

use App\Models\PowerInterruptionSchedule as Schedule;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    #[Computed]
    public function schedules(): \Illuminate\Database\Eloquent\Collection
    {
        return Schedule::query()
            ->whereIn('status', ['ongoing', 'scheduled'])
            ->with('files')
            ->orderByRaw("CASE WHEN status = 'ongoing' THEN 0 ELSE 1 END")
            ->orderBy('scheduled_date')
            ->limit(3)
            ->get();
    }

    #[Computed]
    public function hasOngoing(): bool
    {
        return Schedule::where('status', 'ongoing')->exists();
    }
};
?>

<div>

  {{-- Section header --}}
  <div>
    <x-section-heading title="Stay Informed" heading="Power Interruption Schedule"
      text="Scheduled and ongoing power interruptions in your area. Updated as soon as information is available."
      align="center" />
  </div>
  <div class="flex flex-col items-end mb-12 gap-4 scroll-reveal">
    
    <a href="{{ route('rate-and-advisories.power-interruption-schedule') }}"
      class="self-start sm:self-auto inline-flex items-center gap-1.5 text-sm font-bold shrink-0 transition-colors duration-200 text-tei-orange hover:text-tei-orange-dark">
      View All Schedules
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>
  </div>

  {{-- Ongoing alert banner --}}
  @if ($this->hasOngoing)
    <div class="mb-8 rounded-2xl border border-danger/20 bg-danger/4 overflow-hidden">
      <div class="flex items-center gap-3 px-5 py-3 bg-danger/8 border-b border-danger/15">
        <span class="relative flex h-2.5 w-2.5 shrink-0">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-danger opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-danger"></span>
        </span>
        <span class="text-xs font-bold uppercase tracking-wider text-danger">
          Active interruption ongoing right now
        </span>
      </div>
      <div class="px-5 py-3">
        <p class="text-xs text-danger/80">
          Power may be restored earlier or later than estimated. For urgent concerns, call
          <strong>(045) 606-1834</strong>.
        </p>
      </div>
    </div>
  @endif

  {{-- Cards --}}
  @if (count($this->schedules) === 0)
    <div class="text-center  scroll-reveal">
      {{-- <div class="w-14 h-14 rounded-2xl bg-success/8 flex items-center justify-center mx-auto mb-4">
        <svg class="w-7 h-7 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div> --}}
      <p class="text-sm font-bold text-tei-blue mb-1">No active interruptions</p>
      <p class="text-xs text-tei-gray-light">All clear for now. We will post updates here as soon as they are available.
      </p>
    </div>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 stagger-cards">
      @foreach ($this->schedules as $schedule)
        @php
          $isOngoing = $schedule->status === 'ongoing';
          $variant   = $isOngoing ? 'danger' : 'warning';
        @endphp

        <x-card :variant="$variant">

          {{-- Status + date row --}}
          <div class="flex items-center justify-between mb-3">
            @if ($isOngoing)
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-danger/10 text-danger">
                <span class="relative flex h-1.5 w-1.5">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-danger opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-danger"></span>
                </span>
                Ongoing
              </span>
            @else
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-warning/15 text-warning">
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Scheduled
              </span>
            @endif
            <span class="text-[11px] text-tei-gray-light font-medium">
              {{ $schedule->scheduled_date->format('M j, Y') }}
            </span>
          </div>

          {{-- Title --}}
          <h3 class="text-sm font-bold text-tei-blue mb-2 leading-snug">{{ $schedule->title }}</h3>

          {{-- Reason --}}
          <p class="text-xs text-tei-gray leading-relaxed line-clamp-3">{{ $schedule->reason }}</p>

          {{-- Footer CTA --}}
          <x-slot:footer>
            <a href="{{ route('rate-and-advisories.power-interruption-schedule') }}"
              class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-blue hover:text-tei-orange transition-colors duration-200">
              View Full Schedule
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </x-slot:footer>

        </x-card>
      @endforeach
    </div>
  @endif

</div>
