<?php

use App\Models\ProcurementOpportunity;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    #[Computed]
    public function opportunities(): \Illuminate\Database\Eloquent\Collection
    {
        return ProcurementOpportunity::where('is_published', true)->orderByDesc('posting_date')->orderByDesc('sort_order')->limit(3)->get();
    }
};
?>

<div>

  {{-- Section header --}}
  <div>
    <x-section-heading title="Procurement" heading="Procurement Opportunities"
      text="Current and upcoming procurement opportunities published in compliance with ERC Resolution No. 08, Series of 2023."
      align="center" />
  </div>
  <div class="flex flex-col items-end mb-12 gap-4 scroll-reveal">
    <a href="{{ route('procurement.opportunities') }}"
      class="self-start sm:self-auto inline-flex items-center gap-1.5 text-sm font-bold shrink-0 transition-colors duration-200 text-tei-orange hover:text-tei-orange-dark">
      View All Opportunities
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>
  </div>

  {{-- Cards --}}
  @if (count($this->opportunities) === 0)
    <div class="text-center py-16 scroll-reveal">
      <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
        <svg class="w-7 h-7 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
      </div>
      <p class="text-sm font-bold text-tei-blue mb-1">No active procurement listings</p>
      <p class="text-xs text-tei-gray-light">Check back for upcoming opportunities.</p>
    </div>
  @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 stagger-cards">
      @foreach ($this->opportunities as $opp)
        @php
          $status = strtolower($opp->status ?? 'open');

          $badgeClass = match ($status) {
              'closed' => 'bg-tei-gray/10 text-tei-gray',
              'awarded' => 'bg-success/10 text-success',
              'cancelled' => 'bg-danger/10 text-danger',
              default => 'bg-tei-orange/10 text-tei-orange',
          };

          $cardVariant = match ($status) {
              'closed' => 'accent',
              'awarded' => 'success',
              'cancelled' => 'danger',
              default => 'secondary',
          };
        @endphp

        <x-card :variant="$cardVariant">

          {{-- Status + posting date --}}
          <div class="flex items-center justify-between mb-3">
            <span
              class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide {{ $badgeClass }}">
              {{ ucfirst($status) }}
            </span>
            @if ($opp->posting_date)
              <span class="text-[11px] text-tei-gray-light font-medium">
                {{ $opp->posting_date->format('M j, Y') }}
              </span>
            @endif
          </div>

          {{-- Code --}}
          @if ($opp->code)
            <p class="text-[10px] font-bold text-tei-orange uppercase tracking-widest mb-1">{{ $opp->code }}</p>
          @endif

          {{-- Title --}}
          <h3 class="text-sm font-bold text-tei-blue mb-4 leading-snug line-clamp-3">{{ $opp->title }}</h3>

          {{-- Key dates --}}
          <div class="space-y-2">
            @if ($opp->bid_submission_deadline)
              <div class="flex items-start gap-2">
                <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-gray-light" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-xs text-tei-gray leading-relaxed">
                  <span class="font-semibold text-tei-blue">Bid Deadline:</span>
                  {{ $opp->bid_submission_deadline }}
                </span>
              </div>
            @endif
            @if ($opp->pre_bid_conference)
              <div class="flex items-start gap-2">
                <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-gray-light" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-xs text-tei-gray leading-relaxed">
                  <span class="font-semibold text-tei-blue">Pre-Bid:</span>
                  {{ $opp->pre_bid_conference }}
                </span>
              </div>
            @endif
          </div>

          {{-- Footer --}}
          <x-slot:footer>
            <a href="{{ route('procurement.opportunities') }}"
              class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-blue hover:text-tei-orange transition-colors duration-200">
              View Details
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
