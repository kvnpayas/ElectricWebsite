<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Power Interruption Schedule',
      'badgeTitle' => 'Advisories',
      'subTitle'   => 'Stay informed about scheduled and emergency power interruptions in your area. Updates are posted as soon as information is available.',
  ])


  <x-guest-section>

    {{-- ── ONGOING ALERT BANNER ───────────────────────────────── --}}
    @if (count($this->ongoingAdvisories) > 0)
      <div class="mb-8 rounded-2xl border border-danger/20 bg-danger/4 overflow-hidden">
        <div class="flex items-center gap-3 px-5 py-3 bg-danger/8 border-b border-danger/15">
          <span class="relative flex h-2.5 w-2.5 shrink-0">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-danger opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-danger"></span>
          </span>
          <span class="text-xs font-bold uppercase tracking-wider text-danger">
            {{ count($this->ongoingAdvisories) }} Active Interruption{{ count($this->ongoingAdvisories) > 1 ? 's' : '' }} Right Now
          </span>
        </div>
        <div class="divide-y divide-danger/10">
          @foreach ($this->ongoingAdvisories as $a)
            @php
              $bannerNames = array_column($a->areas ?? [], 'barangay');
            @endphp
            <div class="flex items-start gap-4 px-5 py-4">
              <div class="w-8 h-8 rounded-lg bg-danger/10 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-tei-blue">{{ $a->title }}</p>
                <p class="text-xs text-tei-gray mt-0.5">
                  {{ implode(', ', array_slice($bannerNames, 0, 3)) }}{{ count($bannerNames) > 3 ? ' +' . (count($bannerNames) - 3) . ' more' : '' }}
                </p>
              </div>
              <span class="text-xs font-bold text-danger shrink-0">{{ $a->formatted_time }}</span>
            </div>
          @endforeach
        </div>
        <div class="px-5 py-3 bg-danger/4 border-t border-danger/10">
          <p class="text-[11px] text-danger/80">
            <svg class="inline w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Power may be restored earlier or later than estimated. For urgent concerns, call <strong>(045) 606-1834</strong>.
          </p>
        </div>
      </div>
    @endif


    {{-- ── FILTER TABS ─────────────────────────────────────────── --}}
    <div class="mb-6 flex flex-wrap gap-2">

      @php
        $tabs = [
          'all'       => ['label' => 'All',       'count' => $this->counts['all'],       'dot' => null],
          'scheduled' => ['label' => 'Scheduled', 'count' => $this->counts['scheduled'], 'dot' => 'bg-warning'],
          'ongoing'   => ['label' => 'Ongoing',   'count' => $this->counts['ongoing'],   'dot' => 'bg-danger'],
        ];
      @endphp

      @foreach ($tabs as $key => $tab)
        @php $isActive = $filter === $key; @endphp
        <button
          wire:click="setFilter('{{ $key }}')"
          class="flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold transition-all duration-200 cursor-pointer
            {{ $isActive
              ? 'bg-tei-blue text-white shadow-sm'
              : 'bg-white border border-tei-blue/12 text-tei-gray hover:border-tei-blue/25 hover:text-tei-blue' }}"
        >
          @if ($tab['dot'] && !$isActive)
            <span class="w-1.5 h-1.5 rounded-full {{ $tab['dot'] }} shrink-0"></span>
          @endif
          {{ $tab['label'] }}
          <span class="px-1.5 py-0.5 rounded-full text-[10px] font-black leading-none
            {{ $isActive ? 'bg-white/20 text-white' : 'bg-tei-blue/8 text-tei-blue' }}">
            {{ $tab['count'] }}
          </span>
        </button>
      @endforeach

    </div>


    {{-- ── ADVISORY CARDS GRID ─────────────────────────────────── --}}
    @if (count($this->schedules) === 0)
      <div class="text-center py-16">
        <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
          <svg class="w-7 h-7 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <p class="text-sm font-bold text-tei-blue mb-1">No advisories in this category</p>
        <p class="text-xs text-tei-gray-light">All clear for now. Check back for updates.</p>
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 ">
        @foreach ($this->schedules as $advisory)
          @php
            $isOngoing  = $advisory->status === 'ongoing';
            $isResolved = $advisory->status === 'resolved';

            $variant = match($advisory->status) {
              'resolved' => 'success',
              'ongoing'  => 'danger',
              default    => 'warning',
            };

            $timeColor = $isResolved ? 'text-success' : ($isOngoing ? 'text-danger' : 'text-tei-orange');

            $barangayNames = array_column($advisory->areas ?? [], 'barangay');
            $extraAreas    = max(0, count($barangayNames) - 3);
          @endphp

          <x-card :variant="$variant">

            {{-- Badge row --}}
            <div class="flex items-center justify-between mb-3">
              <div class="flex items-center gap-2">
                @if ($isOngoing)
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-danger/10 text-danger">
                    <span class="relative flex h-1.5 w-1.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-danger opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-danger"></span>
                    </span>
                    Ongoing
                  </span>
                @elseif ($isResolved)
                  <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-success/10 text-success">
                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                    Resolved
                  </span>
                @else
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-warning/15 text-warning">
                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Scheduled
                  </span>
                @endif
              </div>

              {{-- Date --}}
              <span class="text-[11px] text-tei-gray-light font-medium">{{ $advisory->scheduled_date->format('M j, Y') }}</span>
            </div>

            {{-- Title --}}
            <h3 class="text-sm font-bold text-tei-blue mb-3 leading-snug">{{ $advisory->title }}</h3>

            {{-- Time --}}
            <div class="flex items-center gap-1.5 mb-2">
              <svg class="w-3.5 h-3.5 shrink-0 {{ $timeColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-xs font-semibold {{ $timeColor }}">{{ $advisory->formatted_time }}</span>
            </div>

            {{-- Barangays --}}
            <div class="flex items-start gap-1.5 mb-3">
              <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span class="text-xs text-tei-gray leading-relaxed">
                {{ implode(', ', array_slice($barangayNames, 0, 3)) }}{{ $extraAreas > 0 ? ' +' . $extraAreas . ' more' : '' }}
              </span>
            </div>

            {{-- Reason --}}
            <p class="text-xs text-tei-gray-light leading-relaxed line-clamp-2">{{ $advisory->reason }}</p>

            {{-- Footer: View Full Advisory (only when image is available) --}}
            @if ($advisory->image_url)
              <x-slot:footer>
                <button
                  @click="$dispatch('view-advisory', @js(['image' => $advisory->image_url, 'title' => $advisory->title]))"
                  class="inline-flex items-center gap-1.5 text-xs font-bold transition-colors duration-200 cursor-pointer
                    {{ $isResolved ? 'text-success hover:text-success/80' : 'text-tei-blue hover:text-tei-orange' }}">
                  View Full Advisory
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </x-slot:footer>
            @endif

          </x-card>
        @endforeach
      </div>
    @endif


    {{-- ── DISCLAIMER ───────────────────────────────────────────── --}}
    <div class="mt-10 rounded-2xl p-5 bg-tei-blue/3 border border-tei-blue/8">
      <div class="flex gap-3 items-start">
        <div class="w-8 h-8 rounded-xl bg-tei-blue/8 flex items-center justify-center shrink-0">
          <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <p class="text-xs font-bold text-tei-blue mb-1">Notice</p>
          <p class="text-xs text-tei-gray leading-relaxed">
            TEI is committed to following its announced schedule, but there may be unavoidable instances in which the power might be restored at a different time. We appreciate your patience and understanding. For questions or concerns, call our hotline at <strong class="text-tei-blue">(045) 606-1834</strong> or follow us on Facebook at <strong class="text-tei-blue">tei.ph</strong>.
          </p>
        </div>
      </div>
    </div>

  </x-guest-section>


  {{-- ── IMAGE MODAL ─────────────────────────────────────────── --}}
  <div wire:ignore
    x-data="{ open: false, image: '', title: '' }"
    @view-advisory.window="open = true; image = $event.detail.image; title = $event.detail.title"
    x-show="open"
    x-cloak
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
  >
    {{-- Backdrop --}}
    <div
      class="absolute inset-0 bg-black/70 backdrop-blur-sm"
      @click="open = false"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    ></div>

    {{-- Modal panel --}}
    <div
      class="relative z-10 w-full max-w-3xl max-h-[90vh] flex flex-col rounded-2xl overflow-hidden shadow-2xl bg-white"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      @click.stop
    >
      {{-- Modal header --}}
      <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 shrink-0">
        <p class="text-sm font-bold text-tei-blue leading-snug pr-4" x-text="title"></p>
        <button @click="open = false"
                class="size-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-tei-gray transition-colors shrink-0 cursor-pointer">
          <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Image --}}
      <div class="overflow-y-auto">
        <img :src="image" :alt="title" class="w-full h-auto block">
      </div>
    </div>
  </div>

</div>
