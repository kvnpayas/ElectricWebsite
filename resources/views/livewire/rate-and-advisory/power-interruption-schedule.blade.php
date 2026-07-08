<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Power Interruption Schedule',
      'badgeTitle' => 'Advisories',
      'subTitle'   => 'Stay informed about scheduled and ongoing power interruptions in your area. Updates are posted as soon as information is available.',
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
            <div class="flex items-start gap-4 px-5 py-4">
              <div class="w-8 h-8 rounded-lg bg-danger/10 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-tei-blue">{{ $a->title }}</p>
                <p class="text-xs text-tei-gray mt-0.5 line-clamp-2">{{ $a->reason }}</p>
              </div>
              <span class="text-xs font-semibold text-tei-gray-light shrink-0">{{ $a->scheduled_date->format('M j') }}</span>
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
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($this->schedules as $advisory)
          @php
            $isOngoing = $advisory->status === 'ongoing';

            $variant = match ($advisory->status) {
                'ongoing'  => 'danger',
                default    => 'warning',
            };
          @endphp

          <x-card :variant="$variant">

            {{-- Badge row --}}
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
                {{ $advisory->scheduled_date->format('M j, Y') }}
              </span>
            </div>

            {{-- Title --}}
            <h3 class="text-sm font-bold text-tei-blue mb-2 leading-snug">{{ $advisory->title }}</h3>

            {{-- Reason --}}
            <p class="text-xs text-tei-gray leading-relaxed line-clamp-3 mb-3">{{ $advisory->reason }}</p>


            {{-- Notice button --}}
            @if ($advisory->files->count() > 0)
              @php
                $allFiles  = $advisory->files
                    ->map(fn($f) => ['url' => $f->url, 'name' => $f->file_name])
                    ->values()->all();
                $fileCount = $advisory->files->count();
              @endphp
              <x-slot:footer>
                <button
                  @click="$dispatch('view-advisory', @js(['files' => $allFiles, 'startIndex' => 0, 'title' => $advisory->title]))"
                  class="inline-flex items-center gap-1.5 text-xs font-bold transition-colors duration-200 cursor-pointer
                    {{ $isOngoing ? 'text-danger hover:text-danger/80' : 'text-tei-blue hover:text-tei-orange' }}">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  View Notice
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


  {{-- ── IMAGE CAROUSEL MODAL ───────────────────────────────── --}}
  <div wire:ignore
    x-data="{
      open: false,
      files: [],
      current: 0,
      title: '',
      prev() { this.current = (this.current - 1 + this.files.length) % this.files.length; },
      next() { this.current = (this.current + 1) % this.files.length; }
    }"
    @view-advisory.window="open = true; files = $event.detail.files; current = $event.detail.startIndex ?? 0; title = $event.detail.title"
    @keydown.escape.window="open = false"
    @keydown.arrow-left.window="if (open && files.length > 1) prev()"
    @keydown.arrow-right.window="if (open && files.length > 1) next()"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4">

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"
      @click="open = false"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0">
    </div>

    {{-- Modal panel --}}
    <div class="relative z-10 w-full max-w-4xl flex flex-col rounded-2xl overflow-hidden shadow-2xl bg-white"
      style="max-height: 92vh;"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      @click.stop>

      {{-- Header --}}
      <div class="flex items-center justify-between gap-4 px-5 py-4 border-b border-gray-100 shrink-0 bg-white">
        <div class="min-w-0">
          <p class="text-sm font-bold text-tei-blue leading-snug truncate" x-text="title"></p>
          <p class="text-xs text-tei-gray-light mt-0.5" x-show="files.length > 1">
            Notice <span x-text="current + 1"></span> of <span x-text="files.length"></span>
          </p>
        </div>
        <button @click="open = false"
                class="size-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-tei-gray transition-colors shrink-0 cursor-pointer">
          <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Main image area --}}
      <div class="relative flex-1 overflow-hidden bg-gray-950 flex items-center justify-center min-h-0"
           style="min-height: 300px;">

        <img
          :src="files[current]?.url"
          :alt="files[current]?.name"
          class="block object-contain select-none"
          style="max-width: 100%; max-height: 62vh;"
        />

        {{-- Prev arrow --}}
        <button
          x-show="files.length > 1"
          @click="prev()"
          class="absolute left-3 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer"
          style="background: rgba(0,0,0,0.45); border: 1.5px solid rgba(255,255,255,0.2); color: white;"
          onmouseover="this.style.background='rgba(0,0,0,0.75)'; this.style.borderColor='rgba(255,255,255,0.5)'"
          onmouseout="this.style.background='rgba(0,0,0,0.45)'; this.style.borderColor='rgba(255,255,255,0.2)'">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        {{-- Next arrow --}}
        <button
          x-show="files.length > 1"
          @click="next()"
          class="absolute right-3 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer"
          style="background: rgba(0,0,0,0.45); border: 1.5px solid rgba(255,255,255,0.2); color: white;"
          onmouseover="this.style.background='rgba(0,0,0,0.75)'; this.style.borderColor='rgba(255,255,255,0.5)'"
          onmouseout="this.style.background='rgba(0,0,0,0.45)'; this.style.borderColor='rgba(255,255,255,0.2)'">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
          </svg>
        </button>

      </div>

      {{-- Thumbnail strip --}}
      <div x-show="files.length > 1"
           class="shrink-0 bg-gray-900 px-4 py-3">
        <div class="flex items-center gap-2 overflow-x-auto"
             style="scrollbar-width: none; -ms-overflow-style: none;">
          <template x-for="(file, i) in files" :key="i">
            <button
              @click="current = i"
              class="shrink-0 rounded-lg overflow-hidden transition-all duration-200 cursor-pointer hover:opacity-90"
              :style="i === current
                ? 'outline: 2px solid var(--color-tei-orange); outline-offset: 2px; opacity: 1;'
                : 'opacity: 0.45;'"
              :title="file.name">
              <img :src="file.url" :alt="file.name" class="block object-cover"
                   style="width: 72px; height: 52px;" />
            </button>
          </template>
        </div>
      </div>

    </div>
  </div>

</div>
