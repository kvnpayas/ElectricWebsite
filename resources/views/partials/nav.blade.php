{{-- ═══════════════════════════════════════════════
     NAVIGATION — single $navItems source of truth
     for both desktop and mobile
═══════════════════════════════════════════════ --}}

@php
  $route = Route::currentRouteName();
  $isHome = $route === 'home';
  $isCustomer = str_starts_with($route ?? '', 'customer');
  $isAbout = str_starts_with($route ?? '', 'about-us') || ($isAboutViewer ?? false);
  $isContact = $route === 'contact-us';
  $isPrivacy = $route === 'privacy-policy';
  $isLiveStream = $route === 'live-stream';
  $isRatesAdvisory = str_starts_with($route ?? '', 'rate-and-advisories') && !($isAboutViewer ?? false);
  $isCsp = str_starts_with($route ?? '', 'csp');

  // Single navigation data source — desktop and mobile both loop this
  $navItems = [
      ['type' => 'link', 'label' => 'Home', 'route' => 'home', 'active' => $isHome],

      [
          'type' => 'dropdown',
          'label' => 'Customer',
          'route' => 'customer',
          'active' => $isCustomer,
          'items' => [
              [
                  'label' => 'How to read your bill',
                  'route' => 'customer.how-to-read-your-bill',
                  'icon' =>
                      'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
              ],
              [
                  'label' => 'Service Application',
                  'route' => 'customer.service-application',
                  'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                  'sub' => [
                      [
                          'label' => 'Application Procedure',
                          'desc' => 'Step-by-step guide to apply for service',
                          'route' => 'customer.service-application.application-procedure',
                          'icon' =>
                              'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                      ],
                      [
                          'label' => 'Application Requirement',
                          'desc' => 'Documents and forms needed',
                          'route' => 'customer.service-application.application-requirements',
                          'icon' =>
                              'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                      ],
                      [
                          'label' => 'Other Service Related Applications',
                          'desc' => 'Additional service requests',
                          'route' => 'customer.service-application.other-service-related-applications',
                          'icon' =>
                              'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                      ],
                  ],
              ],
              [
                  'label' => 'Bill Deposit',
                  'route' => 'customer.bill-deposit',
                  'icon' =>
                      'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
              ],
              [
                  'label' => 'Senior Citizen',
                  'route' => 'customer.senior-citizen-discount',
                  'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
              ],
              [
                  'label' => 'Net Metering',
                  'route' => 'customer.net-metering-primer',
                  'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
              ],
              [
                  'label' => 'Distributed Energy Resources',
                  'route' => 'customer.distributed-energy-resources',
                  'icon' =>
                      'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
              ],
              // [
              //     'label' => 'Calculator',
              //     'route' => 'customer.calculator',
              //     'icon' =>
              //         'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
              // ],
              [
                  'label' => 'Business Centers',
                  'route' => 'customer.business-centers',
                  'icon' =>
                      'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z',
              ],
          ],
      ],

      [
          'type' => 'dropdown',
          'label' => 'About',
          'route' => 'about-us',
          'active' => $isAbout,
          'items' => [
              [
                  'label' => 'Profile',
                  'route' => 'about-us.profile',
                  'icon' =>
                      'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                  'sub' => [
                      [
                          'label' => 'Board of Directors',
                          'desc' => 'Company leadership and board members',
                          'route' => 'about-us.profile.board-of-directors',
                          'icon' =>
                              'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                      ],
                      [
                          'label' => 'Executive Officers',
                          'desc' => 'Senior management and key officers',
                          'route' => 'about-us.profile.executive-officers',
                          'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                      ],
                      [
                          'label' => 'Management Team',
                          'desc' => 'Department heads and management staff',
                          'route' => 'about-us.profile.management-team',
                          'icon' =>
                              'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                      ],
                      [
                          'label' => 'Organizational Structure',
                          'desc' => 'Company structure and hierarchy',
                          'route' => 'about-us.profile.organizational-structure',
                          'icon' =>
                              'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z',
                      ],
                      [
                          'label' => 'Articles of Incorporation',
                          'desc' => 'Founding corporate documents',
                          'route' => 'about-us.profile.articles-of-incorporation',
                          'icon' =>
                              'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                      ],
                      [
                          'label' => 'By Laws',
                          'desc' => 'Internal governance rules and regulations',
                          'route' => 'about-us.profile.by-laws',
                          'icon' =>
                              'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                      ],
                  ],
              ],
              [
                  'label' => 'Corporate Governance',
                  'route' => 'about-us.corporate-governance',
                  'icon' =>
                      'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
              ],
              [
                  'label' => 'Disclosures',
                  'route' => 'about-us.disclosures',
                  'icon' =>
                      'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
              ],
              [
                  'label' => 'Investor Relations',
                  'route' => 'about-us.investor-relations',
                  'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z',
              ],
              [
                  'label' => 'Press Materials / News',
                  'route' => 'about-us.press-materials',
                  'icon' =>
                      'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
              ],
              [
                  'label' => 'FAQs',
                  'route' => 'about-us.faqs',
                  'icon' =>
                      'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.2 2.6-2.85 2.85L12 13v1m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
              ],
          ],
      ],

      [
          'type' => 'dropdown',
          'label' => 'Rates & Advisories',
          'route' => 'rate-and-advisories',
          'active' => $isRatesAdvisory,
          'items' => [
              [
                  'label' => 'Power Interruption Schedule',
                  'route' => 'rate-and-advisories.power-interruption-schedule',
                  'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
              ],
              [
                  'label' => 'Advisories',
                  'route' => 'rate-and-advisories.advisories',
                  'icon' =>
                      'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
              ],
              [
                  'label' => 'Rate Schedule / Customer Class',
                  'route' => 'rate-and-advisories.rate-schedule',
                  'icon' =>
                      'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
              ],
              [
                  'label' => 'Others',
                  'route' => 'rate-and-advisories.other-documents',
                  'icon' =>
                      'M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z',
              ],
          ],
      ],

      [
          'type' => 'button-dropdown',
          'label' => 'CSP',
          'sublabel' => 'Competitive Selection Process',
          'active' => $isCsp,
          'items' => [
              [
                  'label' => 'Power Supply Procurement',
                  'route' => 'csp.power-supply-procurement',
                  'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
              ],
              [
                  'label' => 'Procurement Opportunities',
                  'route' => 'procurement.opportunities',
                  'icon' =>
                      'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
              ],
          ],
      ],

      ['type' => 'link', 'label' => 'Privacy Policy', 'route' => 'privacy-policy', 'active' => $isPrivacy],
  ];
@endphp

<nav x-data="{
    mobileOpen: false,
    scrolled: false,
    init() { window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 30 }) }
}"
  class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-brand-header/[0.97] backdrop-blur-md">

  @include('partials.site-notice')

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{-- ── Logo ── --}}
      <a href="/" wire:navigate class="shrink-0 flex items-center">
        <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
        <span class="text-white" style="font-family: var(--font-logo); font-size: 0.94rem; margin-top: 0.8rem">TARLAC
          ELECTRIC</span>
      </a>

      {{-- ════════════════════════════════════════
           DESKTOP NAV
      ════════════════════════════════════════ --}}
      <div class="hidden lg:flex items-center gap-1">

        @foreach ($navItems as $navItem)

          {{-- ── Simple link ── --}}
          @if ($navItem['type'] === 'link')
            <a href="{{ route($navItem['route']) }}" wire:navigate
              class="relative px-4 py-2 text-sm font-medium transition-colors duration-200 {{ $navItem['active'] ? 'text-white' : 'text-white/60 hover:text-white' }}">
              {{ $navItem['label'] }}
              @if ($navItem['active'])
                <span class="absolute -bottom-px left-4 right-4 h-0.5 rounded-full bg-tei-orange"></span>
              @endif
            </a>

            {{-- ── Dropdown with hub link ── --}}
          @elseif ($navItem['type'] === 'dropdown')
            @php $subItem = collect($navItem['items'])->first(fn($i) => isset($i['sub'])); @endphp
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
                <a href="{{ route($navItem['route']) }}" wire:navigate
                  class="relative pl-4 pr-1.5 py-2 text-sm font-medium transition-colors duration-200 {{ $navItem['active'] ? 'text-white' : 'text-white/60 hover:text-white' }}">
                  {{ $navItem['label'] }}
                  @if ($navItem['active'])
                    <span class="absolute -bottom-px left-4 right-0 h-0.5 rounded-full bg-tei-orange"></span>
                  @endif
                </a>
                <button @click.stop="open = !open; if (!open) subOpen = false"
                  :class="open ? 'text-white' : '{{ $navItem['active'] ? 'text-tei-orange' : 'text-white/40' }}'"
                  class="pr-3 py-2 cursor-pointer transition-colors duration-200 bg-transparent">
                  <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              </div>

              {{-- L2 + L3 panel wrapper --}}
              <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute top-full left-0 mt-2 flex items-start z-50">

                {{-- L2 panel --}}
                <div
                  class="w-60 rounded-2xl overflow-hidden py-1.5 bg-white border border-tei-blue/10 shadow-[0_12px_40px_rgba(15,61,92,0.16)]">

                  @foreach ($navItem['items'] as $item)
                    @if (isset($item['sub']))
                      {{-- Split item: label navigates, chevron opens L3 --}}
                      <div @mouseenter="subOpen = true"
                        class="flex items-center justify-between rounded-lg transition-colors duration-150 hover:bg-tei-orange/8"
                        :class="subOpen ? 'bg-tei-orange/8' : ''">
                        <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" wire:navigate
                          class="flex items-center gap-3 pl-4 pr-1.5 py-2.5 text-sm font-semibold flex-1 transition-colors duration-150"
                          :class="subOpen ? 'text-tei-orange' : 'text-gray-700'">
                          <svg class="w-4 h-4 shrink-0 transition-colors duration-150" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24"
                            :class="subOpen ? 'text-tei-orange' : 'text-gray-400'">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                              d="{{ $item['icon'] }}" />
                          </svg>
                          {{ $item['label'] }}
                        </a>
                        <button @click.stop="subOpen = !subOpen"
                          class="pr-3 py-2.5 cursor-pointer transition-colors duration-150 bg-transparent"
                          :class="subOpen ? 'text-tei-orange' : 'text-gray-400'">
                          <svg :class="subOpen ? 'translate-x-0.5' : ''"
                            class="w-4 h-4 transition-transform duration-150" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                        </button>
                      </div>
                      {{-- Dividers around the sub item --}}
                      <div class="my-1.5 border-t mx-3 border-tei-blue/[0.07]"></div>
                    @else
                      <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" wire:navigate
                        @if ($subItem) @mouseenter="subOpen = false" @endif
                        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150 text-gray-700 hover:bg-tei-blue/5 hover:text-tei-blue">
                        <svg class="w-4 h-4 shrink-0 text-gray-400" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                            d="{{ $item['icon'] }}" />
                        </svg>
                        {{ $item['label'] }}
                      </a>
                    @endif
                  @endforeach

                </div>

                {{-- L3 panel (only when this dropdown has a sub-item) --}}
                @if ($subItem)
                  <div x-show="subOpen" x-cloak @mouseenter="subOpen = true"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 -translate-x-3 scale-95"
                    x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                    x-transition:leave-end="opacity-0 -translate-x-2 scale-95"
                    class="ml-1.5 w-72 rounded-2xl overflow-hidden bg-white border border-tei-blue/10 shadow-[0_12px_40px_rgba(15,61,92,0.16)]">

                    {{-- L3 header --}}
                    <a href="{{ Route::has($subItem['route']) ? route($subItem['route']) : '#' }}" wire:navigate
                      class="block px-4 pt-3.5 pb-2.5 border-b border-tei-blue/[0.07] bg-gradient-to-br from-tei-orange/[0.05] to-tei-orange/[0.02] hover:from-tei-orange/10 hover:to-tei-orange/[0.05] transition-colors duration-150">
                      <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-tei-orange/10">
                          <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="{{ $subItem['icon'] }}" />
                          </svg>
                        </div>
                        <div>
                          <p class="text-xs font-black uppercase tracking-wider text-tei-orange">
                            {{ $subItem['label'] }}</p>
                          <p class="text-[11px] mt-0.5 text-gray-400">View all {{ strtolower($subItem['label']) }}</p>
                        </div>
                      </div>
                    </a>

                    {{-- L3 items --}}
                    @foreach ($subItem['sub'] as $sub)
                      <a href="{{ Route::has($sub['route']) ? route($sub['route']) : '#' }}" wire:navigate
                        class="flex items-center gap-3.5 px-4 py-3 transition-colors duration-150 border-b last:border-0 border-tei-blue/[0.05] group hover:bg-tei-orange/[0.04]">
                        <div
                          class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/[0.06] group-hover:bg-tei-orange/10 transition-colors duration-150">
                          <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                              d="{{ $sub['icon'] }}" />
                          </svg>
                        </div>
                        <div class="min-w-0">
                          <p class="text-sm font-semibold leading-tight text-tei-blue">{{ $sub['label'] }}</p>
                          <p class="text-xs mt-0.5 leading-snug text-gray-400">{{ $sub['desc'] }}</p>
                        </div>
                        <svg
                          class="w-4 h-4 shrink-0 ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-150 text-tei-orange"
                          fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                      </a>
                    @endforeach

                  </div>
                @endif

              </div>
            </div>

            {{-- ── Button dropdown (no hub page, e.g. CSP) ── --}}
          @elseif ($navItem['type'] === 'button-dropdown')
            <div class="relative" x-data="{
                open: false,
                _t: null,
                go() {
                    clearTimeout(this._t);
                    this.open = true
                },
                stop() { this._t = setTimeout(() => { this.open = false }, 220) }
            }" @mouseenter="go()" @mouseleave="stop()">

              <button @click="open = !open"
                :class="open ? 'text-white' : '{{ $navItem['active'] ? 'text-white' : 'text-white/60 hover:text-white' }}'"
                class="flex items-center gap-1 px-4 py-2 text-sm font-medium transition-all duration-200 cursor-pointer bg-transparent">
                <div class="relative px-4 py-2">
                  {{ $navItem['label'] }}
                  @if ($navItem['active'])
                    <span class="absolute -bottom-px left-4 right-0 h-0.5 rounded-full bg-tei-orange"></span>
                  @endif
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>

              <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute top-full left-0 mt-2 z-50">

                <div
                  class="w-64 rounded-2xl overflow-hidden py-1.5 bg-white border border-tei-blue/10 shadow-[0_12px_40px_rgba(15,61,92,0.16)]">
                  @if (isset($navItem['sublabel']))
                    <div class="px-4 pt-3 pb-2">
                      <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">
                        {{ $navItem['sublabel'] }}</p>
                    </div>
                    <div class="mx-3 mb-1.5 border-t border-tei-blue/[0.07]"></div>
                  @endif
                  @foreach ($navItem['items'] as $item)
                    <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" wire:navigate
                      class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150 text-gray-700 hover:bg-tei-blue/5 hover:text-tei-blue">
                      <svg class="w-4 h-4 shrink-0 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="{{ $item['icon'] }}" />
                      </svg>
                      {{ $item['label'] }}
                    </a>
                  @endforeach
                </div>

              </div>
            </div>
          @endif
        @endforeach

      </div>

      {{-- ── Desktop CTA ── --}}
      <div class="hidden lg:flex items-center gap-3">
        @if ($streamEnabled)
          <a href="{{ route('live-stream') }}" wire:navigate
            class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold text-white rounded-full bg-red-600">
            <span class="relative flex size-1.5">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
              <span class="relative inline-flex size-1.5 rounded-full bg-white"></span>
            </span>
            LIVE
          </a>
        @endif
        <a href="{{ route('contact-us') }}" wire:navigate
          class="px-5 py-2 text-sm font-semibold rounded-full border transition-all duration-200
            {{ $isContact ? 'border-tei-orange text-tei-orange bg-tei-orange/10' : 'border-white/25 text-white/70 hover:border-tei-orange hover:text-tei-orange' }}">
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
    x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden border-t border-white/[0.08]">

    <div class="max-w-7xl mx-auto px-4 py-3 pb-5 flex flex-col gap-0.5">

      @foreach ($navItems as $navItem)
        {{-- ── Simple link ── --}}
        @if ($navItem['type'] === 'link')
          <a href="{{ route($navItem['route']) }}" wire:navigate @click="mobileOpen = false"
            class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 {{ $navItem['active'] ? 'bg-white/8 text-tei-orange' : 'text-white/85 hover:bg-white/8' }}">
            {{ $navItem['label'] }}
          </a>

          {{-- ── Dropdown with hub link ── --}}
        @elseif ($navItem['type'] === 'dropdown')
          @php $subItem = collect($navItem['items'])->first(fn($i) => isset($i['sub'])); @endphp
          <div x-data="{ open: false, subOpen: false }">

            <button @click="open = !open; if (!open) subOpen = false"
              :class="open ? 'bg-white/8 text-white' :
                  '{{ $navItem['active'] ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
              class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
              <a href="{{ route($navItem['route']) }}" wire:navigate>
                <span>{{ $navItem['label'] }}</span>
              </a>
              <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
              class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2 border-tei-orange/35">

              @foreach ($navItem['items'] as $item)
                @if (isset($item['sub']))
                  {{-- Sub-accordion --}}
                  <div x-data="{ subOpen: false }">
                    <button @click="subOpen = !subOpen"
                      :class="subOpen ? 'bg-tei-orange/10 text-tei-orange' : 'text-white/85'"
                      class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-semibold rounded-lg transition-colors duration-150 cursor-pointer bg-transparent">
                      <span>{{ $item['label'] }}</span>
                      <svg :class="subOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </button>
                    <div x-show="subOpen" x-transition:enter="transition ease-out duration-150"
                      x-transition:enter-start="opacity-0 -translate-y-1"
                      x-transition:enter-end="opacity-100 translate-y-0"
                      x-transition:leave="transition ease-in duration-100"
                      x-transition:leave-start="opacity-100 translate-y-0"
                      x-transition:leave-end="opacity-0 -translate-y-1"
                      class="mt-1 ml-3 pl-3 flex flex-col gap-0.5 border-l-2 border-tei-orange/20">
                      @foreach ($item['sub'] as $sub)
                        <a href="{{ Route::has($sub['route']) ? route($sub['route']) : '#' }}" wire:navigate
                          @click="mobileOpen = false"
                          class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150 text-white/60 hover:bg-white/6 hover:text-white/90">
                          {{ $sub['label'] }}
                        </a>
                      @endforeach
                    </div>
                  </div>
                @else
                  <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" wire:navigate
                    @click="mobileOpen = false"
                    class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150 text-white/70 hover:bg-white/7 hover:text-white">
                    {{ $item['label'] }}
                  </a>
                @endif
              @endforeach

            </div>
          </div>

          {{-- ── Button dropdown (CSP) ── --}}
        @elseif ($navItem['type'] === 'button-dropdown')
          <div x-data="{ open: false }">
            <button @click="open = !open"
              :class="open ? 'bg-white/8 text-white' :
                  '{{ $navItem['active'] ? 'bg-white/8 text-tei-orange' : 'text-white/85' }}'"
              class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
              <span>{{ $navItem['sublabel'] ?? $navItem['label'] }}</span>
              <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
              class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2 border-tei-orange/35">
              @foreach ($navItem['items'] as $item)
                <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" wire:navigate
                  @click="mobileOpen = false"
                  class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150 text-white/70 hover:bg-white/7 hover:text-white">
                  {{ $item['label'] }}
                </a>
              @endforeach
            </div>
          </div>
        @endif
      @endforeach

      {{-- Bottom CTAs --}}
      <div class="pt-3 mt-1 border-t border-white/8 flex flex-col gap-2">
        @if ($streamEnabled)
          <a href="{{ route('live-stream') }}" wire:navigate @click="mobileOpen = false"
            class="w-full flex items-center justify-center gap-2 py-3 text-sm font-bold text-white rounded-xl bg-red-600">
            <span class="relative flex size-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
              <span class="relative inline-flex size-2 rounded-full bg-white"></span>
            </span>
            Watch Live Stream
          </a>
        @endif
        <a href="{{ route('contact-us') }}" wire:navigate @click="mobileOpen = false"
          class="w-full text-center py-3 text-sm font-semibold rounded-xl border transition-all duration-200 bg-tei-orange
            {{ $isContact ? 'border-tei-orange text-tei-orange bg-tei-orange/10' : 'border-white/25 text-white/70 hover:border-tei-orange hover:text-tei-orange' }}">
          Contact Us
        </a>
      </div>

    </div>
  </div>

</nav>
