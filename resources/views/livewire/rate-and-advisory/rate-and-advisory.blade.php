<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Rates & Advisories',
      'badgeTitle' => 'Rates & Advisories',
      'subTitle' => 'Stay informed with the latest power interruption schedules, regulatory advisories, rate schedules, and official announcements from TEI.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — RATES & ADVISORIES TOPICS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Section heading --}}
    <div class="text-center mb-10 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
        Stay Informed
      </span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3 text-tei-blue">All Rates & Advisories</h2>
      <p class="text-base max-w-xl mx-auto text-tei-gray">
        From power interruption notices to approved rate schedules — find all official TEI publications and regulatory
        filings in one place.
      </p>
    </div>

    {{-- 4 cards in a responsive grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 stagger-cards">

      {{-- 1. Power Interruption Schedule --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Power Interruption Schedule</h3>
        <p class="text-sm leading-relaxed mb-4 text-tei-gray">
          View scheduled and emergency power interruptions in your area. Stay ahead of outages with real-time updates on
          affected barangays, interruption times, and the reason for each advisory.
        </p>
        {{-- Sub-items --}}
        {{-- <div class="space-y-1.5 pt-4 border-t" style="border-color: rgba(15,61,92,0.07);">
          @foreach ([['Scheduled Interruptions', 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'rate-and-advisories.power-interruption-schedule'], ['Ongoing / Active Outages', 'M13 10V3L4 14h7v7l9-11h-7z', 'rate-and-advisories.power-interruption-schedule'], ['Resolved Interruptions', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'rate-and-advisories.power-interruption-schedule']] as [$lbl, $ico, $url])
            <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
              class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-sm font-medium transition-colors duration-150"
              style="color: var(--color-tei-blue);"
              onmouseover="this.style.backgroundColor='rgba(231,103,39,0.06)'; this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--color-tei-blue)'">
              <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
              </svg>
              {{ $lbl }}
            </a>
          @endforeach
        </div> --}}
        <a href="{{ route('rate-and-advisories.power-interruption-schedule') }}"
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Power Interruption Schedule
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 2. Advisories --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Advisories</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Access official advisories and notices filed with the Energy Regulatory Commission (ERC). All documents are
          published in PDF format in compliance with transparency and public disclosure requirements.
        </p>
        <a href="{{ route('rate-and-advisories.advisories') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Advisories
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 3. Rate Schedule / Customer Class --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Rate Schedule / Customer Class</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Review the current approved electricity rates per customer class as authorized by the ERC. Rate schedules
          cover residential, commercial, industrial, and other applicable consumer categories.
        </p>
        <a href="{{ route('rate-and-advisories.rate-schedule') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Rate Schedule
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 4. Others --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Others</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Browse additional regulatory documents, public notices, and official publications that do not fall under a
          specific category — including ERC orders, resolutions, and other relevant issuances applicable to TEI
          customers.
        </p>
        <a href="{{ route('rate-and-advisories.other-documents') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Documents
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

    </div>

  </x-guest-section>

</div>
