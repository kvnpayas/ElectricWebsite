<?php

use Livewire\Component;

new class extends Component {
    public string $userName  = '';
    public string $userEmail = '';
    public string $initials  = '';

    public function mount(): void
    {
        $user = Auth::user();

        $this->userName  = $user->name;
        $this->userEmail = $user->email;
        $this->initials  = get_initials($user->name);
    }

    public function logout(): void
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(route('login'), navigate: true);
    }
};
?>

@php
$searchModules = [
    ['label' => 'Dashboard',                 'desc' => 'Overview and quick access',          'group' => 'Overview',    'url' => route('admin.dashboard')],
    ['label' => 'Rates & Advisories',        'desc' => 'Documents and rate schedules',       'group' => 'Content',     'url' => route('admin.rates-advisories')],
    ['label' => 'Power Interruption',        'desc' => 'Scheduled outage management',        'group' => 'Content',     'url' => route('admin.power-interruption')],
    ['label' => 'About Documents',           'desc' => 'Governance and disclosure files',    'group' => 'Content',     'url' => route('admin.about-documents')],
    ['label' => 'Profile Documents',         'desc' => 'Articles and by-laws',               'group' => 'Content',     'url' => route('admin.profile-documents')],
    ['label' => 'Hosting Capacity',          'desc' => 'Grid capacity data',                 'group' => 'Content',     'url' => route('admin.hosting-capacity')],
    ['label' => 'Media Library',             'desc' => 'Livestream management',              'group' => 'Media',       'url' => route('admin.media-library')],
    ['label' => 'Homepage Banners',          'desc' => 'Hero slider images',                 'group' => 'Homepage',    'url' => route('admin.home-banners')],
    ['label' => 'Power Supply Procurement',  'desc' => 'CSP bid management',                 'group' => 'Procurement', 'url' => route('admin.csp-procurement')],
    ['label' => 'Procurement Opportunities', 'desc' => 'Open procurement opportunities',     'group' => 'Procurement', 'url' => route('admin.procurement-opportunities')],
    ['label' => 'Users',                     'desc' => 'Admin account management',           'group' => 'Access',      'url' => route('admin.users.index')],
    ['label' => 'Settings',                  'desc' => 'Contact info and site notices',      'group' => 'System',      'url' => route('admin.settings')],
    ['label' => 'Activity Log',              'desc' => 'Full audit trail',                   'group' => 'System',      'url' => route('admin.activity-log')],
    ['label' => 'My Profile',                'desc' => 'Account settings and password',      'group' => 'System',      'url' => route('admin.profile')],
];
@endphp

<header
  x-data="{
    searchOpen: false,
    query: '',
    activeIndex: 0,
    modules: @js($searchModules),
    get filtered() {
      if (!this.query.trim()) return this.modules;
      const q = this.query.toLowerCase();
      return this.modules.filter(m =>
        m.label.toLowerCase().includes(q) ||
        m.desc.toLowerCase().includes(q)  ||
        m.group.toLowerCase().includes(q)
      );
    },
    open() {
      this.searchOpen = true;
      this.query = '';
      this.activeIndex = 0;
      this.$nextTick(() => this.$refs.searchInput?.focus());
    },
    close() { this.searchOpen = false; this.query = ''; },
    go(url) {
      this.close();
      if (typeof Livewire !== 'undefined') {
        Livewire.navigate(url);
      } else {
        window.location.href = url;
      }
    },
    init() {
      this.$watch('query', () => { this.activeIndex = 0; });
    }
  }"
  @keydown.ctrl.k.window.prevent="open()"
  @keydown.meta.k.window.prevent="open()"
  @keydown.escape.window="close()"
  class="sticky top-0 z-30 flex h-16 shrink-0 items-center gap-3 border-b px-4 sm:px-6"
  style="background-color: #FFFFFF; border-color: #E5E7EB;">

  {{-- ── Search palette modal (teleported outside header stacking context) ── --}}
  <template x-teleport="body">
    <div
      x-show="searchOpen"
      x-cloak
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-60 flex items-start justify-center pt-[14vh] px-4"
      style="background-color: rgba(8,40,64,0.65); backdrop-filter: blur(4px);"
      @click.self="close()">

      <div
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
        class="w-full max-w-lg rounded-2xl border overflow-hidden shadow-2xl"
        style="background-color: #FFFFFF; border-color: #E5E7EB;"
        @keydown.arrow-down.prevent="activeIndex = Math.min(activeIndex + 1, filtered.length - 1)"
        @keydown.arrow-up.prevent="activeIndex = Math.max(activeIndex - 1, 0)"
        @keydown.enter.prevent="if (filtered[activeIndex]) go(filtered[activeIndex].url)">

        {{-- Input row --}}
        <div class="flex items-center gap-3 px-4 border-b" style="border-color: #F3F4F6;">
          <svg class="size-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #A7A8AA;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
          </svg>
          <input
            x-ref="searchInput"
            x-model="query"
            type="text"
            placeholder="Search modules…"
            class="flex-1 py-4 text-sm bg-transparent outline-none placeholder-gray-400"
            style="color: #082840;"
            autocomplete="off" />
          <button @click="close()"
            class="text-[11px] font-medium px-2 py-0.5 rounded border cursor-pointer shrink-0"
            style="color: #A7A8AA; border-color: #E5E7EB;">Esc</button>
        </div>

        {{-- Results --}}
        <div class="max-h-80 overflow-y-auto">

          <template x-if="filtered.length > 0">
            <ul>
              <template x-for="(item, index) in filtered" :key="item.url">
                <li>
                  <button
                    @click="go(item.url)"
                    @mouseenter="activeIndex = index"
                    :class="activeIndex === index ? 'bg-tei-orange/6' : ''"
                    class="w-full flex items-center gap-3 px-4 py-3 text-left transition-colors duration-100 cursor-pointer">
                    <div class="size-8 rounded-lg flex items-center justify-center shrink-0 transition-colors duration-100"
                      :class="activeIndex === index ? 'bg-tei-orange/15' : 'bg-tei-blue/5'">
                      <svg class="size-4 transition-colors duration-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        :style="activeIndex === index ? 'color:#E76727' : 'color:#A7A8AA'">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                      </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                      <p class="text-sm font-semibold leading-snug" style="color: #082840;" x-text="item.label"></p>
                      <p class="text-xs leading-snug mt-0.5" style="color: #A7A8AA;" x-text="item.desc"></p>
                    </div>
                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full shrink-0"
                      style="background-color: #F3F4F6; color: #A7A8AA;" x-text="item.group"></span>
                  </button>
                </li>
              </template>
            </ul>
          </template>

          <template x-if="filtered.length === 0">
            <div class="flex flex-col items-center justify-center py-10 text-center">
              <svg class="size-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #E5E7EB;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
              </svg>
              <p class="text-sm font-semibold" style="color: #A7A8AA;">No results for
                "<span x-text="query" style="color: #56565A;"></span>"</p>
            </div>
          </template>

        </div>

        {{-- Footer hints --}}
        <div class="flex items-center gap-4 px-4 py-2.5 border-t text-[11px] font-medium"
          style="border-color: #F3F4F6; color: #C4C4C7;">
          <span><kbd class="font-mono">↑↓</kbd> navigate</span>
          <span><kbd class="font-mono">↵</kbd> go</span>
          <span><kbd class="font-mono">Esc</kbd> close</span>
          <span class="ml-auto hidden sm:inline"><kbd class="font-mono">Ctrl K</kbd> to open</span>
        </div>

      </div>
    </div>
  </template>

  {{-- Mobile sidebar toggle --}}
  <button @click="sidebarOpen = true"
    class="lg:hidden flex size-9 items-center justify-center rounded-lg transition-colors duration-150 cursor-pointer"
    style="color: #56565A;" onmouseover="this.style.backgroundColor='#F2F3F5'"
    onmouseout="this.style.backgroundColor='transparent'" aria-label="Open sidebar">
    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  <div class="flex-1"></div>
  <div class="flex-1 sm:hidden"></div>

  {{-- Right-side controls --}}
  <div class="flex items-center gap-1 sm:gap-2 shrink-0">

    {{-- Search button --}}
    <button @click="open()"
      class="flex items-center gap-2 rounded-lg px-2.5 py-1.5 transition-colors duration-150 cursor-pointer"
      style="color: #56565A;" onmouseover="this.style.backgroundColor='#F2F3F5'"
      onmouseout="this.style.backgroundColor='transparent'" aria-label="Search">
      <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
      </svg>
      <span class="hidden md:inline text-xs font-medium" style="color: #A7A8AA;">Search</span>
      <kbd class="hidden lg:inline-flex items-center gap-0.5 text-[10px] font-mono px-1.5 py-0.5 rounded border"
        style="color: #C4C4C7; border-color: #E5E7EB; background: #F9FAFB;">Ctrl K</kbd>
    </button>

    {{-- Divider --}}
    <div class="hidden sm:block w-px h-6 mx-1" style="background-color: #E5E7EB;"></div>

    {{-- User menu --}}
    <div class="relative" x-data="{ userOpen: false }" @click.outside="userOpen = false">
      <button @click="userOpen = !userOpen"
        class="flex items-center gap-2 rounded-xl pl-1 pr-3 py-1 transition-colors duration-150 cursor-pointer"
        onmouseover="this.style.backgroundColor='#F2F3F5'" onmouseout="this.style.backgroundColor='transparent'">
        <div
          class="size-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm bg-linear-to-r from-tei-orange to-tei-orange-dark">
          {{ $initials }}
        </div>
        <span class="hidden sm:block text-sm font-semibold text-tei-blue-dark">{{ $userName }}</span>
        <svg class="size-4 transition-transform duration-200" :class="userOpen ? 'rotate-180' : ''" fill="none"
          stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" style="color: #A7A8AA;">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      {{-- User dropdown --}}
      <div x-show="userOpen" x-cloak x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-1 scale-95"
        class="absolute right-0 top-full mt-2 w-52 rounded-2xl border shadow-xl overflow-hidden"
        style="background-color: #FFFFFF; border-color: #E5E7EB; z-index: 50;">
        <div class="px-4 py-3 border-b" style="border-color: #F3F4F6;">
          <p class="text-sm font-bold text-tei-blue-dark">{{ $userName }}</p>
          <p class="text-xs text-tei-gray">{{ $userEmail }}</p>
        </div>
        @foreach ([['Profile Settings', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'admin.profile'], ['View Website', 'M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14', 'home']] as [$label, $iconPath, $url])
          <a href="{{ Route::has($url) ? route($url) : '#' }}" wire:navigate
            class="flex items-center gap-3 px-4 py-2.5 text-sm transition-colors duration-150 cursor-pointer"
            style="color: #56565A;" onmouseover="this.style.backgroundColor='#F9FAFB'; this.style.color='#082840'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#56565A'">
            <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
            </svg>
            {{ $label }}
          </a>
        @endforeach
        <div class="border-t" style="border-color: #F3F4F6;">
          <button wire:click="logout"
            class="flex items-center gap-3 px-4 py-2.5 text-sm transition-colors duration-150 cursor-pointer w-full text-left"
            style="color: #EF4444;" onmouseover="this.style.backgroundColor='#FFF5F5'"
            onmouseout="this.style.backgroundColor='transparent'">
            <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Sign out
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
