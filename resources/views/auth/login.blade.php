@extends('layouts.minimal')

@section('title', 'Sign In — TEI Admin Portal')
@section('description', 'Secure administrator login for Tarlac Electric Inc. internal portal.')

@section('content')
  <div class="flex min-h-screen">

    {{-- ════════════════════════════════════════
         LEFT — Brand panel (desktop only)
    ════════════════════════════════════════ --}}
    <div id="login-brand"
      class="hidden lg:flex lg:w-[46%] relative flex-col justify-between p-14 overflow-hidden shrink-0 [background:linear-gradient(160deg,#082840_0%,#0F3D5C_60%,#1A5A85_100%)]">

      {{-- Decorative orbs --}}
      <div class="absolute top-16 right-[-60px] w-80 h-80 rounded-full blur-3xl pointer-events-none animate-float"
        style="background: radial-gradient(circle, rgba(231,103,39,0.3) 0%, rgba(231,103,39,0.04) 70%);">
      </div>
      <div class="absolute bottom-32 left-[-40px] w-56 h-56 rounded-full blur-2xl pointer-events-none animate-float-slow"
        style="background: radial-gradient(circle, rgba(231,103,39,0.18) 0%, transparent 70%);">
      </div>
      <div class="absolute top-1/2 right-[20%] w-28 h-28 rounded-full blur-xl pointer-events-none animate-float-delay"
        style="background: radial-gradient(circle, rgba(65,182,230,0.2) 0%, transparent 70%);">
      </div>

      {{-- Dot grid --}}
      <div class="absolute inset-0 pointer-events-none opacity-[0.04]
        [background-image:radial-gradient(rgba(255,255,255,0.9)_1px,transparent_1px)] [background-size:30px_30px]">
      </div>

      {{-- Top shimmer line --}}
      <div class="absolute top-0 left-0 right-0 h-px
        [background:linear-gradient(90deg,transparent,rgba(231,103,39,0.7),transparent)]"></div>

      {{-- Logo --}}
      <div class="relative z-10" id="brand-logo">
        <a href="/" wire:navigate class="shrink-0 flex items-center">
          <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
          <span class="text-white font-logo text-[0.94rem] mt-[0.8rem]">TARLAC ELECTRIC</span>
        </a>
      </div>

      {{-- Main brand content --}}
      <div class="relative z-10" id="brand-body">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border mb-8 bg-tei-orange/10 border-tei-orange/25">
          <span class="w-1.5 h-1.5 rounded-full bg-tei-orange animate-pulse-glow"></span>
          <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-tei-orange">Secure Admin Portal</span>
        </div>

        <h2 class="text-4xl xl:text-5xl font-black leading-[1.06] mb-5 text-white font-display">
          Powering<br>
          <span class="text-tei-orange">Tarlac City</span><br>
          Since 1949.
        </h2>
        {{-- <p class="text-base leading-relaxed mb-12 text-white/55 max-w-[340px]">
          Tarlac Electric Inc. is the city's trusted private power distribution utility — serving over 80,000
          customers across a 275 sq. km. franchise area for more than 75 years.
        </p> --}}

        {{-- Stats row --}}
        {{-- <div class="flex gap-8">
          @foreach ([['75+', 'Years in Service'], ['80K+', 'Customers'], ['24/7', 'Emergency Response']] as [$val, $lbl])
            <div>
              <div class="text-2xl font-black mb-0.5 font-display text-tei-orange">{{ $val }}</div>
              <div class="text-xs font-medium text-white/40">{{ $lbl }}</div>
            </div>
          @endforeach
        </div> --}}

        {{-- Divider --}}
        <div class="mt-10 w-16 h-px bg-white/10"></div>

        {{-- Security badge --}}
        <div class="mt-8 flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white/6">
            <svg class="w-[18px] h-[18px] text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <div>
            <div class="text-xs font-semibold text-white/70">256-bit SSL Encrypted</div>
            <div class="text-[11px] text-white/35">Your session is protected</div>
          </div>
        </div>
      </div>

      {{-- Back to website --}}
      <div class="relative z-10" id="brand-footer">
        <a href="/"
          class="inline-flex items-center gap-2 text-sm font-medium text-white/35 hover:text-white/75 transition-colors duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Back to website
        </a>
      </div>
    </div>


    {{-- ════════════════════════════════════════
         RIGHT — Form panel
    ════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12 sm:px-12 min-h-screen bg-[#F7F8FA]">

      {{-- Mobile logo (hidden on desktop) --}}
      <div class="lg:hidden mb-10 text-center" id="mobile-logo">
        <a href="/" wire:navigate class="shrink-0 flex items-center">
          <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
          <span class="text-tei-blue font-logo text-[0.94rem] mt-[0.8rem]">TARLAC ELECTRIC</span>
        </a>
      </div>

      <div class="w-full max-w-[420px]">

        {{-- Form card --}}
        <div id="login-card"
          class="rounded-2xl p-8 sm:p-10 bg-white shadow-[0_4px_32px_rgba(15,61,92,0.09),0_1px_4px_rgba(15,61,92,0.05)]">

          {{-- Heading --}}
          <div id="login-heading" class="mb-8">
            <div class="inline-flex items-center gap-2 mb-5">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-tei-orange/10">
                <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
              <span class="text-xs font-bold tracking-[0.12em] uppercase text-tei-orange">Administrator Access</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black mb-2 font-display text-tei-blue">Welcome back</h1>
            <p class="text-sm leading-relaxed text-gray-500">
              Sign in to manage TEI's services and operations.
            </p>
          </div>

          {{-- Livewire Login Form --}}
          @livewire('auth.login')

        </div>

        {{-- Footer note --}}
        <p id="login-footnote" class="text-center text-xs mt-6 text-gray-400">
          Authorized personnel only &mdash;
          <span
            class="font-semibold text-tei-orange hover:text-tei-blue transition-colors duration-150">
            Contact IT Support
        </span>
        </p>

        {{-- Mobile back link --}}
        <div class="lg:hidden text-center mt-4">
          <a href="/" wire:navigate
            class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-400 hover:text-tei-blue transition-colors duration-150">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to website
          </a>
        </div>

      </div>
    </div>

  </div>
@endsection

@push('scripts')
  <script>
    (function() {
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

      const tl = gsap.timeline({
        defaults: {
          ease: 'power3.out'
        }
      });

      // Brand panel — slide in from left (desktop only)
      if (window.innerWidth >= 1024) {
        tl.from('#login-brand', {
            x: -72,
            opacity: 0,
            duration: 0.85
          })
          .from('#brand-logo', {
            y: -16,
            opacity: 0,
            duration: 0.45
          }, '-=0.4')
          .from('#brand-body', {
            y: 24,
            opacity: 0,
            duration: 0.55
          }, '-=0.3')
          .from('#brand-footer', {
            y: 12,
            opacity: 0,
            duration: 0.4
          }, '-=0.25');
      }

      // Form card — rises up
      tl.from('#login-card', {
          y: 40,
          opacity: 0,
          duration: 0.7,
          ease: 'power2.out'
        }, window.innerWidth >= 1024 ? '-=0.55' : '0')
        .from('#login-heading', {
          y: 20,
          opacity: 0,
          duration: 0.45
        }, '-=0.4')

      // Fields stagger
      gsap.utils.toArray('.login-field').forEach((el, i) => {
        tl.from(el, {
          y: 18,
          opacity: 0,
          duration: 0.38
        }, `-=${i === 0 ? 0.25 : 0.3}`);
      });

      tl.from('#login-extras', {
          y: 14,
          opacity: 0,
          duration: 0.35
        }, '-=0.25')
        .from('#login-btn', {
          y: 14,
          opacity: 0,
          duration: 0.35
        }, '-=0.22')
        .from('#login-footnote', {
          opacity: 0,
          duration: 0.4
        }, '-=0.1');

      if (window.innerWidth < 1024) {
        tl.from('#mobile-logo', {
          y: -20,
          opacity: 0,
          duration: 0.45
        }, 0);
      }
    })();
  </script>
@endpush
