{{-- ═══════════════════════════════════════════════
     NAVIGATION — 3-level menu
═══════════════════════════════════════════════ --}}
<nav x-data="{
        mobileOpen: false,
        scrolled: false,
        init() {
            window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 30 });
        }
     }"
     :class="scrolled ? 'py-0 shadow-2xl' : 'py-0'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
     style="background-color: rgba(8,40,64,0.97); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{-- ── Logo ── --}}
      <a href="/" wire:navigate class="shrink-0 flex items-center">
        <img src="{{ asset('assets/TEI-logo.png') }}" alt="Tarlac Electric Inc." class="h-10 w-auto">
      </a>

      {{-- ════════════════════════════════════════
           DESKTOP NAV
      ════════════════════════════════════════ --}}
      <div class="hidden lg:flex items-center gap-0.5">

        {{-- Home --}}
        <a href="/" wire:navigate
           class="px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
           style="color: rgba(255,255,255,0.9);"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
          Home
        </a>

        {{-- ── Customer (3-level) ── --}}
        <div class="relative"
             x-data="{
                 open: false,
                 subOpen: false,
                 _t: null,
                 go()   { clearTimeout(this._t); this.open = true },
                 stop() { this._t = setTimeout(() => { this.open = false; this.subOpen = false }, 220) }
             }"
             @mouseenter="go()" @mouseleave="stop()">

          {{-- L1: split button — label navigates, chevron toggles dropdown --}}
          <div :class="open ? 'bg-white/[0.14]' : 'hover:bg-white/[0.08]'"
               class="flex items-center rounded-lg transition-all duration-200">
            <a href="{{ route('customer') }}" wire:navigate
               :class="open ? 'text-white' : 'text-white/90'"
               class="pl-4 pr-1.5 py-2 text-sm font-medium transition-colors duration-200">
              Customer
            </a>
            <button @click.stop="open = !open; if (!open) subOpen = false"
                    :class="open ? 'text-white' : 'text-white/80'"
                    class="pr-3 py-2 cursor-pointer transition-colors duration-200 bg-transparent">
              <svg :class="open ? 'rotate-180' : ''"
                   class="w-4 h-4 transition-transform duration-200"
                   fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
          </div>

          {{-- L2 + L3 side-by-side wrapper (absolute, flex row) --}}
          <div x-show="open" x-cloak
               x-transition:enter="transition ease-out duration-150"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-100"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 translate-y-1"
               class="absolute top-full left-0 mt-2 flex items-start"
               style="z-index: 100;">

            {{-- ── L2 Panel ── --}}
            <div class="w-60 rounded-2xl overflow-hidden py-1.5"
                 style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- Group: General --}}
              <a href="#"
                 class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                 style="color: #374151;"
                 onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                 onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#9CA3AF">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Power Advisory Schedule
              </a>

              <a href="#"
                 class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                 style="color: #374151;"
                 onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                 onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#9CA3AF">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                How to read your bill
              </a>

              {{-- Divider --}}
              <div class="my-1.5 border-t mx-3" style="border-color: rgba(15,61,92,0.07);"></div>

              {{-- Service Application → L3 trigger --}}
              <button @mouseenter="subOpen = true"
                      class="w-full flex items-center justify-between gap-2 px-4 py-2.5 text-sm font-semibold transition-all duration-150 cursor-pointer"
                      :style="subOpen
                          ? 'background-color: rgba(231,103,39,0.08); color: var(--color-tei-orange);'
                          : 'color: #374151;'"
                      onmouseover="this.style.backgroundColor='rgba(231,103,39,0.08)'; this.style.color='var(--color-tei-orange)'"
                      onmouseout="if(!$data.subOpen){ this.style.backgroundColor='transparent'; this.style.color='#374151' }">
                <span class="flex items-center gap-3">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       :style="subOpen ? 'color: var(--color-tei-orange)' : 'color: #9CA3AF'">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                  Service Application
                </span>
                <svg :class="subOpen ? 'translate-x-0.5' : ''"
                     class="w-4 h-4 shrink-0 transition-transform duration-150"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </button>

              {{-- Divider --}}
              <div class="my-1.5 border-t mx-3" style="border-color: rgba(15,61,92,0.07);"></div>

              {{-- Remaining L2 items --}}
              @foreach ([
                  ['Bill Deposit',               'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                  ['Senior Citizen',             'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                  ['Net Metering',               'M13 10V3L4 14h7v7l9-11h-7z'],
                  ['Distributed Energy Resources','M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
                  ['Calculator',                 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'],
              ] as [$lbl, $ico])
              <a href="#"
                 class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors duration-150"
                 style="color: #374151;"
                 onmouseover="this.style.backgroundColor='rgba(15,61,92,0.05)'; this.style.color='#0F3D5C'"
                 onmouseout="this.style.backgroundColor='transparent'; this.style.color='#374151'">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#9CA3AF">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}"/>
                </svg>
                {{ $lbl }}
              </a>
              @endforeach

            </div>

            {{-- ── L3 Panel (Service Application) ── --}}
            <div x-show="subOpen" x-cloak
                 @mouseenter="subOpen = true"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 -translate-x-3 scale-95"
                 x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-x-2 scale-95"
                 class="ml-1.5 w-72 rounded-2xl overflow-hidden"
                 style="background: #ffffff; border: 1px solid rgba(15,61,92,0.09); box-shadow: 0 12px 40px rgba(15,61,92,0.16);">

              {{-- L3 header --}}
              <div class="px-4 pt-3.5 pb-2.5 border-b flex items-center gap-2.5"
                   style="border-color: rgba(15,61,92,0.07); background: linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.02));">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0"
                     style="background: rgba(231,103,39,0.1);">
                  <svg class="w-4 h-4" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div>
                  <p class="text-xs font-black uppercase tracking-wider" style="color: var(--color-tei-orange);">
                    Service Application
                  </p>
                  <p class="text-[11px] mt-0.5" style="color: #9CA3AF;">Choose an application type</p>
                </div>
              </div>

              {{-- L3 items --}}
              @foreach ([
                  ['Application Procedure',              'Step-by-step guide to apply for service', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
                  ['Application Requirement',            'Documents and forms needed for application', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                  ['Other Service Related Applications', 'Additional service requests and inquiries', 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
              ] as [$lbl, $desc, $ico])
              <a href="#"
                 class="flex items-center gap-3.5 px-4 py-3 transition-colors duration-150 border-b last:border-0 group"
                 style="border-color: rgba(15,61,92,0.05);"
                 onmouseover="this.style.backgroundColor='rgba(231,103,39,0.04)'"
                 onmouseout="this.style.backgroundColor='transparent'">
                <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 transition-colors duration-150"
                     style="background: rgba(15,61,92,0.06);"
                     onmouseover="this.style.backgroundColor='rgba(231,103,39,0.1)'"
                     onmouseout="this.style.backgroundColor='rgba(15,61,92,0.06)'">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #0F3D5C;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}"/>
                  </svg>
                </div>
                <div class="min-w-0">
                  <p class="text-sm font-semibold leading-tight" style="color: #0F3D5C;">{{ $lbl }}</p>
                  <p class="text-xs mt-0.5 leading-snug" style="color: #9CA3AF;">{{ $desc }}</p>
                </div>
                <svg class="w-4 h-4 shrink-0 ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #E76727;">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
              @endforeach

            </div>
          </div>
        </div>

        {{-- Other top-level links --}}
        @foreach (['About', 'Advisories', 'Careers'] as $link)
        <a href="#"
           class="px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
           style="color: rgba(255,255,255,0.9);"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
          {{ $link }}
        </a>
        @endforeach

      </div>

      {{-- ── Desktop CTA ── --}}
      <div class="hidden lg:flex items-center gap-4">
        <a href="tel:+6345-606-1834"
           class="text-sm font-medium transition-colors duration-200"
           style="color: rgba(255,255,255,0.5);"
           onmouseover="this.style.color='rgba(255,255,255,0.85)'"
           onmouseout="this.style.color='rgba(255,255,255,0.5)'">
          (045) 606-1834
        </a>
        <a href="#"
           class="px-5 py-2.5 text-sm font-bold rounded-xl transition-all duration-200 cursor-pointer shadow-lg"
           style="background-color: var(--color-tei-orange); color: white;"
           onmouseover="this.style.backgroundColor='#C45218'; this.style.transform='translateY(-1px)'"
           onmouseout="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform='translateY(0)'">
          Pay Bill
        </a>
      </div>

      {{-- ── Mobile hamburger ── --}}
      <button @click="mobileOpen = !mobileOpen"
              class="lg:hidden flex flex-col gap-1.5 p-2 rounded-lg cursor-pointer"
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
  <div x-show="mobileOpen" x-cloak
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 -translate-y-2"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 -translate-y-2"
       class="lg:hidden border-t"
       style="border-color: rgba(255,255,255,0.08);">

    <div class="max-w-7xl mx-auto px-4 py-3 pb-5 flex flex-col gap-0.5">

      {{-- Home --}}
      <a href="/" wire:navigate @click="mobileOpen = false"
         class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150"
         style="color: rgba(255,255,255,0.85);"
         onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'"
         onmouseout="this.style.backgroundColor='transparent'">
        Home
      </a>

      {{-- ── Mobile Customer accordion ── --}}
      <div x-data="{ cOpen: false, saOpen: false }">

        <button @click="cOpen = !cOpen; if (!cOpen) saOpen = false"
                :class="cOpen ? 'bg-white/[0.08] text-white' : 'text-white/[0.85]'"
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150 cursor-pointer bg-transparent">
          <span>Customer</span>
          <svg :class="cOpen ? 'rotate-180' : ''"
               class="w-4 h-4 transition-transform duration-200"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        {{-- L2 accordion content --}}
        <div x-show="cOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="mt-1 ml-4 pl-3 flex flex-col gap-0.5 border-l-2"
             style="border-color: rgba(231,103,39,0.35);">

          <a href="#"
             class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
             style="color: rgba(255,255,255,0.7);"
             onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
             onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            Power Advisory Schedule
          </a>
          <a href="#"
             class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
             style="color: rgba(255,255,255,0.7);"
             onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
             onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            How to read your bill
          </a>

          {{-- Service Application sub-accordion --}}
          <div x-data="{ saOpen: false }">
            <button @click="saOpen = !saOpen"
                    :class="saOpen ? 'bg-[#E76727]/10 text-[#E76727]' : 'text-white/[0.85]'"
                    class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-semibold rounded-lg transition-colors duration-150 cursor-pointer bg-transparent">
              <span>Service Application</span>
              <svg :class="saOpen ? 'rotate-180' : ''"
                   class="w-4 h-4 transition-transform duration-200"
                   fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>

            {{-- L3 accordion content --}}
            <div x-show="saOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-1"
                 class="mt-1 ml-3 pl-3 flex flex-col gap-0.5 border-l-2"
                 style="border-color: rgba(231,103,39,0.2);">

              @foreach (['Application Procedure', 'Application Requirement', 'Other Service Related Applications'] as $item)
              <a href="#"
                 class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
                 style="color: rgba(255,255,255,0.6);"
                 onmouseover="this.style.backgroundColor='rgba(255,255,255,0.06)'; this.style.color='rgba(255,255,255,0.9)'"
                 onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.6)'">
                {{ $item }}
              </a>
              @endforeach

            </div>
          </div>

          {{-- Rest of L2 --}}
          @foreach (['Bill Deposit', 'Senior Citizen', 'Net Metering', 'Distributed Energy Resources', 'Calculator'] as $item)
          <a href="#"
             class="px-3 py-2.5 text-sm rounded-lg transition-colors duration-150"
             style="color: rgba(255,255,255,0.7);"
             onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'"
             onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'">
            {{ $item }}
          </a>
          @endforeach

        </div>
      </div>

      {{-- Other top-level mobile links --}}
      @foreach (['About', 'Advisories', 'Careers'] as $link)
      <a href="#"
         class="px-4 py-3 text-sm font-medium rounded-xl transition-colors duration-150"
         style="color: rgba(255,255,255,0.85);"
         onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'"
         onmouseout="this.style.backgroundColor='transparent'">
        {{ $link }}
      </a>
      @endforeach

      {{-- Mobile Pay Bill CTA --}}
      <div class="pt-3 mt-1 border-t" style="border-color: rgba(255,255,255,0.08);">
        <a href="tel:+6345-606-1834"
           class="block text-center py-2.5 text-sm font-medium mb-2 transition-colors duration-200"
           style="color: rgba(255,255,255,0.45);">
          (045) 606-1834
        </a>
        <a href="#"
           class="block text-center py-3 text-sm font-bold rounded-xl transition-all duration-200"
           style="background-color: var(--color-tei-orange); color: white;"
           onmouseover="this.style.backgroundColor='#C45218'"
           onmouseout="this.style.backgroundColor='var(--color-tei-orange)'">
          Pay Bill Online
        </a>
      </div>

    </div>
  </div>

</nav>
