<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    #[Computed]
    public function navGroups(): array
    {
        return [
            'Overview' => [
                [
                    'label' => 'Dashboard',
                    'href' => route('admin.dashboard'),
                    'active' => request()->routeIs('admin.dashboard'),
                    'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                ],
            ],
            'Content' => [
                // [
                //     'label' => 'Posts & News',
                //     'href' => '#',
                //     'active' => request()->routeIs('admin.posts*'),
                //     'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                //     'badge' => '3',
                // ],
                [
                    'label' => 'Rates & Advisories',
                    'href' => route('admin.rates-advisories'),
                    'active' => request()->routeIs('admin.rates-advisories*'),
                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                ],
                [
                    'label' => 'Power Interruption',
                    'href' => route('admin.power-interruption'),
                    'active' => request()->routeIs('admin.power-interruption*'),
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                ],
                [
                    'label' => 'About Documents',
                    'href' => route('admin.about-documents'),
                    'active' => request()->is('admin/about-documents*'),
                    'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
                ],
                [
                    'label' => 'Profile Documents',
                    'href' => route('admin.profile-documents'),
                    'active' => request()->is('admin/profile-documents*'),
                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                ],
                [
                    'label' => 'Hosting Capacity',
                    'href' => route('admin.hosting-capacity'),
                    'active' => request()->routeIs('admin.hosting-capacity*'),
                    'icon' => 'M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z',
                ],
            ],
            'Media' => [
                [
                    'label' => 'Media Library',
                    'href' => '#',
                    'active' => request()->routeIs('admin.media*'),
                    'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                ],
            ],
            'Homepage' => [
                [
                    'label' => 'Homepage Banners',
                    'href' => route('admin.home-banners'),
                    'active' => request()->routeIs('admin.home-banners*'),
                    'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z',
                ],
            ],
            'Procurement' => [
                [
                    'label' => 'Power Supply Procurement',
                    'href' => route('admin.csp-procurement'),
                    'active' => request()->is('admin/csp-procurement*'),
                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                ],
                [
                    'label' => 'Procurement Opportunities',
                    'href' => route('admin.procurement-opportunities'),
                    'active' => request()->is('admin/procurement-opportunities*'),
                    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                ],
            ],
            'Access' => [
                [
                    'label' => 'Users',
                    'href' => route('admin.users.index'),
                    'active' => request()->routeIs('admin.users*'),
                    'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                ],
                // [
                //     'label' => 'Roles',
                //     'href' => '#',
                //     'active' => request()->routeIs('admin.roles*'),
                //     'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                // ],
            ],
            'System' => [
                [
                    'label' => 'Settings',
                    'href' => '#',
                    'active' => request()->routeIs('admin.settings*'),
                    'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                ],
                [
                    'label' => 'Activity Log',
                    'href' => '#',
                    'active' => request()->routeIs('admin.activity*'),
                    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                ],
            ],
        ];
    }
};
?>

{{-- ─── Mobile overlay backdrop ──────────────────────────── --}}
<div>
  <div x-show="sidebarOpen" x-cloak x-transition:enter="transition-opacity ease-linear duration-200"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
    class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm lg:hidden"></div>

  {{-- ─── Sidebar ────────────────────────────────────────────── --}}
  <aside
    class="fixed inset-y-0 left-0 z-40 flex flex-col overflow-hidden transition-all duration-300 ease-in-out bg-tei-blue-dark"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    :style="{ width: (sidebarCollapsed && isDesktop) ? '80px' : '288px' }">

    {{-- Logo / brand header --}}
    <div class="flex h-16 shrink-0 items-center justify-between px-4 border-b border-white/8">
      <a href="{{ url('/') }}" class="flex items-center gap-3 min-w-0" title="Back to website">
        <div
          class="shrink-0 size-9 rounded-xl flex items-center justify-center shadow-lg bg-linear-to-br from-tei-orange to-tei-orange-dark">
          <span class="text-white font-black text-base leading-none font-display">T</span>
        </div>
        <div x-cloak x-show="!(sidebarCollapsed && isDesktop)" class="min-w-0 overflow-hidden">
          <p class="text-white font-bold text-sm leading-tight truncate font-display">TEI Admin</p>
          <p class="text-[10px] truncate text-white/40">Content Management</p>
        </div>
      </a>
      {{-- Desktop collapse toggle --}}
      <button @click="sidebarCollapsed = !sidebarCollapsed" x-cloak x-show="isDesktop"
        class="hidden lg:flex size-7 rounded-lg items-center justify-center transition-colors duration-200 cursor-pointer shrink-0 text-white/40 hover:bg-white/8 hover:text-white"
        :aria-label="sidebarCollapsed ? 'Expand sidebar' : 'Collapse sidebar'">
        <svg class="size-4 transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : ''"
          fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-4 space-y-6" aria-label="Main navigation">
      @foreach ($this->navGroups as $groupName => $items)
        <div>
          {{-- Group label --}}
          <p x-cloak x-show="!(sidebarCollapsed && isDesktop)"
            class="px-4 mb-1 text-[10px] font-bold tracking-[0.12em] uppercase select-none text-white/30">
            {{ $groupName }}
          </p>

          {{-- Items --}}
          <ul class="space-y-0.5 px-2">
            @foreach ($items as $item)
              <li>
                <a href="{{ $item['href'] }}" @if ($item['href'] !== '#') wire:navigate @endif
                  class="flex items-center gap-3 px-2 py-2.5 rounded-xl text-sm font-medium transition-colors duration-150 cursor-pointer group relative
                              {{ $item['active']
                                  ? 'bg-tei-orange/15 text-white border-l-[3px] border-tei-orange'
                                  : 'text-white/70 hover:bg-white/8 hover:text-white' }}"
                  :class="(sidebarCollapsed && isDesktop) ? 'justify-center' : ''"
                  :title="(sidebarCollapsed && isDesktop) ? '{{ $item['label'] }}' : ''">

                  {{-- Icon --}}
                  <svg class="size-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $item['icon'] }}" />
                  </svg>

                  {{-- Label --}}
                  <span x-cloak x-show="!(sidebarCollapsed && isDesktop)"
                    class="truncate flex-1">{{ $item['label'] }}</span>

                  {{-- Badge --}}
                  @if (!empty($item['badge']))
                    <span x-cloak x-show="!(sidebarCollapsed && isDesktop)"
                      class="shrink-0 text-[10px] font-bold px-1.5 py-0.5 rounded-full bg-tei-orange text-white">
                      {{ $item['badge'] }}
                    </span>
                  @endif
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </nav>

    {{-- User profile footer --}}
    <div class="shrink-0 border-t border-white/8 p-3">
      <div
        class="flex items-center gap-3 px-2 py-2 rounded-xl transition-colors duration-150 cursor-pointer hover:bg-white/8"
        :class="(sidebarCollapsed && isDesktop) ? 'justify-center' : ''">
        <div
          class="shrink-0 size-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow bg-linear-to-br from-tei-orange to-tei-orange-dark">
          AD
        </div>
        <div x-cloak x-show="!(sidebarCollapsed && isDesktop)" class="min-w-0 flex-1 overflow-hidden">
          <p class="text-white text-sm font-semibold leading-tight truncate">Admin User</p>
          <p class="text-[11px] truncate text-white/40">admin@tei.com.ph</p>
        </div>
        <svg x-cloak x-show="!(sidebarCollapsed && isDesktop)" class="size-4 shrink-0 text-white/30" fill="none"
          stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
      </div>
    </div>
  </aside>
</div>
