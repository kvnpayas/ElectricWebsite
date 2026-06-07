{{-- ─── Top header bar ──────────────────────────────────── --}}
<header class="sticky top-0 z-30 flex h-16 shrink-0 items-center gap-3 border-b px-4 sm:px-6"
        style="background-color: #FFFFFF; border-color: #E5E7EB;">

    {{-- Mobile sidebar toggle --}}
    <button @click="sidebarOpen = true"
            class="lg:hidden flex size-9 items-center justify-center rounded-lg transition-colors duration-150 cursor-pointer"
            style="color: #56565A;"
            onmouseover="this.style.backgroundColor='#F2F3F5'"
            onmouseout="this.style.backgroundColor='transparent'"
            aria-label="Open sidebar">
        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    {{-- Breadcrumb --}}
    <nav class="hidden sm:flex items-center gap-1.5 text-sm flex-1 min-w-0" aria-label="Breadcrumb">
        <span class="font-medium truncate" style="color: #082840;">@yield('page-title', 'Dashboard')</span>
    </nav>

    {{-- Spacer on mobile --}}
    <div class="flex-1 sm:hidden"></div>

    {{-- Right-side controls --}}
    <div class="flex items-center gap-1 sm:gap-2 shrink-0">

        {{-- Search button --}}
        <button class="hidden md:flex size-9 items-center justify-center rounded-lg transition-colors duration-150 cursor-pointer"
                style="color: #56565A;"
                onmouseover="this.style.backgroundColor='#F2F3F5'"
                onmouseout="this.style.backgroundColor='transparent'"
                aria-label="Search">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
            </svg>
        </button>

        {{-- Notifications --}}
        <div class="relative" x-data="{ notifOpen: false }" @click.outside="notifOpen = false">
            <button @click="notifOpen = !notifOpen"
                    class="relative flex size-9 items-center justify-center rounded-lg transition-colors duration-150 cursor-pointer"
                    style="color: #56565A;"
                    onmouseover="this.style.backgroundColor='#F2F3F5'"
                    onmouseout="this.style.backgroundColor='transparent'"
                    aria-label="Notifications">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                {{-- Unread badge --}}
                <span class="absolute top-1.5 right-1.5 size-2 rounded-full"
                      style="background-color: #E76727;"></span>
            </button>

            {{-- Notifications dropdown --}}
            <div x-show="notifOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                 class="absolute right-0 top-full mt-2 w-80 rounded-2xl border shadow-xl overflow-hidden"
                 style="background-color: #FFFFFF; border-color: #E5E7EB; z-index: 50;">
                <div class="flex items-center justify-between px-4 py-3 border-b" style="border-color: #F3F4F6;">
                    <span class="text-sm font-bold" style="color: #082840;">Notifications</span>
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full"
                          style="background-color: rgba(231,103,39,0.1); color: #E76727;">3 new</span>
                </div>
                @foreach ([
                    ['Emergency alert posted','Power advisory requires approval','2m ago','#EF4444'],
                    ['New user registered','Maria Santos joined as Customer','18m ago','#3B82F6'],
                    ['Media upload complete','12 photos added to library','1h ago','#8B5CF6'],
                ] as [$title, $sub, $time, $color])
                <div class="flex items-start gap-3 px-4 py-3 border-b cursor-pointer transition-colors duration-150"
                     style="border-color: #F9FAFB;"
                     onmouseover="this.style.backgroundColor='#F9FAFB'"
                     onmouseout="this.style.backgroundColor='transparent'">
                    <div class="size-2 mt-2 rounded-full shrink-0" style="background-color: {{ $color }};"></div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold leading-tight" style="color: #082840;">{{ $title }}</p>
                        <p class="text-xs mt-0.5 leading-snug" style="color: #56565A;">{{ $sub }}</p>
                    </div>
                    <span class="text-[10px] shrink-0 mt-0.5" style="color: #A7A8AA;">{{ $time }}</span>
                </div>
                @endforeach
                <div class="px-4 py-2.5 text-center">
                    <a href="#" class="text-xs font-semibold" style="color: #E76727;">View all notifications</a>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="hidden sm:block w-px h-6 mx-1" style="background-color: #E5E7EB;"></div>

        {{-- User menu --}}
        <div class="relative" x-data="{ userOpen: false }" @click.outside="userOpen = false">
            <button @click="userOpen = !userOpen"
                    class="flex items-center gap-2 rounded-xl pl-1 pr-3 py-1 transition-colors duration-150 cursor-pointer"
                    onmouseover="this.style.backgroundColor='#F2F3F5'"
                    onmouseout="this.style.backgroundColor='transparent'">
                <div class="size-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm"
                     style="background: linear-gradient(135deg, #E76727, #C45218);">
                    AD
                </div>
                <span class="hidden sm:block text-sm font-semibold" style="color: #082840;">Admin</span>
                <svg class="size-4 transition-transform duration-200" :class="userOpen ? 'rotate-180' : ''"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"
                     style="color: #A7A8AA;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- User dropdown --}}
            <div x-show="userOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                 class="absolute right-0 top-full mt-2 w-52 rounded-2xl border shadow-xl overflow-hidden"
                 style="background-color: #FFFFFF; border-color: #E5E7EB; z-index: 50;">
                <div class="px-4 py-3 border-b" style="border-color: #F3F4F6;">
                    <p class="text-sm font-bold" style="color: #082840;">Admin User</p>
                    <p class="text-xs" style="color: #A7A8AA;">admin@tei.com.ph</p>
                </div>
                @foreach ([
                    ['Profile Settings','M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['View Website','M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14'],
                ] as [$label, $iconPath])
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm transition-colors duration-150 cursor-pointer"
                   style="color: #56565A;"
                   onmouseover="this.style.backgroundColor='#F9FAFB'; this.style.color='#082840'"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.color='#56565A'">
                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"/>
                    </svg>
                    {{ $label }}
                </a>
                @endforeach
                <div class="border-t" style="border-color: #F3F4F6;">
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm transition-colors duration-150 cursor-pointer"
                       style="color: #EF4444;"
                       onmouseover="this.style.backgroundColor='#FFF5F5'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign out
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
