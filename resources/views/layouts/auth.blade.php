{{-- Authenticated / admin layout — used by the back-office dashboard and CMS pages --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._head')
</head>
<body class="antialiased overflow-x-hidden"
      style="background-color: #F2F3F5; font-family: var(--font-sans);"
      x-data="{
          sidebarOpen: false,
          sidebarCollapsed: false,
          isDesktop: window.innerWidth >= 1024,
          notifOpen: false,
          userOpen: false,
          init() {
              window.addEventListener('resize', () => {
                  this.isDesktop = window.innerWidth >= 1024;
                  if (this.isDesktop) this.sidebarOpen = false;
              });
          }
      }"
      @keydown.escape="sidebarOpen = false; notifOpen = false; userOpen = false">

    {{-- Sidebar navigation --}}
    <livewire:admin.partials.sidebar />

    {{-- Main area — shifts right on desktop to clear the fixed sidebar --}}
    <div class="transition-all duration-300 ease-in-out min-h-screen flex flex-col"
         :class="(sidebarCollapsed && isDesktop) ? 'lg:pl-20' : 'lg:pl-72'">

        {{-- Topbar --}}
        @include('admin.partials.header')

        {{-- Page content — @yield for traditional @extends pages, $slot for Livewire full-page components --}}
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </main>

        {{-- Footer --}}
        @include('admin.partials.footer')

    </div>

    @stack('scripts')

</body>
</html>
