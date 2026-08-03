{{-- Authenticated / admin layout — used by the back-office dashboard and CMS pages --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._head')

    <script>document.documentElement.classList.add('admin-js-anim')</script>
    <style>.admin-js-anim .admin-page-header,.admin-js-anim .stat-card,.admin-js-anim .admin-table-card{opacity:0}</style>
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
       <livewire:admin.partials.header />

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

    {{-- ─── Global toast ─────────────────────────────────── --}}
    <div x-data="{
            show: false,
            message: '',
            type: 'success',
            timer: null,
            notify(msg, type) {
                this.message = msg;
                this.type = type ?? 'success';
                this.show = true;
                clearTimeout(this.timer);
                this.timer = setTimeout(() => { this.show = false }, 4000);
            }
         }"
         x-on:toast.window="notify($event.detail.message, $event.detail.type)"
         x-show="show"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         :class="{
             'bg-success': type === 'success',
             'bg-danger':  type === 'error',
             'bg-warning': type === 'warning',
         }"
         class="fixed top-6 right-6 z-60 flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-xl max-w-sm text-white"
         role="alert" aria-live="polite">

        <svg x-show="type === 'success'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
        <svg x-show="type === 'error'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <svg x-show="type === 'warning'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>

        <span class="text-sm font-medium flex-1" x-text="message"></span>

        <button @click="show = false; clearTimeout(timer)"
                class="ml-2 cursor-pointer opacity-70 hover:opacity-100 transition-opacity shrink-0"
                aria-label="Dismiss">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- ─── Global page-enter animations ──────────────────── --}}
    <script>
        (function () {
            var _fallback = null;
            var _ready    = false; // true after first animation completes

            function scheduleFallback() {
                clearTimeout(_fallback);
                _fallback = setTimeout(function () {
                    document.documentElement.classList.remove('admin-js-anim');
                }, 4000);
            }

            function runAnimation() {
                if (typeof gsap === 'undefined') return;
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    document.documentElement.classList.remove('admin-js-anim');
                    return;
                }

                var header    = document.querySelector('.admin-page-header');
                var statCards = gsap.utils.toArray('.stat-card');
                var tableCard = document.querySelector('.admin-table-card');

                if (!header && !statCards.length && !tableCard) {
                    document.documentElement.classList.remove('admin-js-anim');
                    return;
                }

                clearTimeout(_fallback);

                var tl = gsap.timeline({
                    defaults: { ease: 'power2.out' },
                    onComplete: function () {
                        // Remove the CSS class FIRST (synchronous), then clear GSAP
                        // inline styles — both happen before the browser paints, so
                        // there is no frame where CSS opacity:0 re-applies to elements
                        // that have just had their inline opacity:1 stripped.
                        document.documentElement.classList.remove('admin-js-anim');
                        if (header)           gsap.set(header,    { clearProps: 'all' });
                        if (statCards.length) gsap.set(statCards, { clearProps: 'all' });
                        if (tableCard)        gsap.set(tableCard,  { clearProps: 'all' });
                        _ready = true;
                    }
                });

                if (header)
                    tl.fromTo(header,    { opacity: 0, y: -16 }, { opacity: 1, y: 0, duration: 0.4  });
                if (statCards.length)
                    tl.fromTo(statCards, { opacity: 0, y: 20  }, { opacity: 1, y: 0, duration: 0.35, stagger: 0.07 }, '-=0.2');
                if (tableCard)
                    tl.fromTo(tableCard, { opacity: 0, y: 20  }, { opacity: 1, y: 0, duration: 0.35 }, '-=0.15');
            }

            // ── Initial page load ────────────────────────────────────────────
            // Elements are pre-hidden via CSS (.admin-js-anim in <head>).
            // When this script runs after a navigate:true redirect, window.load
            // has already fired and won't fire again — detect that and run immediately.
            if (document.readyState === 'complete') {
                scheduleFallback();
                requestAnimationFrame(runAnimation);
            } else {
                window.addEventListener('load', function () {
                    scheduleFallback();
                    requestAnimationFrame(runAnimation);
                });
            }

            // ── SPA navigation (wire:navigate) ───────────────────────────────
            // livewire:navigated also fires on initial load; _ready guards against that.
            document.addEventListener('livewire:navigated', function () {
                if (!_ready) return; // ignore the initial-load firing

                if (typeof gsap === 'undefined') return;

                // Hide elements synchronously before browser paints (no CSS class needed)
                var header    = document.querySelector('.admin-page-header');
                var statCards = document.querySelectorAll('.stat-card');
                var tableCard = document.querySelector('.admin-table-card');

                if (header)         gsap.set(header,    { opacity: 0, y: -16 });
                if (statCards.length) gsap.set(statCards, { opacity: 0, y: 20 });
                if (tableCard)      gsap.set(tableCard,  { opacity: 0, y: 20 });

                requestAnimationFrame(runAnimation);
            });
        })();
    </script>

    @stack('scripts')

</body>
</html>
