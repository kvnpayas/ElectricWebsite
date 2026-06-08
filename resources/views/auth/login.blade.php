@extends('layouts.minimal')

@section('title', 'Sign In — TEI Admin Portal')
@section('description', 'Secure administrator login for Tarlac Electric Inc. internal portal.')

@section('content')
<div class="flex min-h-screen">

    {{-- ════════════════════════════════════════
         LEFT — Brand panel (desktop only)
    ════════════════════════════════════════ --}}
    <div id="login-brand"
         class="hidden lg:flex lg:w-[46%] relative flex-col justify-between p-14 overflow-hidden shrink-0"
         style="background: linear-gradient(160deg, #082840 0%, #0F3D5C 60%, #1A5A85 100%);">

        {{-- Decorative orbs --}}
        <div class="absolute top-16 right-[-60px] w-80 h-80 rounded-full blur-3xl pointer-events-none"
             style="background: radial-gradient(circle, rgba(231,103,39,0.3) 0%, rgba(231,103,39,0.04) 70%); animation: float 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-32 left-[-40px] w-56 h-56 rounded-full blur-2xl pointer-events-none"
             style="background: radial-gradient(circle, rgba(231,103,39,0.18) 0%, transparent 70%); animation: float 12s ease-in-out infinite reverse;"></div>
        <div class="absolute top-1/2 right-[20%] w-28 h-28 rounded-full blur-xl pointer-events-none"
             style="background: radial-gradient(circle, rgba(65,182,230,0.2) 0%, transparent 70%); animation: float 10s ease-in-out infinite 3s;"></div>

        {{-- Dot grid --}}
        <div class="absolute inset-0 pointer-events-none opacity-[0.04]"
             style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 30px 30px;"></div>

        {{-- Top shimmer line --}}
        <div class="absolute top-0 left-0 right-0 h-px"
             style="background: linear-gradient(90deg, transparent, rgba(231,103,39,0.7), transparent);"></div>

        {{-- Logo --}}
        <div class="relative z-10" id="brand-logo">
            <a href="/" class="inline-flex flex-col leading-none">
                <span class="text-5xl font-black"
                      style="font-family: var(--font-display); color: var(--color-tei-orange);">tei</span>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase mt-0.5"
                      style="color: rgba(255,255,255,0.4);">Tarlac Electric Inc.</span>
            </a>
        </div>

        {{-- Main brand content --}}
        <div class="relative z-10" id="brand-body">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border mb-8"
                 style="background: rgba(231,103,39,0.1); border-color: rgba(231,103,39,0.25);">
                <span class="w-1.5 h-1.5 rounded-full"
                      style="background-color: var(--color-tei-orange); animation: pulse-glow 2.5s ease-in-out infinite;"></span>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase"
                      style="color: var(--color-tei-orange);">Secure Admin Portal</span>
            </div>

            <h2 class="text-4xl xl:text-5xl font-black leading-[1.06] mb-5 text-white"
                style="font-family: var(--font-display);">
                Manage<br>
                <span style="color: var(--color-tei-orange);">Tarlac's</span><br>
                Power Grid.
            </h2>
            <p class="text-base leading-relaxed mb-12"
               style="color: rgba(255,255,255,0.55); max-width: 340px;">
                Oversee services, customer accounts, outage reports, and power advisories across the province — all in one place.
            </p>

            {{-- Stats row --}}
            <div class="flex gap-8">
                @foreach ([['100K+','Customers'],['15+','Municipalities'],['24/7','Support']] as [$val,$lbl])
                <div>
                    <div class="text-2xl font-black mb-0.5"
                         style="font-family: var(--font-display); color: var(--color-tei-orange);">{{ $val }}</div>
                    <div class="text-xs font-medium" style="color: rgba(255,255,255,0.4);">{{ $lbl }}</div>
                </div>
                @endforeach
            </div>

            {{-- Divider --}}
            <div class="mt-10 w-16 h-px" style="background: rgba(255,255,255,0.1);"></div>

            {{-- Security badge --}}
            <div class="mt-8 flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                     style="background: rgba(255,255,255,0.06);">
                    <svg class="w-4.5 w-[18px] h-[18px]" fill="none" stroke="rgba(255,255,255,0.5)" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <div class="text-xs font-semibold" style="color: rgba(255,255,255,0.7);">256-bit SSL Encrypted</div>
                    <div class="text-[11px]" style="color: rgba(255,255,255,0.35);">Your session is protected</div>
                </div>
            </div>
        </div>

        {{-- Back to website --}}
        <div class="relative z-10" id="brand-footer">
            <a href="/"
               class="inline-flex items-center gap-2 text-sm font-medium transition-all duration-200"
               style="color: rgba(255,255,255,0.35);"
               onmouseover="this.style.color='rgba(255,255,255,0.75)'; this.style.gap='10px'"
               onmouseout="this.style.color='rgba(255,255,255,0.35)'; this.style.gap='8px'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to website
            </a>
        </div>
    </div>


    {{-- ════════════════════════════════════════
         RIGHT — Form panel
    ════════════════════════════════════════ --}}
    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12 sm:px-12 min-h-screen"
         style="background-color: #F7F8FA;">

        {{-- Mobile logo (hidden on desktop) --}}
        <div class="lg:hidden mb-10 text-center" id="mobile-logo">
            <a href="/" class="inline-flex flex-col items-center leading-none">
                <span class="text-5xl font-black"
                      style="font-family: var(--font-display); color: var(--color-tei-orange);">tei</span>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase mt-1"
                      style="color: #9CA3AF;">Tarlac Electric Inc.</span>
            </a>
        </div>

        <div class="w-full max-w-[420px]">

            {{-- Form card --}}
            <div id="login-card"
                 class="rounded-2xl p-8 sm:p-10"
                 style="background-color: white; box-shadow: 0 4px 32px rgba(15,61,92,0.09), 0 1px 4px rgba(15,61,92,0.05);">

                {{-- Heading --}}
                <div id="login-heading" class="mb-8">
                    <div class="inline-flex items-center gap-2 mb-5">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                             style="background-color: rgba(231,103,39,0.1);">
                            <svg class="w-4 h-4" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-[0.12em] uppercase"
                              style="color: var(--color-tei-orange);">Administrator Access</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black mb-2"
                        style="font-family: var(--font-display); color: var(--color-tei-blue);">Welcome back</h1>
                    <p class="text-sm leading-relaxed" style="color: #6B7280;">
                        Sign in to manage TEI's services and operations.
                    </p>
                </div>

                {{-- Livewire Login Form --}}
                @livewire('auth.login')

            </div>

            {{-- Footer note --}}
            <p id="login-footnote" class="text-center text-xs mt-6" style="color: #9CA3AF;">
                Authorized personnel only &mdash;
                <a href="mailto:ict@tarlacelectric.com"
                   class="font-semibold transition-colors duration-150"
                   style="color: var(--color-tei-orange);"
                   onmouseover="this.style.color='var(--color-tei-blue)'"
                   onmouseout="this.style.color='var(--color-tei-orange)'">
                    Contact IT Support
                </a>
            </p>

            {{-- Mobile back link --}}
            <div class="lg:hidden text-center mt-4">
                <a href="/"
                   class="inline-flex items-center gap-1.5 text-xs font-medium transition-colors duration-150"
                   style="color: #9CA3AF;"
                   onmouseover="this.style.color='var(--color-tei-blue)'"
                   onmouseout="this.style.color='#9CA3AF'">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
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
(function () {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    // Brand panel — slide in from left (desktop only)
    if (window.innerWidth >= 1024) {
        tl.from('#login-brand', { x: -72, opacity: 0, duration: 0.85 })
          .from('#brand-logo',  { y: -16, opacity: 0, duration: 0.45 }, '-=0.4')
          .from('#brand-body',  { y: 24,  opacity: 0, duration: 0.55 }, '-=0.3')
          .from('#brand-footer',{ y: 12,  opacity: 0, duration: 0.4  }, '-=0.25');
    }

    // Form card — rises up
    tl.from('#login-card', { y: 40, opacity: 0, duration: 0.7, ease: 'power2.out' }, window.innerWidth >= 1024 ? '-=0.55' : '0')
      .from('#login-heading', { y: 20, opacity: 0, duration: 0.45 }, '-=0.4')

    // Fields stagger
    gsap.utils.toArray('.login-field').forEach((el, i) => {
        tl.from(el, { y: 18, opacity: 0, duration: 0.38 }, `-=${i === 0 ? 0.25 : 0.3}`);
    });

    tl.from('#login-extras', { y: 14, opacity: 0, duration: 0.35 }, '-=0.25')
      .from('#login-btn',    { y: 14, opacity: 0, duration: 0.35 }, '-=0.22')
      .from('#login-footnote', { opacity: 0, duration: 0.4 }, '-=0.1');

    if (window.innerWidth < 1024) {
        tl.from('#mobile-logo', { y: -20, opacity: 0, duration: 0.45 }, 0);
    }
})();
</script>
@endpush
