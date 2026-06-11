{{-- ═══════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════ --}}
<footer style="background-color: #082840;">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">

      {{-- Brand column --}}
      <div class="flex flex-col gap-5">
        <div class="flex">
          <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
          <span class="text-white" style="font-family: var(--font-logo); font-size: 0.94rem; margin-top: 0.8rem">TARLAC
            ELECTRIC</span>
        </div>
        {{-- <div class="mb-4 flex">
          <img src="{{ asset('assets/TEI-logo-secondary.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
        </div> --}}
        <p class="text-sm leading-relaxed mb-5" style="color: rgba(255,255,255,0.5);">
          Providing reliable power distribution of Tarlac City since 1949. Committed to excellence, safety,
          and community.
        </p>
        <div class="flex items-center gap-3">
          @foreach ([['Facebook', 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z'], 
          // ['Twitter', 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z'], 
          ['YouTube', 'M22.54 6.42a2.78 2.78 0 00-1.94-1.96C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 1.96A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19.1C5.12 19.56 12 19.56 12 19.56s6.88 0 8.6-.46a2.78 2.78 0 001.94-1.95 29 29 0 00.46-5.25 29 29 0 00-.46-5.33z M9.75 15.02l5.75-3.27-5.75-3.27v6.54z']] as [$name, $dpath])
            <a href="#" aria-label="{{ $name }}"
              class="w-9 h-9 rounded-xl flex items-center justify-center transition-all duration-200"
              style="background-color: rgba(255,255,255,0.07);"
              onmouseover="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform='translateY(-2px)'"
              onmouseout="this.style.backgroundColor='rgba(255,255,255,0.07)'; this.style.transform=''">
              <svg class="w-4 h-4" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $dpath }}" />
              </svg>
            </a>
          @endforeach
        </div>
        <div class="">
          <a href="#">
            <img src="{{ asset('assets/coreseal2026.png') }}" alt="Tarlac Electric Inc." class="h-25 w-auto">
          </a>
        </div>
      </div>

      {{-- Services column --}}
      <div>
        <h4 class="text-xs font-bold uppercase tracking-widest mb-5" style="color: rgba(255,255,255,0.35);">Customer
          Service</h4>
        <ul class="space-y-3">
          @foreach (['Power Advisory', 'How To Read Your Bill', 'Service Application', 'Bill Deposit', 'Senior Citizen', 'Net Metering', 'Distributed Energy Resources', 'Calculator'] as $item)
            <li><a href="#" class="text-sm transition-colors duration-150" style="color: rgba(255,255,255,0.55);"
                onmouseover="this.style.color='var(--color-tei-orange)'"
                onmouseout="this.style.color='rgba(255,255,255,0.55)'">{{ $item }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Company column --}}
      <div>
        <h4 class="text-xs font-bold uppercase tracking-widest mb-5" style="color: rgba(255,255,255,0.35);">Company</h4>
        <ul class="space-y-3">
          @foreach (['Rates and Advisories', 'Competitive Selection Process', 'Careers', 'Business Centers', 'FAQs', 'About Us', 'Privacy Policy'] as $item)
            <li><a href="#" class="text-sm transition-colors duration-150" style="color: rgba(255,255,255,0.55);"
                onmouseover="this.style.color='var(--color-tei-orange)'"
                onmouseout="this.style.color='rgba(255,255,255,0.55)'">{{ $item }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Contact column --}}
      <div>
        <h4 class="text-xs font-bold uppercase tracking-widest mb-5" style="color: rgba(255,255,255,0.35);">Contact Us
        </h4>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              style="color: var(--color-tei-orange);">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm" style="color: rgba(255,255,255,0.55);">Mabini St., Tarlac City, Tarlac
              2300</span>
          </li>
          <li class="flex items-center gap-3">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              style="color: var(--color-tei-orange);">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <a href="tel:+63456061834" class="text-sm transition-colors duration-150"
              style="color: rgba(255,255,255,0.55);" onmouseover="this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.color='rgba(255,255,255,0.55)'">(045) 606-1834</a>

          </li>
          <li class="flex items-center gap-3">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              style="color: var(--color-tei-orange);">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
            </svg>
            <a href="tel:+639171881834" class="text-sm transition-colors duration-150"
              style="color: rgba(255,255,255,0.55);" onmouseover="this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.color='rgba(255,255,255,0.55)'">(0917) 188-1834</a>

          </li>
          <li class="flex items-center gap-3">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              style="color: var(--color-tei-orange);">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
            </svg>
            <a href="tel:+639981881834" class="text-sm transition-colors duration-150"
              style="color: rgba(255,255,255,0.55);" onmouseover="this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.color='rgba(255,255,255,0.55)'">(0998) 188-1834</a>

          </li>

          <li class="flex items-center gap-3">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              style="color: var(--color-tei-orange);">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <a href="mailto:cwd@teiph.com" class="text-sm transition-colors duration-150"
              style="color: rgba(255,255,255,0.55);" onmouseover="this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.color='rgba(255,255,255,0.55)'">cwd@teiph.com</a>
          </li>
          <li>
            <div class="mt-1 p-3 rounded-xl" style="background-color: rgba(231,103,39,0.12);">
              <p class="text-xs font-bold mb-0.5" style="color: var(--color-tei-orange);">Emergency Hotline</p>
              <p class="text-base font-black" style="color: white;">(045) 606-1834</p>
              <p class="text-xs" style="color: rgba(255,255,255,0.45);">24 hours · 7 days a week</p>
            </div>
          </li>
        </ul>
      </div>

      {{-- Data Privacy --}}
      {{-- <div class="flex items-center">
        <div class="mb-4 flex">
          <img src="{{ asset('assets/coreseal2026.png') }}" alt="Tarlac Electric Inc." class="h-25 w-auto">
        </div>
      </div> --}}
    </div>

    <div class="border-t pt-6 flex flex-col sm:flex-row items-center justify-between gap-3"
      style="border-color: rgba(255,255,255,0.07);">
      <p class="text-xs" style="color: rgba(255,255,255,0.3);">
        &copy; {{ date('Y') }} Tarlac Electric Inc. All rights reserved.
      </p>
      {{-- <div class="flex items-center gap-5">
        @foreach (['Privacy Policy', 'Terms of Use', 'Sitemap'] as $link)
          <a href="#" class="text-xs transition-colors duration-150" style="color: rgba(255,255,255,0.3);"
            onmouseover="this.style.color='var(--color-tei-orange)'"
            onmouseout="this.style.color='rgba(255,255,255,0.3)'">{{ $link }}</a>
        @endforeach
      </div> --}}
    </div>
  </div>
</footer>
