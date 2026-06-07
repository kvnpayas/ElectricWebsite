{{-- ═══════════════════════════════════════════════
     NAVIGATION
═══════════════════════════════════════════════ --}}
<nav
    x-data="{
        mobileOpen: false,
        scrolled: false,
        init() { window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 30 }) }
    }"
    :class="scrolled ? 'py-2 shadow-xl' : 'py-4'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    style="background-color: rgba(15,61,92,0.97); backdrop-filter: blur(12px);">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="/" class="flex flex-col leading-none group">
                <span class="text-3xl font-black tracking-tight transition-colors duration-200"
                      style="font-family: var(--font-display); color: var(--color-tei-orange);">tei</span>
                <span class="text-[9px] font-bold tracking-[0.18em] uppercase"
                      style="color: rgba(255,255,255,0.7);">Tarlac Electric</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 cursor-pointer"
                   style="color: rgba(255,255,255,0.9);"
                   onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                   onmouseout="this.style.backgroundColor='transparent'">Home</a>

                {{-- Services dropdown --}}
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center gap-1 px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 cursor-pointer"
                            style="color: rgba(255,255,255,0.9);"
                            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                            onmouseout="this.style.backgroundColor='transparent'">
                        Services
                        <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full left-0 mt-1 w-60 rounded-xl shadow-2xl overflow-hidden"
                         style="background-color: #FFFFFF; border: 1px solid rgba(15,61,92,0.1);">
                        @foreach ([
                            ['Bill Payment','Pay your electricity bill online'],
                            ['New Connection','Apply for a new service connection'],
                            ['Report Outage','Report power interruptions'],
                            ['E-SOA Enrollment','Switch to paperless billing'],
                            ['Senior Discount','Apply for senior citizen discount'],
                            ['Power Rates','View current electricity rates'],
                        ] as [$label, $desc])
                        <a href="#" class="flex flex-col px-4 py-3 transition-colors duration-150 cursor-pointer border-b last:border-0"
                           style="border-color: rgba(15,61,92,0.07);"
                           onmouseover="this.style.backgroundColor='rgba(15,61,92,0.04)'"
                           onmouseout="this.style.backgroundColor='transparent'">
                            <span class="text-sm font-semibold" style="color: var(--color-tei-blue);">{{ $label }}</span>
                            <span class="text-xs mt-0.5" style="color: var(--color-tei-gray);">{{ $desc }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                @foreach (['About','Advisories','Careers'] as $link)
                <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 cursor-pointer"
                   style="color: rgba(255,255,255,0.9);"
                   onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
                   onmouseout="this.style.backgroundColor='transparent'">{{ $link }}</a>
                @endforeach
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden lg:flex items-center gap-4">
                <a href="tel:+6345-606-1834" class="text-sm font-medium transition-colors duration-200"
                   style="color: rgba(255,255,255,0.65);"
                   onmouseover="this.style.color='white'"
                   onmouseout="this.style.color='rgba(255,255,255,0.65)'">
                    (045) 606-1834
                </a>
                <a href="#" class="px-5 py-2.5 text-sm font-bold rounded-xl transition-all duration-200 cursor-pointer shadow-lg"
                   style="background-color: var(--color-tei-orange); color: white;"
                   onmouseover="this.style.backgroundColor='var(--color-tei-orange-dark)'; this.style.transform='translateY(-1px)'"
                   onmouseout="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform='translateY(0)'">
                    Pay Bill
                </a>
            </div>

            {{-- Mobile hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                    class="lg:hidden flex flex-col gap-1.5 p-2 rounded-lg cursor-pointer"
                    aria-label="Toggle menu">
                <span :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"
                      class="block w-6 h-0.5 bg-white transition-all duration-300 origin-center"></span>
                <span :class="mobileOpen ? 'opacity-0' : ''"
                      class="block w-6 h-0.5 bg-white transition-all duration-300"></span>
                <span :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"
                      class="block w-6 h-0.5 bg-white transition-all duration-300 origin-center"></span>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-3"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-3"
         class="lg:hidden border-t mt-2 pb-4"
         style="border-color: rgba(255,255,255,0.1);">
        <div class="max-w-7xl mx-auto px-4 pt-3 flex flex-col gap-1">
            @foreach (['Home','About','Advisories','Careers'] as $link)
            <a href="#" class="px-4 py-3 text-sm font-medium rounded-lg transition-colors duration-150"
               style="color: rgba(255,255,255,0.85);"
               onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'"
               onmouseout="this.style.backgroundColor='transparent'">{{ $link }}</a>
            @endforeach
            <div class="border-t my-2 pt-2" style="border-color: rgba(255,255,255,0.1);">
                <p class="px-4 py-2 text-xs font-bold uppercase tracking-widest" style="color: rgba(255,255,255,0.35);">Services</p>
                @foreach (['Bill Payment','New Connection','Report Outage','E-SOA Enrollment','Power Rates'] as $svc)
                <a href="#" class="px-4 py-2.5 text-sm font-medium rounded-lg block transition-colors duration-150"
                   style="color: rgba(255,255,255,0.75);"
                   onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'"
                   onmouseout="this.style.backgroundColor='transparent'">{{ $svc }}</a>
                @endforeach
            </div>
            <a href="#" class="mt-2 mx-0 py-3 text-center text-sm font-bold rounded-xl"
               style="background-color: var(--color-tei-orange); color: white;">
                Pay Bill Online
            </a>
        </div>
    </div>
</nav>
