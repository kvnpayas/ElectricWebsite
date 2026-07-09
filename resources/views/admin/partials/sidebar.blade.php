@php
$navGroups = [
    'Overview' => [
        [
            'label'  => 'Dashboard',
            'href'   => url('/admin/dashboard'),
            'active' => request()->is('admin/dashboard'),
            'icon'   => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        ],
    ],
    'Content' => [
        [
            'label'  => 'Rates & Advisories',
            'href'   => route('admin.rates-advisories'),
            'active' => request()->is('admin/rates-advisories*'),
            'icon'   => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        ],
        [
            'label'  => 'Power Interruption',
            'href'   => route('admin.power-interruption'),
            'active' => request()->is('admin/power-interruption*'),
            'icon'   => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        ],
        [
            'label'  => 'About Documents',
            'href'   => route('admin.about-documents'),
            'active' => request()->is('admin/about-documents*'),
            'icon'   => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
        ],
    ],
    'Media' => [
        [
            'label'  => 'Media Library',
            'href'   => '#',
            'active' => request()->is('admin/media*'),
            'icon'   => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
        ],
    ],
    'Homepage' => [
        [
            'label'  => 'Hero Section',
            'href'   => '#',
            'active' => request()->is('admin/hero*'),
            'icon'   => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
        ],
        [
            'label'  => 'Carousel / Banners',
            'href'   => '#',
            'active' => request()->is('admin/carousel*'),
            'icon'   => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z',
        ],
    ],
    'CSP' => [
        [
            'label'  => 'Power Supply Procurement',
            'href'   => route('admin.csp-procurement'),
            'active' => request()->is('admin/csp-procurement*'),
            'icon'   => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        ],
    ],
    'Access' => [
        [
            'label'  => 'Users',
            'href'   => '/admin/users',
            'active' => request()->is('admin/users*'),
            'icon'   => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        ],
        [
            'label'  => 'Roles',
            'href'   => '#',
            'active' => request()->is('admin/roles*'),
            'icon'   => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        ],
    ],
    'System' => [
        [
            'label'  => 'Settings',
            'href'   => route('admin.settings'),
            'active' => request()->is('admin/settings*'),
            'icon'   => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
        ],
        [
            'label'  => 'Activity Log',
            'href'   => route('admin.activity-log'),
            'active' => request()->is('admin/activity-log*'),
            'icon'   => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
        ],
    ],
];
@endphp

{{-- ─── Mobile overlay backdrop ──────────────────────────── --}}
<div x-show="sidebarOpen"
     x-cloak
     x-transition:enter="transition-opacity ease-linear duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm lg:hidden"></div>

{{-- ─── Sidebar ────────────────────────────────────────────── --}}
<aside class="fixed inset-y-0 left-0 z-40 flex flex-col overflow-hidden transition-all duration-300 ease-in-out"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
       :style="{ backgroundColor: '#082840', width: (sidebarCollapsed && isDesktop) ? '80px' : '288px' }">

    {{-- Logo / brand header --}}
    <div class="flex h-16 shrink-0 items-center justify-between px-4 border-b"
         style="border-color: rgba(255,255,255,0.08);">
        <a href="{{ url('/') }}" class="flex items-center gap-3 min-w-0" title="Back to website">
            <div class="shrink-0 size-9 rounded-xl flex items-center justify-center shadow-lg"
                 style="background: linear-gradient(135deg, #E76727, #C45218);">
                <span class="text-white font-black text-base leading-none"
                      style="font-family: var(--font-display);">T</span>
            </div>
            <div x-cloak x-show="!(sidebarCollapsed && isDesktop)" class="min-w-0 overflow-hidden">
                <p class="text-white font-bold text-sm leading-tight truncate"
                   style="font-family: var(--font-display);">TEI Admin</p>
                <p class="text-[10px] truncate" style="color: rgba(255,255,255,0.4);">Content Management</p>
            </div>
        </a>
        {{-- Desktop collapse toggle --}}
        <button @click="sidebarCollapsed = !sidebarCollapsed"
                x-cloak
                x-show="isDesktop"
                class="hidden lg:flex size-7 rounded-lg items-center justify-center transition-colors duration-200 cursor-pointer shrink-0"
                style="color: rgba(255,255,255,0.4);"
                onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='white'"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.4)'"
                :aria-label="sidebarCollapsed ? 'Expand sidebar' : 'Collapse sidebar'">
            <svg class="size-4 transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : ''"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-4 space-y-6" aria-label="Main navigation">
        @foreach ($navGroups as $groupName => $items)
        <div>
            {{-- Group label --}}
            <p x-cloak x-show="!(sidebarCollapsed && isDesktop)"
               class="px-4 mb-1 text-[10px] font-bold tracking-[0.12em] uppercase select-none"
               style="color: rgba(255,255,255,0.3);">{{ $groupName }}</p>

            {{-- Items --}}
            <ul class="space-y-0.5 px-2">
                @foreach ($items as $item)
                <li>
                    <a href="{{ $item['href'] }}" wire:navigate
                       class="flex items-center gap-3 px-2 py-2.5 rounded-xl text-sm font-medium transition-colors duration-150 cursor-pointer group relative"
                       :class="(sidebarCollapsed && isDesktop) ? 'justify-center' : ''"
                       style="{{ $item['active'] ? 'background-color: rgba(231,103,39,0.15); color: white; border-left: 3px solid #E76727;' : 'color: rgba(255,255,255,0.7);' }}"
                       onmouseover="{{ $item['active'] ? '' : "this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.color='white'" }}"
                       onmouseout="{{ $item['active'] ? '' : "this.style.backgroundColor='transparent'; this.style.color='rgba(255,255,255,0.7)'" }}"
                       :title="(sidebarCollapsed && isDesktop) ? '{{ $item['label'] }}' : ''">

                        {{-- Icon --}}
                        <svg class="size-5 shrink-0" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.75" d="{{ $item['icon'] }}"/>
                        </svg>

                        {{-- Label --}}
                        <span x-cloak x-show="!(sidebarCollapsed && isDesktop)"
                              class="truncate flex-1">{{ $item['label'] }}</span>

                        {{-- Badge --}}
                        @if(!empty($item['badge']))
                        <span x-cloak x-show="!(sidebarCollapsed && isDesktop)"
                              class="shrink-0 text-[10px] font-bold px-1.5 py-0.5 rounded-full"
                              style="background-color: #E76727; color: white;">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </nav>

    {{-- User profile footer --}}
    <div class="shrink-0 border-t p-3" style="border-color: rgba(255,255,255,0.08);">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl transition-colors duration-150 cursor-pointer"
             :class="(sidebarCollapsed && isDesktop) ? 'justify-center' : ''"
             onmouseover="this.style.backgroundColor='rgba(255,255,255,0.07)'"
             onmouseout="this.style.backgroundColor='transparent'">
            <div class="shrink-0 size-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow"
                 style="background: linear-gradient(135deg, #E76727, #C45218);">
                AD
            </div>
            <div x-cloak x-show="!(sidebarCollapsed && isDesktop)" class="min-w-0 flex-1 overflow-hidden">
                <p class="text-white text-sm font-semibold leading-tight truncate">Admin User</p>
                <p class="text-[11px] truncate" style="color: rgba(255,255,255,0.4);">admin@tei.com.ph</p>
            </div>
            <svg x-cloak x-show="!(sidebarCollapsed && isDesktop)"
                 class="size-4 shrink-0" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" width="16" height="16" style="color: rgba(255,255,255,0.3);">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>
    </div>
</aside>
