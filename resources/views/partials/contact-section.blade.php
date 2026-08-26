@php
    $primaryPhone = $phones->firstWhere('is_primary', true) ?? $phones->first();
    $primaryEmail = $emails->firstWhere('label', 'Primary');
@endphp

<section class="py-16 relative overflow-hidden"
  style="background: linear-gradient(135deg, var(--color-tei-orange) 0%, var(--color-tei-orange-dark) 100%);">
  <div class="absolute inset-0 pointer-events-none opacity-[0.05]"
    style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 28px 28px;">
  </div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 scroll-reveal">
      <div>
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-2" style="font-family: var(--font-display);">Need
          help? We're here 24/7.</h2>
        <p class="text-base" style="color: rgba(255,255,255,0.78);">
          Contact our customer service team for immediate assistance.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-4 shrink-0">

        @if ($primaryPhone)
        <a href="{{ $primaryPhone->tel }}"
          class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base transition-all duration-200 cursor-pointer"
          style="background-color: white; color: var(--color-tei-orange);"
          onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.18)'"
          onmouseout="this.style.transform=''; this.style.boxShadow=''">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
          {{ $primaryPhone->number }}
        </a>
        @endif

        @if ($primaryEmail)
        <a href="mailto:{{ $primaryEmail->address }}"
          class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base border-2 border-white transition-all duration-200 cursor-pointer"
          style="color: white;"
          onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.transform='translateY(-2px)'"
          onmouseout="this.style.backgroundColor='transparent'; this.style.transform=''">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          Email Us
        </a>
        @endif

      </div>
    </div>
  </div>
</section>
