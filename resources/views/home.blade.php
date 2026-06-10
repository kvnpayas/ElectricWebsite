@extends('layouts.guest')

@section('title', 'TEI Tarlac Electric — Powering Tarlac, Every Day')
@section('description', 'TEI Tarlac Electric Inc. — Your trusted power distribution company serving the province of
  Tarlac for over 50 years.')

@section('content')

  {{-- ═══════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════ --}}
  <section class="relative min-h-screen flex items-center overflow-hidden"
    style="background: linear-gradient(135deg, #082840 0%, #0F3D5C 50%, #1A5A85 100%);">

    {{-- Floating decorative orbs --}}
    <div class="absolute top-20 right-[8%] w-96 h-96 rounded-full blur-3xl pointer-events-none animate-float"
      style="background: radial-gradient(circle, rgba(231,103,39,0.28) 0%, rgba(231,103,39,0.04) 70%);"></div>
    <div class="absolute bottom-28 left-[4%] w-64 h-64 rounded-full blur-2xl pointer-events-none animate-float-slow"
      style="background: radial-gradient(circle, rgba(231,103,39,0.2) 0%, transparent 70%);"></div>
    <div class="absolute top-1/2 right-[28%] w-36 h-36 rounded-full blur-xl pointer-events-none animate-float-delay"
      style="background: radial-gradient(circle, rgba(65,182,230,0.18) 0%, transparent 70%);"></div>

    {{-- Subtle dot grid --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.035]"
      style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 32px 32px;">
    </div>

    {{-- Top shimmer line --}}
    <div class="absolute top-0 left-0 right-0 h-px"
      style="background: linear-gradient(90deg, transparent 0%, rgba(231,103,39,0.8) 50%, transparent 100%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 lg:py-0">
      <div class="max-w-3xl">

        {{-- Trust badge --}}
        <div id="hero-tag" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full mb-8 border"
          style="background: rgba(231,103,39,0.12); border-color: rgba(231,103,39,0.3);">
          <span class="w-2 h-2 rounded-full"
            style="background-color: var(--color-tei-orange); animation: pulse-glow 2.5s ease-in-out infinite;"></span>
          <span class="text-xs font-bold tracking-[0.15em] uppercase" style="color: var(--color-tei-orange);">Trusted
            Utility Provider Since 1962</span>
        </div>

        {{-- Headline --}}
        <h1 id="hero-title" class="text-5xl sm:text-6xl lg:text-7xl font-black leading-[1.04] mb-6"
          style="font-family: var(--font-display); color: white;">
          Powering<br>
          <span style="color: var(--color-tei-orange);">Tarlac,</span><br>
          Every Day.
        </h1>

        {{-- Sub --}}
        <p id="hero-sub" class="text-lg sm:text-xl leading-relaxed mb-10 max-w-xl" style="color: rgba(255,255,255,0.7);">
          TEI Tarlac Electric Inc. delivers reliable power to over
          <strong style="color: white; font-weight: 700;">100,000 customers</strong>
          across the province. Your electricity, our commitment.
        </p>

        {{-- CTAs --}}
        <div id="hero-ctas" class="flex flex-wrap gap-4">
          <a href="#"
            class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl text-base font-bold shadow-xl transition-all duration-200 cursor-pointer"
            style="background-color: var(--color-tei-orange); color: white;"
            onmouseover="this.style.backgroundColor='var(--color-tei-orange-dark)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 24px 48px rgba(231,103,39,0.45)'"
            onmouseout="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform='translateY(0)'; this.style.boxShadow=''">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Pay Your Bill
          </a>
          <a href="#"
            class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl text-base font-bold border-2 transition-all duration-200 cursor-pointer"
            style="border-color: rgba(255,255,255,0.35); color: white;"
            onmouseover="this.style.borderColor='rgba(255,255,255,0.8)'; this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='translateY(-3px)'"
            onmouseout="this.style.borderColor='rgba(255,255,255,0.35)'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)'">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Apply for Service
          </a>
        </div>

        {{-- Scroll hint --}}
        <div class="mt-16 hidden sm:flex items-center gap-3" style="color: rgba(255,255,255,0.35);">
          <div class="w-6 h-10 rounded-full border-2 flex items-start justify-center p-1.5"
            style="border-color: rgba(255,255,255,0.2);">
            <div class="w-1 h-2 rounded-full animate-bounce" style="background-color: rgba(255,255,255,0.4);"></div>
          </div>
          <span class="text-xs tracking-[0.2em] uppercase font-medium">Scroll to explore</span>
        </div>
      </div>
    </div>

    {{-- Abstract electric tower SVG (decorative) --}}
    <div class="absolute right-0 inset-y-0 w-2/5 hidden lg:block pointer-events-none overflow-hidden">
      <svg class="w-full h-full opacity-[0.06]" viewBox="0 0 400 600" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M200 40 L155 180 L220 180 L185 320 L250 320 L215 460" stroke="white" stroke-width="3"
          stroke-dasharray="10 5" />
        <path d="M200 40 L245 180 L180 180 L215 320 L150 320 L185 460" stroke="white" stroke-width="3"
          stroke-dasharray="10 5" />
        <circle cx="200" cy="40" r="7" fill="white" />
        <circle cx="200" cy="180" r="5" fill="white" />
        <circle cx="200" cy="320" r="5" fill="white" />
        <line x1="120" y1="180" x2="280" y2="180" stroke="white" stroke-width="2" />
        <line x1="140" y1="320" x2="260" y2="320" stroke="white" stroke-width="2" />
        <line x1="120" y1="180" x2="120" y2="212" stroke="white" stroke-width="1.5" />
        <line x1="170" y1="180" x2="170" y2="212" stroke="white" stroke-width="1.5" />
        <line x1="230" y1="180" x2="230" y2="212" stroke="white" stroke-width="1.5" />
        <line x1="280" y1="180" x2="280" y2="212" stroke="white" stroke-width="1.5" />
        <line x1="140" y1="320" x2="140" y2="352" stroke="white" stroke-width="1.5" />
        <line x1="185" y1="320" x2="185" y2="352" stroke="white" stroke-width="1.5" />
        <line x1="215" y1="320" x2="215" y2="352" stroke="white" stroke-width="1.5" />
        <line x1="260" y1="320" x2="260" y2="352" stroke="white" stroke-width="1.5" />
      </svg>
    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SERVICES
═══════════════════════════════════════════════ --}}
  <section id="services" class="py-24" style="background-color: var(--color-tei-white);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="text-center mb-16 scroll-reveal">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4"
          style="background: rgba(231,103,39,0.1); color: var(--color-tei-orange);">What We Offer</span>
        <h2 class="text-4xl sm:text-5xl font-black mb-4"
          style="font-family: var(--font-display); color: var(--color-tei-blue);">Our Services</h2>
        <p class="text-lg max-w-2xl mx-auto" style="color: var(--color-tei-gray);">
          From new connections to bill payments — managing your electricity made simple, fast, and reliable.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">
        @php
          $services = [
              [
                  'path' =>
                      'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
                  'title' => 'Bill Payment',
                  'desc' =>
                      'Pay your electricity bill online, via GCash, or at any authorized payment center. Fast, secure, and hassle-free.',
                  'cta' => 'Pay Now',
              ],
              [
                  'path' =>
                      'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                  'title' => 'New Connection',
                  'desc' =>
                      'Apply for a new service connection or additional meter for your home or business in a few easy steps.',
                  'cta' => 'Apply Now',
              ],
              [
                  'path' =>
                      'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                  'title' => 'Report Outage',
                  'desc' =>
                      'Experiencing a power interruption? Report it instantly and our crew will restore power as quickly as possible.',
                  'cta' => 'Report Now',
              ],
              [
                  'path' =>
                      'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                  'title' => 'E-SOA Enrollment',
                  'desc' =>
                      'Go paperless! Enroll in our e-Statement of Account program and receive your monthly bill via email.',
                  'cta' => 'Enroll Now',
              ],
              [
                  'path' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                  'title' => 'Senior Citizen Discount',
                  'desc' =>
                      'Qualified senior citizens are entitled to a 5% discount on monthly electricity consumption. Apply here.',
                  'cta' => 'Learn More',
              ],
              [
                  'path' =>
                      'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                  'title' => 'Power Rates & Advisories',
                  'desc' =>
                      'Stay updated with current electricity rates, scheduled maintenance, and power interruption advisories.',
                  'cta' => 'View Rates',
              ],
          ];
        @endphp

        @foreach ($services as $svc)
          <div
            class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color] duration-300"
            style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
            onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
            onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5"
              style="background: rgba(231,103,39,0.1);">
              <svg class="w-7 h-7" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $svc['path'] }}" />
              </svg>
            </div>
            <h3 class="text-lg font-bold mb-2" style="color: var(--color-tei-blue);">{{ $svc['title'] }}</h3>
            <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">{{ $svc['desc'] }}</p>
            <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
              style="color: var(--color-tei-orange);">
              {{ $svc['cta'] }}
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <div
              class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
              style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
          </div>
        @endforeach
      </div>
    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     STATS
═══════════════════════════════════════════════ --}}
  <section class="py-20 relative overflow-hidden" style="background-color: var(--color-tei-blue);">
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full blur-3xl pointer-events-none opacity-20"
      style="background: var(--color-tei-orange);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ([['50+', 'Years of Service', 'Est. 1962'], ['100K+', 'Customers Served', 'Across Tarlac Province'], ['15+', 'Municipalities', 'Coverage Area'], ['24/7', 'Emergency Response', 'Always on call']] as [$val, $lbl, $sub])
          <div class="text-center scroll-reveal">
            <div class="text-5xl font-black mb-1"
              style="font-family: var(--font-display); color: var(--color-tei-orange);">{{ $val }}</div>
            <div class="text-sm font-bold mb-1" style="color: white;">{{ $lbl }}</div>
            <div class="text-xs" style="color: rgba(255,255,255,0.45);">{{ $sub }}</div>
            <div class="mt-3 mx-auto w-8 h-0.5 rounded-full opacity-40"
              style="background-color: var(--color-tei-orange);"></div>
          </div>
        @endforeach
      </div>
    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     POWER ADVISORIES
═══════════════════════════════════════════════ --}}
  <section class="py-24" style="background-color: var(--color-tei-surface);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4 scroll-reveal">
        <div>
          <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4"
            style="background: rgba(231,103,39,0.1); color: var(--color-tei-orange);">Stay Informed</span>
          <h2 class="text-4xl font-black" style="font-family: var(--font-display); color: var(--color-tei-blue);">
            Power Advisories
          </h2>
        </div>
        <a href="#" class="self-start sm:self-auto inline-flex items-center gap-1.5 text-sm font-bold"
          style="color: var(--color-tei-orange);">
          View All
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">
        @php
          $advisories = [
              [
                  'badge' => 'Scheduled',
                  'badgeColor' => '#FFB81C',
                  'date' => 'June 8, 2026',
                  'time' => '8:00 AM – 5:00 PM',
                  'title' => 'Scheduled Interruption – Zone A',
                  'area' => 'Brgy. San Sebastian, San Vicente, San Jose',
                  'reason' => 'Tree trimming and line maintenance.',
              ],
              [
                  'badge' => 'Scheduled',
                  'badgeColor' => '#FFB81C',
                  'date' => 'June 10, 2026',
                  'time' => '7:00 AM – 4:00 PM',
                  'title' => 'Line Maintenance – Tarlac City Proper',
                  'area' => 'Brgy. Sto. Cristo, San Nicolas, Sinait',
                  'reason' => 'Replacement of deteriorated distribution lines.',
              ],
              [
                  'badge' => 'Emergency',
                  'badgeColor' => '#E76727',
                  'date' => 'June 5, 2026',
                  'time' => 'Ongoing',
                  'title' => 'Emergency Restoration – Concepcion',
                  'area' => 'Concepcion, La Paz District',
                  'reason' => 'Restoration underway after storm-related damage.',
              ],
          ];
        @endphp

        @foreach ($advisories as $adv)
          <div
            class="card bg-white rounded-2xl overflow-hidden border transition-[box-shadow,border-color] duration-300 cursor-pointer"
            style="border-color: rgba(15,61,92,0.08); box-shadow: 0 2px 8px rgba(15,61,92,0.05);"
            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 16px 40px rgba(15,61,92,0.12)'"
            onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 8px rgba(15,61,92,0.05)'">
            <div class="h-1" style="background-color: {{ $adv['badgeColor'] }};"></div>
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 rounded-full text-xs font-bold"
                  style="background-color: {{ $adv['badgeColor'] }}22; color: {{ $adv['badgeColor'] }};">
                  {{ $adv['badge'] }}
                </span>
                <span class="text-xs" style="color: var(--color-tei-gray-light);">{{ $adv['date'] }}</span>
              </div>
              <h3 class="font-bold text-base mb-1 leading-snug" style="color: var(--color-tei-blue);">
                {{ $adv['title'] }}</h3>
              <p class="text-xs font-semibold mb-3 flex items-center gap-1.5" style="color: var(--color-tei-orange);">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $adv['time'] }}
              </p>
              <p class="text-xs leading-relaxed mb-2" style="color: var(--color-tei-gray);">
                <svg class="w-3.5 h-3.5 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  style="color: var(--color-tei-gray-light);">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $adv['area'] }}
              </p>
              <p class="text-xs leading-relaxed pb-4 border-b mb-4"
                style="color: var(--color-tei-gray-light); border-color: rgba(15,61,92,0.07);">{{ $adv['reason'] }}</p>
              <a href="#" class="inline-flex items-center gap-1 text-xs font-bold"
                style="color: var(--color-tei-blue);">
                View Full Advisory
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     QUICK ACTIONS
═══════════════════════════════════════════════ --}}
  <section class="py-20" style="background-color: var(--color-tei-white);">
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
  </section>


  {{-- ═══════════════════════════════════════════════
     CONTACT STRIP
═══════════════════════════════════════════════ --}}
  <section class="py-16 relative overflow-hidden"
    style="background: linear-gradient(135deg, var(--color-tei-orange) 0%, #C45218 100%);">
    <div class="absolute inset-0 pointer-events-none opacity-[0.05]"
      style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 28px 28px;">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-8 scroll-reveal">
        <div>
          <h2 class="text-3xl sm:text-4xl font-black text-white mb-2" style="font-family: var(--font-display);">Need
            help? We're here 24/7.</h2>
          <p class="text-base" style="color: rgba(255,255,255,0.78);">
            Contact our customer service team for immediate assistance.
          </p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4 shrink-0">
          <a href="tel:+63456061834"
            class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base transition-all duration-200 cursor-pointer"
            style="background-color: white; color: var(--color-tei-orange);"
            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.18)'"
            onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            (045) 606-1834
          </a>
          <a href="mailto:customerservice@tarlacelectric.com"
            class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base border-2 border-white transition-all duration-200 cursor-pointer"
            style="color: white;"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.transform='translateY(-2px)'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.transform=''">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Email Us
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
  <script>
    function initAnimations() {
      // Hero entrance — runs immediately, elements are in viewport
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

      // Single element scroll reveals
      gsap.utils.toArray('.scroll-reveal').forEach(el => {
        gsap.from(el, {
          scrollTrigger: {
            trigger: el,
            start: 'top 88%',
            invalidateOnRefresh: true,
          },
          opacity: 0,
          y: 40,
          duration: 0.75,
          ease: 'power2.out',
        });
      });

      // Card stagger groups
      gsap.utils.toArray('.stagger-cards').forEach(container => {
        const cards = container.querySelectorAll('.card');
        gsap.from(cards, {
          scrollTrigger: {
            trigger: container,
            start: 'top 88%',
            invalidateOnRefresh: true,
          },
          opacity: 0,
          y: 50,
          duration: 0.65,
          stagger: 0.1,
          ease: 'power2.out',
          clearProps: 'transform,opacity',
          onComplete() {
            cards.forEach(el => {
              el.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease';
            });
          },
        });
      });
    }

    if (document.readyState === 'complete') {
      initAnimations();
    } else {
      window.addEventListener('load', initAnimations);
    }
  </script>
@endpush
