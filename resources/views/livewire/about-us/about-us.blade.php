<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'About Us',
      'badgeTitle' => 'About TEI',
      'subTitle'   => 'Learn about Tarlac Electric Inc. — our history, governance, and commitment to powering the city of Tarlac.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — ABOUT TOPICS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    {{-- <div class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Who We Are</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            Tarlac Electric Inc. (TEI) is a private electric distribution utility that has been supplying electricity power to the City of Tarlac in the Tarlac province for over 70 years. TEI provides energy to countless residential homes and commercial establishments.
          </p>
        </div>
      </div>
    </div> --}}

    {{-- Section heading --}}
    <div class="text-center mb-10 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
        Explore
      </span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3 text-tei-blue">Learn More About TEI</h2>
      <p class="text-base max-w-xl mx-auto text-tei-gray">
        From our company profile to investor information, find everything you need to know about Tarlac Electric Inc.
      </p>
    </div>

    {{-- 5 cards in a responsive grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Profile --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Profile</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Discover the story of Tarlac Electric Inc. — our founding, mission, vision, and the values that guide us in serving over a hundred thousand customers across Tarlac.
        </p>
        <a href="{{ route('about-us.profile') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Profile
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 2. Corporate Governance --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Corporate Governance</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          TEI is committed to the highest standards of corporate governance. Learn about our board of directors, organizational structure, and the policies that ensure accountability and transparency.
        </p>
        <a href="#"
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Governance
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 3. Disclosures --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Disclosures</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Access official regulatory disclosures and filings required by the Energy Regulatory Commission (ERC) and other governing bodies, in line with our commitment to full transparency.
        </p>
        <a href="#"
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Disclosures
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 4. Investor Relations --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Investor Relations</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Find financial reports, annual statements, and key information for stakeholders and investors who trust in Tarlac Electric Inc.'s long-term growth and service commitment.
        </p>
        <a href="#"
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Investor Info
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 5. Press Materials / News --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Press Materials / News</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Stay up to date with the latest TEI news, press releases, announcements, and media resources. Follow our updates to know what's happening across the company and our service area.
        </p>
        <a href="#"
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Read Latest News
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

    </div>


  </x-guest-section>

</div>
