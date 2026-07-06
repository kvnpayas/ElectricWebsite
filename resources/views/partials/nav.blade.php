{{-- ═══════════════════════════════════════════════
     NAVIGATION — 3-level menu
═══════════════════════════════════════════════ --}}
<nav x-data="{
    mobileOpen: false,
    scrolled: false,
    init() {
        window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 30 });
    }
}" :class="scrolled ? 'py-0 shadow-2xl' : 'py-0'"
  class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
  style="background-color: rgba(8,40,64,0.97); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">

  @php
    $route      = Route::currentRouteName();
    $isHome     = $route === 'home';
    $isCustomer = str_starts_with($route ?? '', 'customer');
    $isAbout    = str_starts_with($route ?? '', 'about-us') || ($isAboutViewer ?? false);
    $isContact  = $route === 'contact-us';
    $isPrivacy       = $route === 'privacy-policy';
    $isRatesAdvisory = str_starts_with($route ?? '', 'rate-and-advisories') && ! ($isAboutViewer ?? false);
    $isCsp           = str_starts_with($route ?? '', 'csp');
  @endphp

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{-- ── Logo ── --}}
      <a href="/" wire:navigate class="shrink-0 flex items-center">
        {{-- <img src="{{ asset('assets/TEI-logo.png') }}" alt="Tarlac Electric Inc." class="h-10 w-auto"> --}}
        <div class="flex">
          <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
          <span class="text-white" style="font-family: var(--font-logo); font-size: 0.94rem; margin-top: 0.8rem">TARLAC
            ELECTRIC</span>
        </div>
      </a>

      {{-- ════════════════════════════════════════
           DESKTOP NAV
      ════════════════════════════════════════ --}}
      <div class="hidden lg:flex items-center gap-1">

        {{-- Home --}}
        <a href="/" wire:navigate
          class="relative px-4 py-2 text-sm font-medium transition-colors duration-200 {{ $isHome ? 'text-white' : 'text-white/60 hover:text-white' }}">
          Home
          @if ($isHome)
            <span class="absolute -bottom-px left-4 right-4 h-0.5 rounded-full" style="background-color: var(--color-tei-orange);"></span>
          @endif
        </a>

        {{-- ── Customer (3-level) ── --}}
        <div class="relative" x-data="{
            open: false,
            subOpen: false,
            _t: null,
            go() {
                clearTimeout(this._t);
                this.open = true
            },
            stop() {
                this._t = setTimeout(() => {
                    this.open = false;
                    this.subOpen = false
                }, 220)
            }
        }" @mouseenter="go()" @mouseleave="stop()">

          {{-- L1: split button — label navigates, chevron toggles dropdown --}}
          <div class="flex items-center">
            <a href="{{ route('customer') }}" wire:navigate
              class="relative pl-4 pr-1.5 py-2 text-sm font-medium transition-colors duration-200 {{ $isCustomer ? 'text-white' : 'text-white/60 hover:text-white' }}">
              Customer
              @if ($isCustomer)
                <span class="absolute -bottom-px left-4 right-0 h-0.5 rounded-full" style="background-color: var(--color-tei-orange);"></span>
              @endif
            </a>
            <button @click.stop="open = !open; if (!open) subOpen = false"
              :class="open ? 'text-white' : '{{ $isCustomer ? 'text-tei-orange' : 'text-white/40' }}'"
              class="pr-3 py-2 cursor-pointer transition-colors duration-200 bg-transparent">
              <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
          </div>

          {{-- L2 + L3 side-by-side wrapper (absolute, flex row) --}}
          <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1" class="absolute top-full left-0 mt-2 flex items-start"
            style="z-index: 100;">

            {{-- ── L2 Panel ── --}}
            <div class="w-60 rounded-2xl overflow-hidden py-1.5"
              style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              <a href="{{ route('customer.how-to-read-your-bill') }}" wire:navigate
                class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                style="color: #374151;"
                onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  style="color:#9CA3AF">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                How to read your bill
              </a>

              {{-- Divider --}}
              <div class="my-1.5 border-t mx-3" style="border-color: rgba(15,61,92,0.07);"></div>

              {{-- Service Application → split: label navigates, chevron triggers L3 --}}
              <div @mouseenter="subOpen = true"
                class="flex items-center justify-between rounded-lg transition-all duration-150"
                :style="subOpen ? 'background-color: rgba(231,103,39,0.08);' : ''"
                onmouseover="this.style.backgroundColor='rgba(231,103,39,0.08)'"
                onmouseout="if(!$data.subOpen){ this.style.backgroundColor='transparent' }">
                <a href="{{ route('customer.service-application') }}" wire:navigate
                  class="flex items-center gap-3 pl-4 pr-1.5 py-2.5 text-sm font-semibold flex-1 transition-colors duration-150"
                  :style="subOpen ? 'color: var(--color-tei-orange);' : 'color: #374151;'">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    :style="subOpen ? 'color: var(--color-tei-orange)' : 'color: #9CA3AF'">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Service Application
                </a>
                <button @click.stop="subOpen = !subOpen"
                  class="pr-3 py-2.5 cursor-pointer transition-colors duration-150 bg-transparent"
                  :style="subOpen ? 'color: var(--color-tei-orange);' : 'color: #9CA3AF;'">
                  <svg :class="subOpen ? 'translate-x-0.5' : ''"
                    class="w-4 h-4 transition-transform duration-150" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>

              {{-- Divider --}}
              <div class="my-1.5 border-t mx-3" style="border-color: rgba(15,61,92,0.07);"></div>

              {{-- Remaining L2 items --}}
              @foreach ([['Bill Deposit', 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z', 'customer.bill-deposit'], ['Senior Citizen', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'customer.senior-citizen-discount'], ['Net Metering', 'M13 10V3L4 14h7v7l9-11h-7z', 'customer.net-metering-primer'], ['Distributed Energy Resources', 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'customer.distributed-energy-resources'], ['Calculator', 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'customer.calculator'], ['Business Centers', 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'customer.business-centers']] as [$lbl, $ico, $url])
                <a href="{{ Route::has($url) ? route($url) : '#' }}" wire:navigate @mouseenter="subOpen = false"
                  class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                  style="color: #374151;"
                  onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    style="color:#9CA3AF">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="{{ $ico }}" />
                  </svg>
                  {{ $lbl }}
                </a>
              @endforeach

            </div>

            {{-- ── L3 Panel (Service Application) ── --}}
            <div x-show="subOpen" x-cloak @mouseenter="subOpen = true"
              x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 -translate-x-3 scale-95"
              x-transition:enter-end="opacity-100 translate-x-0 scale-100"
              x-transition:leave="transition ease-in duration-100"
              x-transition:leave-start="opacity-100 translate-x-0 scale-100"
              x-transition:leave-end="opacity-0 -translate-x-2 scale-95"
              class="ml-1.5 w-72 rounded-2xl overflow-hidden"
              style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- L3 header --}}
              <a href="{{ route('customer.service-application') }}" wire:navigate
                class="block px-4 pt-3.5 pb-2.5 border-b transition-colors duration-150"
                style="border-color: rgba(15,61,92,0.07); background: linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02));"
                onmouseover="this.style.background='linear-gradient(135deg, rgba(231,103,39,0.1), rgba(231,103,39,0.05))'"
                onmouseout="this.style.background='linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02))'">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0"
                    style="background: rgba(231,103,39,0.1);">
                    <svg class="w-4 h-4" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-black uppercase tracking-wider" style="color: var(--color-tei-orange);">
                      Service Application
                    </p>
                    <p class="text-[11px] mt-0.5" style="color: #9CA3AF;">View all application guides</p>
                  </div>
                </div>
              </a>

              {{-- L3 items --}}
              @foreach ([['Application Procedure', 'Step-by-step guide to apply for service', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'customer.service-application.application-procedure'], ['Application Requirement', 'Documents and forms needed for application', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'customer.service-application.application-requirements'], ['Other Service Related Applications', 'Additional service requests and inquiries', 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'customer.service-application.other-service-related-applications']] as [$lbl, $desc, $ico, $url])
                <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
                  class="flex items-center gap-3.5 px-4 py-3 transition-colors duration-150 border-b last:border-0 group"
                  style="border-color: rgba(15,61,92,0.05);"
                  onmouseover="this.style.backgroundColor='rgba(231,103,39,0.04)'"
                  onmouseout="this.style.backgroundColor='transparent'">
                  <div
                    class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 transition-colors duration-150"
                    style="background: rgba(15,61,92,0.06);"
                    onmouseover="this.style.backgroundColor='rgba(231,103,39,0.1)'"
                    onmouseout="this.style.backgroundColor='rgba(15,61,92,0.06)'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      style="color: #0F3D5C;">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                        d="{{ $ico }}" />
                    </svg>
                  </div>
                  <div class="min-w-0">
                    <p class="text-sm font-semibold leading-tight" style="color: #0F3D5C;">{{ $lbl }}</p>
                    <p class="text-xs mt-0.5 leading-snug" style="color: #9CA3AF;">{{ $desc }}</p>
                  </div>
                  <svg
                    class="w-4 h-4 shrink-0 ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #E76727;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              @endforeach

            </div>
          </div>
        </div>

        {{-- ── About (3-level) ── --}}
        <div class="relative" x-data="{
            open: false,
            subOpen: false,
            _t: null,
            go() {
                clearTimeout(this._t);
                this.open = true
            },
            stop() {
                this._t = setTimeout(() => {
                    this.open = false;
                    this.subOpen = false
                }, 220)
            }
        }" @mouseenter="go()" @mouseleave="stop()">

          {{-- L1: split button --}}
          <div class="flex items-center">
            <a href="{{ route('about-us') }}" wire:navigate
              class="relative pl-4 pr-1.5 py-2 text-sm font-medium transition-colors duration-200 {{ $isAbout ? 'text-white' : 'text-white/60 hover:text-white' }}">
              About
              @if ($isAbout)
                <span class="absolute -bottom-px left-4 right-0 h-0.5 rounded-full" style="background-color: var(--color-tei-orange);"></span>
              @endif
            </a>
            <button @click.stop="open = !open; if (!open) subOpen = false"
              :class="open ? 'text-white' : '{{ $isAbout ? 'text-tei-orange' : 'text-white/40' }}'"
              class="pr-3 py-2 cursor-pointer transition-colors duration-200 bg-transparent">
              <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
          </div>

          {{-- L2 + L3 wrapper --}}
          <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1" class="absolute top-full left-0 mt-2 flex items-start"
            style="z-index: 100;">

            {{-- ── L2 Panel ── --}}
            <div class="w-60 rounded-2xl overflow-hidden py-1.5"
              style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- Profile → split: label navigates, chevron triggers L3 --}}
              <div @mouseenter="subOpen = true"
                class="flex items-center justify-between rounded-lg transition-all duration-150"
                :style="subOpen ? 'background-color: rgba(231,103,39,0.08);' : ''"
                onmouseover="this.style.backgroundColor='rgba(231,103,39,0.08)'"
                onmouseout="if(!$data.subOpen){ this.style.backgroundColor='transparent' }">
                <a href="{{ route('about-us.profile') }}" wire:navigate
                  class="flex items-center gap-3 pl-4 pr-1.5 py-2.5 text-sm font-semibold flex-1 transition-colors duration-150"
                  :style="subOpen ? 'color: var(--color-tei-orange);' : 'color: #374151;'">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    :style="subOpen ? 'color: var(--color-tei-orange)' : 'color: #9CA3AF'">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                  Profile
                </a>
                <button @click.stop="subOpen = !subOpen"
                  class="pr-3 py-2.5 cursor-pointer transition-colors duration-150 bg-transparent"
                  :style="subOpen ? 'color: var(--color-tei-orange);' : 'color: #9CA3AF;'">
                  <svg :class="subOpen ? 'translate-x-0.5' : ''"
                    class="w-4 h-4 transition-transform duration-150" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>

              {{-- Divider --}}
              <div class="my-1.5 border-t mx-3" style="border-color: rgba(15,61,92,0.07);"></div>

              {{-- Remaining L2 items --}}
              @foreach ([
                ['Corporate Governance', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'about-us.corporate-governance'],
                ['Disclosures', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'about-us.disclosures'],
                ['Investor Relations', 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z', 'about-us.investor-relations'],
                ['Press Materials / News', 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'about-us.press-materials'],
                ['FAQs', 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.2 2.6-2.85 2.85L12 13v1m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'about-us.faqs'],
              ] as [$lbl, $ico, $url])
                <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
                  @mouseenter="subOpen = false"
                  class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                  style="color: #374151;"
                  onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    style="color:#9CA3AF">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
                  </svg>
                  {{ $lbl }}
                </a>
              @endforeach

            </div>

            {{-- ── L3 Panel (Profile sub-items) ── --}}
            <div x-show="subOpen" x-cloak @mouseenter="subOpen = true"
              x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 -translate-x-3 scale-95"
              x-transition:enter-end="opacity-100 translate-x-0 scale-100"
              x-transition:leave="transition ease-in duration-100"
              x-transition:leave-start="opacity-100 translate-x-0 scale-100"
              x-transition:leave-end="opacity-0 -translate-x-2 scale-95"
              class="ml-1.5 w-72 rounded-2xl overflow-hidden"
              style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- L3 header --}}
              <a href="{{ route('about-us.profile') }}" wire:navigate
                class="block px-4 pt-3.5 pb-2.5 border-b transition-colors duration-150"
                style="border-color: rgba(15,61,92,0.07); background: linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02));"
                onmouseover="this.style.background='linear-gradient(135deg, rgba(231,103,39,0.1), rgba(231,103,39,0.05))'"
                onmouseout="this.style.background='linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02))'">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0"
                    style="background: rgba(231,103,39,0.1);">
                    <svg class="w-4 h-4" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-black uppercase tracking-wider" style="color: var(--color-tei-orange);">Profile</p>
                    <p class="text-[11px] mt-0.5" style="color: #9CA3AF;">View all company information</p>
                  </div>
                </div>
              </a>

              {{-- L3 items --}}
              @foreach ([
                ['Board of Directors', 'Company leadership and board members', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'about-us.profile.board-of-directors'],
                ['Executive Officers', 'Senior management and key officers', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'about-us.profile.executive-officers'],
                ['Management Team', 'Department heads and management staff', 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'about-us.profile.management-team'],
                ['Organizational Structure', 'Company structure and hierarchy', 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 'about-us.profile.organizational-structure'],
                ['Articles of Incorporation', 'Founding corporate documents', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'about-us.profile.articles-of-incorporation'],
                ['By Laws', 'Internal governance rules and regulations', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'about-us.profile.by-laws'],
              ] as [$lbl, $desc, $ico, $url])
                <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
                  class="flex items-center gap-3.5 px-4 py-3 transition-colors duration-150 border-b last:border-0 group"
                  style="border-color: rgba(15,61,92,0.05);"
                  onmouseover="this.style.backgroundColor='rgba(231,103,39,0.04)'"
                  onmouseout="this.style.backgroundColor='transparent'">
                  <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0"
                    style="background: rgba(15,61,92,0.06);"
                    onmouseover="this.style.backgroundColor='rgba(231,103,39,0.1)'"
                    onmouseout="this.style.backgroundColor='rgba(15,61,92,0.06)'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #0F3D5C;">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
                    </svg>
                  </div>
                  <div class="min-w-0">
                    <p class="text-sm font-semibold leading-tight" style="color: #0F3D5C;">{{ $lbl }}</p>
                    <p class="text-xs mt-0.5 leading-snug" style="color: #9CA3AF;">{{ $desc }}</p>
                  </div>
                  <svg class="w-4 h-4 shrink-0 ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #E76727;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              @endforeach

            </div>
          </div>
        </div>

        {{-- ── Rates & Advisories (toggle only) ── --}}
        <div class="relative" x-data="{
            open: false,
            _t: null,
            go() { clearTimeout(this._t); this.open = true },
            stop() { this._t = setTimeout(() => { this.open = false }, 220) }
        }" @mouseenter="go()" @mouseleave="stop()">

          {{-- L1: split button — label navigates, chevron toggles dropdown --}}
          <div class="flex items-center">
            <a href="{{ route('rate-and-advisories') }}" wire:navigate
              class="relative pl-4 pr-1.5 py-2 text-sm font-medium transition-colors duration-200 {{ $isRatesAdvisory ? 'text-white' : 'text-white/60 hover:text-white' }}">
              Rates & Advisories
              @if ($isRatesAdvisory)
                <span class="absolute -bottom-px left-4 right-0 h-0.5 rounded-full" style="background-color: var(--color-tei-orange);"></span>
              @endif
            </a>
            <button @click.stop="open = !open"
              :class="open ? 'text-white' : '{{ $isRatesAdvisory ? 'text-tei-orange' : 'text-white/40' }}'"
              class="pr-3 py-2 cursor-pointer transition-colors duration-200 bg-transparent">
              <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
          </div>

          <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute top-full left-0 mt-2"
            style="z-index: 100;">

          <div class="w-64 rounded-2xl overflow-hidden py-1.5"
            style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

            @foreach ([
              ['Power Interruption Schedule', 'M13 10V3L4 14h7v7l9-11h-7z', 'rate-and-advisories.power-interruption-schedule'],
              ['Advisories', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'rate-and-advisories.advisories'],
              ['Rate Schedule / Customer Class', 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'rate-and-advisories.rate-schedule'],
              ['Others', 'M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z', 'rate-and-advisories.other-documents'],
            ] as [$lbl, $ico, $rName])
              <a href="{{ $rName && Route::has($rName) ? route($rName) : '#' }}" {{ $rName ? 'wire:navigate' : '' }}
                class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                style="color: #374151;"
                onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  style="color:#9CA3AF">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
                </svg>
                {{ $lbl }}
              </a>
            @endforeach

          </div>
          </div>
        </div>

        {{-- ── Competitive Selection Process (chevron-only, no hub page) ── --}}
        <div class="relative" x-data="{
            open: false,
            _t: null,
            go() { clearTimeout(this._t); this.open = true },
            stop() { this._t = setTimeout(() => { this.open = false }, 220) }
        }" @mouseenter="go()" @mouseleave="stop()">

          <button @click="open = !open"
            :class="open ? 'text-white' : '{{ $isCsp ? 'text-tei-orange' : 'text-white/60 hover:text-white' }}'"
            class="flex items-center gap-1 px-4 py-2 text-sm font-medium transition-all duration-200 cursor-pointer bg-transparent">
            CSP
            <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute top-full left-0 mt-2"
            style="z-index: 100;">

            <div class="w-64 rounded-2xl overflow-hidden py-1.5"
              style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- Panel label --}}
              <div class="px-4 pt-3 pb-2">
                <p class="text-[10px] font-black uppercase tracking-widest" style="color: #9CA3AF;">
                  Competitive Selection Process
                </p>
              </div>
              <div class="mx-3 mb-1.5 border-t" style="border-color: rgba(15,61,92,0.07);"></div>

              @foreach ([
                ['Power Supply Procurement', 'M13 10V3L4 14h7v7l9-11h-7z', 'csp.power-supply-procurement'],
                ['Procurement Opportunities', 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'procurement.opportunities'],
              ] as [$lbl, $ico, $rName])
                @if ($rName && Route::has($rName))
                  <a href="{{ route($rName) }}" wire:navigate
                @else
                  <a href="#"
                @endif
                  class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                  style="color: #374151;"
                  onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    style="color:#9CA3AF">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
                  </svg>
                  {{ $lbl }}
                </a>
              @endforeach

            </div>
          </div>
        </div>

        {{-- Privacy Policy --}}
        <a href="{{ route('privacy-policy') }}" wire:navigate
          class="relative px-4 py-2 text-sm font-medium transition-colors duration-200 {{ $isPrivacy ? 'text-white' : 'text-white/60 hover:text-white' }}">
          Privacy Policy
          @if ($isPrivacy)
            <span class="absolute -bottom-px left-4 right-4 h-0.5 rounded-full" style="background-color: var(--color-tei-orange);"></span>
          @endif
        </a>

      </div>

      {{-- ── Desktop CTA ── --}}
      <div class="hidden lg:flex items-center gap-3">
        <a href="{{ route('contact-us') }}" wire:navigate
          class="px-5 py-2 text-sm font-semibold rounded-full border transition-all duration-200
            {{ $isContact
              ? 'border-tei-orange text-tei-orange bg-tei-orange/10'
              : 'border-white/25 text-white/70 hover:border-tei-orange hover:text-tei-orange' }}">
          Contact Us
        </a>
      </div>

      {{-- ── Mobile hamburger ── --}}
      <button @click="mobileOpen = !mobileOpen" class="lg:hidden flex flex-col gap-1.5 p-2 rounded-lg cursor-pointer"
        aria-label="Toggle menu">
        <span :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"
          class="block w-6 h-0.5 bg-white transition-all duration-300 origin-center"></span>
        <span :class="mobileOpen ? 'opacity-0 scale-x-0' : ''"
          class="block w-6 h-0.5 bg-white transition-all duration-300"></span>
        <span :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"
          class="block w-6 h-0.5 bg-white transition-all duration-300 origin-center"></span>
      </button>

    </div>
  </div>

  {{-- ════════════════════════════════════════
       MOBILE MENU
  ════════════════════════════════════════ --}}
  <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden border-t"
    style="border-color: rgba(255,255,255,0.08);">

    <div class="max-w-7xl mx-auto px-4 py-3 pb-5 flex flex-col gap-0.5">

      {{-- Home --}}
      <a href="/" wire:navigate @click="mobileOpen = false"
        class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 {{ $isHome ? 'bg-white/8 text-tei-orange' : 'text-white/85 hover:bg-white/8' }}">
        Home
      </a>

      {{-- ── Mobile Customer accordion ── --}}
      <div x-data="{ cOpen: false, saOpen: false }">

        <button @click="cOpen = !cOpen; if (!cOpen) saOpen = false"
          :class="cOpen ? 'bg-white/8 text-white' : '{{ $isCustomer ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
          class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
          <a href="{{ route('customer') }}" wire:navigate>
            <span>Customer</span>
          </a>
          <svg :class="cOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        {{-- L2 accordion content --}}
        <div x-show="cOpen" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-1" class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2"
          style="border-color: rgba(231,103,39,0.35);">

          <a href="{{ route('customer.how-to-read-your-bill') }}" wire:navigate
            class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
            style="color: rgba(255,255,255,0.7);"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            How to read your bill
          </a>

          {{-- Service Application sub-accordion --}}
          <div x-data="{ saOpen: false }">
            <button @click="saOpen = !saOpen" :class="saOpen ? 'bg-[#E76727]/10 text-[#E76727]' : 'text-white/[0.85]'"
              class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-semibold rounded-lg transition-colors duration-150 cursor-pointer bg-transparent">
              <span>Service Application</span>
              <svg :class="saOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            {{-- L3 accordion content --}}
            <div x-show="saOpen" x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-100"
              x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
              class="mt-1 ml-3 pl-3 flex flex-col gap-0.5 border-l-2" style="border-color: rgba(231,103,39,0.2);">

              @foreach ([['Application Procedure', 'customer.service-application.application-procedure'], ['Application Requirement', 'customer.service-application.application-requirements'], ['Other Service Related Applications', 'customer.service-application.other-service-related-applications']] as [$item, $mUrl])
                <a href="{{ $mUrl && Route::has($mUrl) ? route($mUrl) : '#' }}" {{ $mUrl ? 'wire:navigate' : '' }} class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
                  style="color: rgba(255,255,255,0.6);"
                  onmouseover="this.style.backgroundColor='rgba(255,255,255,0.06)'; this.style.color='rgba(255,255,255,0.9)'"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.6)'">
                  {{ $item }}
                </a>
              @endforeach

            </div>
          </div>

          {{-- Rest of L2 --}}
          @foreach ([['Bill Deposit', 'customer.bill-deposit'], ['Senior Citizen', 'customer.senior-citizen-discount'], ['Net Metering', 'customer.net-metering-primer'], ['Distributed Energy Resources', 'customer.distributed-energy-resources'], ['Calculator', 'customer.calculator'], ['Business Centers', 'customer.business-centers']] as [$item, $url])
            <a href="{{ Route::has($url) ? route($url) : '#' }}" wire:navigate class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
              style="color: rgba(255,255,255,0.7);"
              onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
              {{ $item }}
            </a>
          @endforeach

        </div>
      </div>

      {{-- ── Mobile About accordion ── --}}
      <div x-data="{ aOpen: false, pOpen: false }">

        <button @click="aOpen = !aOpen; if (!aOpen) pOpen = false"
          :class="aOpen ? 'bg-white/8 text-white' : '{{ $isAbout ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
          class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
          <a href="{{ route('about-us') }}" wire:navigate>
            <span>About</span>
          </a>
          <svg :class="aOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        {{-- L2 accordion content --}}
        <div x-show="aOpen" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-1" class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2"
          style="border-color: rgba(231,103,39,0.35);">

          {{-- Profile sub-accordion --}}
          <div x-data="{ pOpen: false }">
            <button @click="pOpen = !pOpen" :class="pOpen ? 'bg-tei-orange/10 text-tei-orange' : 'text-white/[0.85]'"
              class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-semibold rounded-lg transition-colors duration-150 cursor-pointer bg-transparent">
              <a href="{{ route('about-us.profile') }}" wire:navigate>
                <span>Profile</span>
              </a>
              <svg :class="pOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            {{-- L3 accordion content --}}
            <div x-show="pOpen" x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-100"
              x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
              class="mt-1 ml-3 pl-3 flex flex-col gap-0.5 border-l-2" style="border-color: rgba(231,103,39,0.2);">

              @foreach ([
                ['Board of Directors', 'about-us.profile.board-of-directors'],
                ['Executive Officers', 'about-us.profile.executive-officers'],
                ['Management Team', 'about-us.profile.management-team'],
                ['Organizational Structure', 'about-us.profile.organizational-structure'],
                ['Articles of Incorporation', 'about-us.profile.articles-of-incorporation'],
                ['By Laws', 'about-us.profile.by-laws'],
              ] as [$item, $url])
                <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
                  class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
                  style="color: rgba(255,255,255,0.6);"
                  onmouseover="this.style.backgroundColor='rgba(255,255,255,0.06)'; this.style.color='rgba(255,255,255,0.9)'"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.6)'">
                  {{ $item }}
                </a>
              @endforeach

            </div>
          </div>

          {{-- Other L2 items --}}
          @foreach ([
            ['Corporate Governance', 'about-us.corporate-governance'],
            ['Disclosures', 'about-us.disclosures'],
            ['Investor Relations', 'about-us.investor-relations'],
            ['Press Materials / News', 'about-us.press-materials'],
            ['FAQs', 'about-us.faqs'],
          ] as [$item, $mUrl])
            <a href="{{ $mUrl && Route::has($mUrl) ? route($mUrl) : '#' }}" {{ $mUrl ? 'wire:navigate' : '' }}
              @click="mobileOpen = false"
              class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
              style="color: rgba(255,255,255,0.7);"
              onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
              {{ $item }}
            </a>
          @endforeach

        </div>
      </div>

      {{-- ── Mobile Rates & Advisories accordion ── --}}
      <div x-data="{ raOpen: false }">

        <button @click="raOpen = !raOpen"
          :class="raOpen ? 'bg-white/8 text-white' : '{{ $isRatesAdvisory ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
          class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
          <a href="{{ route('rate-and-advisories') }}" wire:navigate>
            <span>Rates & Advisories</span>
          </a>
          <svg :class="raOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div x-show="raOpen" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-1" class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2"
          style="border-color: rgba(231,103,39,0.35);">

          @foreach ([
            ['Power Interruption Schedule', 'rate-and-advisories.power-interruption-schedule'],
            ['Advisories', 'rate-and-advisories.advisories'],
            ['Rate Schedule / Customer Class', 'rate-and-advisories.rate-schedules'],
            ['Others', 'rate-and-advisories.other-documents'],
          ] as [$item, $raUrl])
            <a href="{{ $raUrl && Route::has($raUrl) ? route($raUrl) : '#' }}" {{ $raUrl ? 'wire:navigate' : '' }}
              @click="mobileOpen = false" class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
              style="color: rgba(255,255,255,0.7);"
              onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
              {{ $item }}
            </a>
          @endforeach

        </div>
      </div>

      {{-- ── Mobile Competitive Selection Process accordion ── --}}
      <div x-data="{ cspOpen: false }">

        <button @click="cspOpen = !cspOpen"
          :class="cspOpen ? 'bg-white/8 text-white' : '{{ $isCsp ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
          class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
          <span>Competitive Selection Process</span>
          <svg :class="cspOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div x-show="cspOpen" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-1" class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2"
          style="border-color: rgba(231,103,39,0.35);">

          <a href="{{ route('csp.power-supply-procurement') }}" wire:navigate @click="mobileOpen = false"
            class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
            style="color: rgba(255,255,255,0.7);"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            Power Supply Procurement
          </a>
          <a href="{{ route('procurement.opportunities') }}" wire:navigate @click="mobileOpen = false"
            class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
            style="color: rgba(255,255,255,0.7);"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            Procurement Opportunities
          </a>

        </div>
      </div>

      {{-- Contact Us --}}
      <a href="{{ route('contact-us') }}" wire:navigate @click="mobileOpen = false"
        class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 {{ $isContact ? 'bg-white/8 text-tei-orange' : 'text-white/85 hover:bg-white/8' }}">
        Contact Us
      </a>

      {{-- Other top-level mobile links --}}
      @foreach (['Careers'] as $link)
        <a href="#" class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 text-white/85 hover:bg-white/8">
          {{ $link }}
        </a>
      @endforeach

      {{-- Privacy Policy --}}
      <a href="{{ route('privacy-policy') }}" wire:navigate @click="mobileOpen = false"
        class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 {{ $isPrivacy ? 'bg-white/8 text-tei-orange' : 'text-white/85 hover:bg-white/8' }}">
        Privacy Policy
      </a>

      {{-- Mobile Pay Bill CTA --}}
      <div class="pt-3 mt-1 border-t" style="border-color: rgba(255,255,255,0.08);">
        <a href="tel:+6345-606-1834"
          class="block text-center py-2.5 text-sm font-medium mb-2 transition-colors duration-200"
          style="color: rgba(255,255,255,0.45);">
          (045) 606-1834
        </a>
        <a href="#" class="block text-center py-3 text-sm font-bold rounded-xl transition-all duration-200"
          style="background-color: var(--color-tei-orange); color: white;"
          onmouseover="this.style.backgroundColor='#C45218'"
          onmouseout="this.style.backgroundColor='var(--color-tei-orange)'">
          Pay Bill Online
        </a>
      </div>

    </div>
  </div>

</nav>
