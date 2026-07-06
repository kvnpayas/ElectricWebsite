@extends('layouts.guest')

@section('title', 'TEI Tarlac Electric — Powering Tarlac, Every Day')
@section('description',
  'TEI Tarlac Electric Inc. — Your trusted power distribution company serving the province of
  Tarlac for over 50 years.')

@section('content')

  {{-- ═══════════════════════════════════════════════
     HERO CAROUSEL
═══════════════════════════════════════════════ --}}
  @livewire('guest.hero-carousel')


  {{-- ═══════════════════════════════════════════════
     QUICK LINKS
═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>
    <x-section-heading title="Quick Access" heading="What can we help you with?"
      text="Find information, forms, and the most frequently needed services — all in one place." align="center" />

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">
      <x-custom-card title="Rates & Advisories"
        text="Check current electricity tariff rates, ERC advisories, and notices that affect your monthly bill."
        href="rate-and-advisories" cta="View Rates" />

      <x-custom-card title="Power Interruption"
        text="View upcoming and ongoing scheduled power interruption notices for your area."
        href="rate-and-advisories.power-interruption-schedule" cta="View Schedules" />

      <x-custom-card title="Service Application"
        text="Apply for a new service connection or an additional meter for your home or business."
        href="customer.service-application" cta="Apply Now" />

      <x-custom-card title="Business Centers"
        text="Find the nearest TEI business center location, office hours, and contact numbers."
        href="customer.business-centers" cta="Find a Center" />

      <x-custom-card title="Senior Citizen Discount"
        text="Qualified senior citizens are entitled to a 5% discount on monthly electricity consumption."
        href="customer.senior-citizen-discount" cta="Learn More" />

      <x-custom-card title="Contact Us"
        text="Reach our team for inquiries, service concerns, complaints, or any form of assistance." href="contact-us"
        cta="Get in Touch" />
    </div>
  </x-guest-section-dark>

  {{-- ═══════════════════════════════════════════════
     POWER INTERRUPTION SCHEDULE
═══════════════════════════════════════════════ --}}
  <x-guest-section>
    @livewire('guest.home-power-interruptions')
  </x-guest-section>

  {{-- ═══════════════════════════════════════════════
     ABOUT / STATS
═══════════════════════════════════════════════ --}}
  <section class="py-24 relative overflow-hidden" style="background-color: var(--color-tei-blue);">

    {{-- Decorative orbs --}}
    <div class="absolute -top-32 -right-32 w-120 h-120 rounded-full blur-3xl pointer-events-none opacity-[0.12]"
      style="background: var(--color-tei-orange);"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 rounded-full blur-3xl pointer-events-none opacity-[0.06]"
      style="background: var(--color-tei-orange);"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

        {{-- Left: narrative --}}
        <div class="scroll-reveal">
          <div class="flex items-center gap-3 mb-5">
            <span class="block w-8 h-px shrink-0" style="background-color: var(--color-tei-orange);"></span>
            <span class="text-xs font-medium tracking-[0.22em] uppercase" style="color: rgba(255,255,255,0.45);">Our Track
              Record</span>
          </div>
          <h2 class="text-4xl sm:text-5xl font-black leading-tight mb-6"
            style="color: white; font-family: var(--font-display);">
            Powering Tarlac<br>since 1949.
          </h2>
          <p class="text-base leading-relaxed mb-8" style="color: rgba(255,255,255,0.6);">
            TEI Tarlac Electric Inc. has been Tarlac City's trusted power distribution company for over seven
            decades — connecting homes, supporting communities, and keeping the lights on across the city.
          </p>
          <a href="{{ route('about-us') }}"
            class="inline-flex items-center gap-2 text-sm font-bold transition-opacity duration-200 hover:opacity-75"
            style="color: var(--color-tei-orange);">
            Learn about TEI
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>

        {{-- Right: stats 2×2 --}}
        <div class="grid grid-cols-2 gap-8">
          @foreach ([
          ['75+', 'Years in Service', 'Established 1949'],
          // ['100K+', 'Customers Served',    'In Tarlac City'],
          // ['Tarlac City', 'Franchise Area', 'ERC-Licensed Distributor'],
          ['24/7', 'Emergency Response', 'Always on call'],
      ] as [$val, $lbl, $sub])
            <div class="border-t-2 pt-5 scroll-reveal" style="border-color: rgba(231,103,39,0.35);">
              <div class="text-4xl sm:text-5xl font-black mb-2"
                style="font-family: var(--font-display); color: var(--color-tei-orange);">{{ $val }}</div>
              <div class="text-sm font-bold mb-1" style="color: white;">{{ $lbl }}</div>
              <div class="text-xs" style="color: rgba(255,255,255,0.4);">{{ $sub }}</div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     PROCUREMENT OPPORTUNITIES
═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>
    @livewire('guest.home-procurement')
  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     QUICK ACTIONS
═══════════════════════════════════════════════ --}}
  {{-- <section class="py-20" style="background-color: var(--color-tei-white);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12 scroll-reveal">
        <h2 class="text-3xl sm:text-4xl font-black mb-3"
          style="font-family: var(--font-display); color: var(--color-tei-blue);">
          What do you need today?
        </h2>
        <p class="text-base" style="color: var(--color-tei-gray);">Quick access to our most-used services.</p>
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 stagger-cards">
        @php
          $actions = [
              [
                  'path' =>
                      'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
                  'label' => 'Pay My Bill',
                  'sub' => 'Online payment portal',
                  'bg' => 'var(--color-tei-orange)',
                  'dark' => true,
              ],
              [
                  'path' =>
                      'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                  'label' => 'Report Outage',
                  'sub' => 'Power interruption report',
                  'bg' => 'var(--color-tei-blue)',
                  'dark' => true,
              ],
              [
                  'path' =>
                      'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                  'label' => 'Apply for Meter',
                  'sub' => 'New service connection',
                  'bg' => 'var(--color-tei-surface)',
                  'dark' => false,
              ],
              [
                  'path' =>
                      'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                  'label' => 'E-SOA Sign Up',
                  'sub' => 'Go paperless today',
                  'bg' => 'var(--color-tei-surface)',
                  'dark' => false,
              ],
          ];
        @endphp
        @foreach ($actions as $act)
          <a href="#"
            class="card group flex flex-col items-center text-center p-6 sm:p-8 rounded-2xl border cursor-pointer transition-[box-shadow,border-color] duration-300"
            style="background-color: {{ $act['bg'] }}; border-color: {{ $act['dark'] ? 'transparent' : 'rgba(15,61,92,0.08)' }};"
            onmouseover="this.style.transform='translateY(-5px) scale(1.02)'; this.style.boxShadow='0 20px 40px rgba(15,61,92,0.15)'"
            onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-4"
              style="background-color: {{ $act['dark'] ? 'rgba(255,255,255,0.15)' : 'rgba(15,61,92,0.07)' }};">
              <svg class="w-7 h-7" fill="none" stroke="{{ $act['dark'] ? 'white' : 'var(--color-tei-blue)' }}"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $act['path'] }}" />
              </svg>
            </div>
            <span class="text-base font-bold leading-tight mb-1"
              style="color: {{ $act['dark'] ? 'white' : 'var(--color-tei-blue)' }};">{{ $act['label'] }}</span>
            <span class="text-xs"
              style="color: {{ $act['dark'] ? 'rgba(255,255,255,0.6)' : 'var(--color-tei-gray)' }};">{{ $act['sub'] }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </section> --}}

@endsection

@push('scripts')
  <script>
    function teiHero() {
      if (!document.getElementById('hero-tag')) return;
      gsap.timeline({
          defaults: {
            ease: 'power3.out'
          }
        })
        .from('#hero-tag', {
          opacity: 0,
          y: 28,
          duration: 0.7
        })
        .from('#hero-title', {
          opacity: 0,
          y: 50,
          duration: 0.9
        }, '-=0.4')
        .from('#hero-sub', {
          opacity: 0,
          y: 30,
          duration: 0.7
        }, '-=0.5')
        .from('#hero-ctas', {
          opacity: 0,
          y: 20,
          duration: 0.6
        }, '-=0.4');
    }

    if (document.readyState === 'complete') {
      teiHero();
    } else {
      window.addEventListener('load', teiHero);
    }

    document.addEventListener('livewire:navigated', teiHero);
  </script>
@endpush
