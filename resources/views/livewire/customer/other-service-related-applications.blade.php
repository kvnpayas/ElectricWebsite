<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Other Service Related Applications',
      'badgeTitle' => 'Customer Services',
      'subTitle'   => 'TEI customers are assured of quality service at any business center. Visit your nearest branch for any of the following needs.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — SERVICE DIRECTORY
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-12 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Visit Your Nearest TEI Business Center</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            Tarlac Electric Inc. (TEI) customers are assured of quality customer service no matter which business center they may visit. Our staff are ready to assist you with billing concerns, account updates, service requests, and more.
          </p>
        </div>
      </div>
    </div>

    {{-- Section heading --}}
    <div class="text-center mb-10 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
        Available Services
      </span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3 text-tei-blue">What We Can Help You With</h2>
      <p class="text-base max-w-xl mx-auto text-tei-gray">
        Browse the full list of services available at any TEI business center, organized by category.
      </p>
    </div>


    {{-- ── SERVICE CATEGORIES GRID ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 stagger-cards">

      {{-- ── CATEGORY 1: Billing & Payments ── --}}
      <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white shadow-sm scroll-reveal">
        {{-- Category header --}}
        <div class="px-6 py-4 border-b border-tei-blue/8"
          style="background: linear-gradient(135deg, rgba(15,61,92,0.05), rgba(15,61,92,0.02));">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4.5 h-4.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-black tracking-wide text-tei-blue">Billing & Payments</h3>
              <p class="text-xs text-tei-gray mt-0.5">6 services available</p>
            </div>
          </div>
        </div>

        {{-- Services list --}}
        <ul class="divide-y divide-tei-blue/5">
          @foreach ([
            ['Bill deposit refund', 'M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6'],
            ['Bill deposit upgrade', 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
            ['Billing adjustment', 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
            ['Billing inquiries', 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Bill payment', 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
            ['Correction of payment', 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
          ] as [$name, $icon])
            <li class="flex items-center gap-3.5 px-5 py-3.5 transition-colors duration-150 hover:bg-tei-blue/[0.03] group">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-tei-blue/6 group-hover:bg-tei-blue/12 transition-colors duration-150">
                <svg class="w-3.5 h-3.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                </svg>
              </div>
              <span class="text-sm font-medium text-tei-gray group-hover:text-tei-blue transition-colors duration-150">{{ $name }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      {{-- ── CATEGORY 2: Account Management ── --}}
      <div class="rounded-2xl overflow-hidden border border-tei-orange/12 bg-white shadow-sm scroll-reveal">
        {{-- Category header --}}
        <div class="px-6 py-4 border-b border-tei-orange/10"
          style="background: linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02));">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
              <svg class="w-4.5 h-4.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-black tracking-wide text-tei-orange">Account Management</h3>
              <p class="text-xs text-tei-gray mt-0.5">3 services available</p>
            </div>
          </div>
        </div>

        {{-- Services list --}}
        <ul class="divide-y divide-tei-orange/6">
          @foreach ([
            ['Correction of name and service address', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
            ['Processing of change account ownership', 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4'],
            ['Senior citizen discount application', 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
          ] as [$name, $icon])
            <li class="flex items-center gap-3.5 px-5 py-3.5 transition-colors duration-150 hover:bg-tei-orange/[0.03] group">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-tei-orange/8 group-hover:bg-tei-orange/15 transition-colors duration-150">
                <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                </svg>
              </div>
              <span class="text-sm font-medium text-tei-gray group-hover:text-tei-orange transition-colors duration-150">{{ $name }}</span>
            </li>
          @endforeach
        </ul>

        {{-- Spacer note --}}
        <div class="px-5 py-4 border-t border-tei-orange/6"
          style="background: rgba(231,103,39,0.02);">
          <p class="text-xs text-tei-gray leading-relaxed">
            Bring a valid government-issued ID and supporting documents when visiting for account management requests.
          </p>
        </div>
      </div>

      {{-- ── CATEGORY 3: Service Requests ── --}}
      <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white shadow-sm scroll-reveal">
        {{-- Category header --}}
        <div class="px-6 py-4 border-b border-tei-blue/8"
          style="background: linear-gradient(135deg, rgba(15,61,92,0.05), rgba(15,61,92,0.02));">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4.5 h-4.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-black tracking-wide text-tei-blue">Service Requests</h3>
              <p class="text-xs text-tei-gray mt-0.5">4 services available</p>
            </div>
          </div>
        </div>

        {{-- Services list --}}
        <ul class="divide-y divide-tei-blue/5">
          @foreach ([
            ['Electric service disconnection request', 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636'],
            ['Filing of complaint', 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
            ['Net metering application', 'M13 10V3L4 14h7v7l9-11h-7z'],
            ['Upgrading of load', 'M5 12h14M12 5l7 7-7 7'],
          ] as [$name, $icon])
            <li class="flex items-center gap-3.5 px-5 py-3.5 transition-colors duration-150 hover:bg-tei-blue/[0.03] group">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-tei-blue/6 group-hover:bg-tei-blue/12 transition-colors duration-150">
                <svg class="w-3.5 h-3.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                </svg>
              </div>
              <span class="text-sm font-medium text-tei-gray group-hover:text-tei-blue transition-colors duration-150">{{ $name }}</span>
            </li>
          @endforeach
        </ul>
      </div>

    </div>


    {{-- ── FULL SERVICE LIST (collapsed, all 13) ── --}}
    <div class="mt-10 scroll-reveal" x-data="{ open: false }">
      <button @click="open = !open"
        class="w-full flex items-center justify-between px-5 py-4 rounded-2xl border transition-all duration-200 cursor-pointer text-left"
        :class="open
          ? 'bg-tei-blue/5 border-tei-blue/15 text-tei-blue'
          : 'bg-tei-blue/[0.02] border-tei-blue/8 text-tei-gray hover:border-tei-blue/15 hover:bg-tei-blue/4'">
        <div class="flex items-center gap-3">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 10h16M4 14h16M4 18h16" />
          </svg>
          <span class="text-sm font-bold">View Complete List of Services (13 total)</span>
        </div>
        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 shrink-0 transition-transform duration-200"
          fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
        class="mt-2 rounded-2xl overflow-hidden border border-tei-blue/8 bg-white">
        <div class="px-6 py-3 border-b border-tei-blue/6 bg-tei-blue/[0.02]">
          <p class="text-xs font-semibold text-tei-gray uppercase tracking-widest">All Available Services</p>
        </div>
        <ul class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 divide-tei-blue/5">
          @foreach ([
            'Bill deposit refund',
            'Bill deposit upgrade',
            'Billing adjustment',
            'Billing inquiries',
            'Bill payment',
            'Correction of name and service address',
            'Correction of payment',
            'Electric service disconnection request',
            'Filing of complaint',
            'Net metering application',
            'Processing of change account ownership',
            'Senior citizen discount application',
            'Upgrading of load',
          ] as $service)
            <li class="flex items-center gap-2.5 px-5 py-3 border-b border-tei-blue/5 last:border-0">
              <svg class="w-3.5 h-3.5 shrink-0 text-tei-orange" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11l-3.293-3.293a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
              </svg>
              <span class="text-sm text-tei-gray">{{ $service }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>


    {{-- ── VISIT US CALLOUT ── --}}
    <div class="mt-10 scroll-reveal rounded-2xl overflow-hidden">
      <div class="p-6 sm:p-8" style="background: linear-gradient(135deg, rgba(15,61,92,0.97), rgba(8,40,64,0.99));">
        <div class="flex flex-col sm:flex-row sm:items-center gap-6 justify-between">
          <div class="flex gap-4 items-start">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5"
              style="background: rgba(231,103,39,0.15);">
              <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div>
              <p class="text-base font-bold text-white mb-1">Visit Us In Person</p>
              <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.65);">
                Our offices are open Monday–Friday, 8:00 AM – 5:00 PM. Bring valid ID and any relevant documents for faster processing.
              </p>
              <p class="text-sm font-medium mt-1.5" style="color: rgba(255,255,255,0.5);">
                Mabini St., Tarlac City, Tarlac
              </p>
            </div>
          </div>
          <div class="flex flex-col sm:flex-row gap-2 sm:shrink-0">
            <a href="tel:+63456061834"
              class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold transition-all duration-200"
              style="background-color: var(--color-tei-orange); color: white;"
              onmouseover="this.style.backgroundColor='#C45218'"
              onmouseout="this.style.backgroundColor='var(--color-tei-orange)'">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              (045) 606-1834
            </a>
            <a href="mailto:cwd@teiph.com"
              class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold transition-all duration-200"
              style="border: 1px solid rgba(255,255,255,0.2); color: rgba(255,255,255,0.9);"
              onmouseover="this.style.borderColor='rgba(255,255,255,0.4)'; this.style.backgroundColor='rgba(255,255,255,0.08)'"
              onmouseout="this.style.borderColor='rgba(255,255,255,0.2)'; this.style.backgroundColor='transparent'">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              cwd@teiph.com
            </a>
          </div>
        </div>
      </div>
    </div>

    {{-- Back link --}}
    <div class="mt-8 scroll-reveal">
      <a href="{{ route('customer.service-application') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-medium transition-colors duration-150 text-tei-gray hover:text-tei-blue">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Service Application
      </a>
    </div>

  </x-guest-section>

</div>
