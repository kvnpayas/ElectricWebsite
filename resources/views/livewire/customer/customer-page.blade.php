<div>

{{-- ═══════════════════════════════════════════════
     COMPACT PAGE HEADER
═══════════════════════════════════════════════ --}}
<section class="relative pt-28 pb-16 overflow-hidden"
         style="background: linear-gradient(135deg, #082840 0%, #0F3D5C 100%);">

  {{-- Subtle dot grid --}}
  <div class="absolute inset-0 pointer-events-none opacity-[0.03]"
       style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 32px 32px;"></div>

  {{-- Top shimmer --}}
  <div class="absolute top-0 left-0 right-0 h-px"
       style="background: linear-gradient(90deg, transparent 0%, rgba(231,103,39,0.7) 50%, transparent 100%);"></div>

  {{-- Small decorative orb --}}
  <div class="absolute top-8 right-[10%] w-64 h-64 rounded-full blur-3xl pointer-events-none"
       style="background: radial-gradient(circle, rgba(231,103,39,0.2) 0%, transparent 70%);"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-xs mb-5 select-none" style="color: rgba(255,255,255,0.4);">
      <a href="/" wire:navigate
         class="transition-colors duration-150"
         style="color: rgba(255,255,255,0.4);"
         onmouseover="this.style.color='rgba(255,255,255,0.75)'"
         onmouseout="this.style.color='rgba(255,255,255,0.4)'">Home</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
      </svg>
      <span style="color: rgba(255,255,255,0.75);">Customer</span>
    </nav>

    {{-- Badge + title --}}
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-5"
         style="background: rgba(231,103,39,0.12); border-color: rgba(231,103,39,0.3);">
      <span class="w-1.5 h-1.5 rounded-full"
            style="background: var(--color-tei-orange); animation: pulse-glow 2.5s ease-in-out infinite;"></span>
      <span class="text-xs font-bold tracking-[0.15em] uppercase" style="color: var(--color-tei-orange);">
        Customer Services
      </span>
    </div>

    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-3"
        style="font-family: var(--font-display);">
      Customer Services
    </h1>
    <p class="text-sm sm:text-base max-w-2xl" style="color: rgba(255,255,255,0.58);">
      Everything you need as a TEI customer — service applications, billing guides, special programs, and energy initiatives all in one place.
    </p>
  </div>

  {{-- Wave separator --}}
  <div class="absolute bottom-0 left-0 right-0 h-8">
    <svg class="w-full h-8" preserveAspectRatio="none" viewBox="0 0 1440 32" fill="none">
      <path d="M0 32 C480 0 960 0 1440 32 L1440 32 L0 32Z" fill="var(--color-tei-white)"/>
    </svg>
  </div>
</section>


{{-- ═══════════════════════════════════════════════
     ALL SERVICES
═══════════════════════════════════════════════ --}}
<section class="py-20" style="background-color: var(--color-tei-white);">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-14 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4"
            style="background: rgba(231,103,39,0.1); color: var(--color-tei-orange);">What We Offer</span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3"
          style="font-family: var(--font-display); color: var(--color-tei-blue);">
        All Customer Services
      </h2>
      <p class="text-base max-w-2xl mx-auto" style="color: var(--color-tei-gray);">
        From new connections to bill management and special programs — managing your electricity made simple.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Power Advisory Schedule --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Power Advisory Schedule</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          As TEI constantly works to improve its services, there may be occasional power interruptions in your area.
          Visit this page regularly or follow our official Facebook page <strong>@tei.ph</strong> to get updates on all electric service interruptions.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          View Schedule
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 2. How to Read Your Bill --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">
          <a href="{{ route('customer.bill-guide') }}" wire:navigate class="hover:underline">How to Read Your Bill</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          TEI sends a monthly Statement of Account (SOA) to your service address showing the statement period, total amount due, and payment deadline.
          Pay on or before the due date at any TEI business center to avail of the <strong style="color: var(--color-tei-blue);">Prompt Payment Discount</strong>.
        </p>
        <a href="{{ route('customer.bill-guide') }}" wire:navigate class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          View Guide
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 3. Service Application (with 3 sub-items) --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Service Application</h3>
        <p class="text-sm leading-relaxed mb-4" style="color: var(--color-tei-gray);">
          Applying for TEI service is easy! Just follow the necessary steps and you're on your way to having your home or office powered by TEI.
        </p>
        {{-- Sub-items --}}
        <div class="space-y-1.5 pt-4 border-t" style="border-color: rgba(15,61,92,0.07);">
          @foreach ([
            ['Application Procedure',               'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4'],
            ['Application Requirement',             'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
            ['Other Service Related Applications',  'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
          ] as [$lbl, $ico])
          <a href="#"
             class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-sm font-medium transition-colors duration-150"
             style="color: var(--color-tei-blue);"
             onmouseover="this.style.backgroundColor='rgba(231,103,39,0.06)'; this.style.color='var(--color-tei-orange)'"
             onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--color-tei-blue)'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}"/>
            </svg>
            {{ $lbl }}
          </a>
          @endforeach
        </div>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 4. Bill Deposit --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Bill Deposit</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          All TEI customers — new applicants and reconnection requests — are required to pay a bill deposit approximately equivalent to one month's electric bill.
          This guarantees payment capability. Failure to pay the required deposit will result in disconnection of electric service.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          Learn More
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 5. Bill Deposit Primer --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Bill Deposit Primer</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          Every year on the anniversary month of your service contract, TEI reviews your bill deposit to ensure it covers monthly usage.
          If your average monthly bill is higher than your deposit by <strong style="color: var(--color-tei-blue);">10% or more</strong>, your deposit will be adjusted.
          You may pay the adjustment in one-time or staggered basis.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          Read Primer
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 6. Senior Citizen Primer --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Senior Citizen Primer</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          Following the <strong style="color: var(--color-tei-blue);">Expanded Senior Citizen Act of 2010</strong>,
          Tarlac Electric Inc. offers significant savings to elderly Filipinos aged 60 and above on their monthly electricity consumption.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          View Discount Details
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 7. Net Metering Primer --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Net Metering Primer</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          TEI is in full support of clean, renewable, and sustainable energy. Residential and business owners are encouraged
          to find alternative means of creating energy — whether solar, wind, biomass, or biogas — and give it back to the community.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          Learn About Net Metering
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

      {{-- 8. Distributed Energy Resources --}}
      <div class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300 sm:col-span-2 lg:col-span-1"
           style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
           onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
           onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5"
             style="background: rgba(231,103,39,0.1);">
          <svg class="w-6 h-6" fill="none" stroke="#E76727" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2" style="color: var(--color-tei-blue);">Distributed Energy Resources</h3>
        <p class="text-sm leading-relaxed mb-5" style="color: var(--color-tei-gray);">
          The Distributed Energy Resources (DER) program, initiated by the ERC, aims to encourage the development
          and utilization of distributed energy and promote energy efficiency and sustainability across all customer types.
        </p>
        <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200"
           style="color: var(--color-tei-orange);">
          Learn About DER
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
               stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>
        <div class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(90deg, var(--color-tei-orange), transparent);"></div>
      </div>

    </div>
  </div>
</section>


{{-- ═══════════════════════════════════════════════
     STATS SEPARATOR  (same as homepage)
═══════════════════════════════════════════════ --}}
<section class="py-16 relative overflow-hidden" style="background-color: var(--color-tei-blue);">
  <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full blur-3xl pointer-events-none opacity-15"
       style="background: var(--color-tei-orange);"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach ([
        ['8',   'Services Available', 'For all customer needs'],
        ['100K+','Customers Served',  'Across Tarlac Province'],
        ['24/7', 'Customer Support',   'Always ready to help'],
        ['1962', 'Established',        'Over 60 years of service'],
      ] as [$val, $lbl, $sub])
      <div class="text-center scroll-reveal">
        <div class="text-4xl font-black mb-1"
             style="font-family: var(--font-display); color: var(--color-tei-orange);">{{ $val }}</div>
        <div class="text-sm font-bold mb-0.5 text-white">{{ $lbl }}</div>
        <div class="text-xs" style="color: rgba(255,255,255,0.4);">{{ $sub }}</div>
        <div class="mt-2.5 mx-auto w-8 h-0.5 rounded-full opacity-35"
             style="background-color: var(--color-tei-orange);"></div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ═══════════════════════════════════════════════
     CONTACT CTA
═══════════════════════════════════════════════ --}}
<section class="py-16 relative overflow-hidden"
         style="background: linear-gradient(135deg, var(--color-tei-orange) 0%, #C45218 100%);">
  <div class="absolute inset-0 pointer-events-none opacity-[0.05]"
       style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 28px 28px;"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 scroll-reveal">
      <div>
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-2"
            style="font-family: var(--font-display);">Need help? We're here 24/7.</h2>
        <p class="text-base" style="color: rgba(255,255,255,0.75);">
          Contact our customer service team for immediate assistance.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-4 shrink-0">
        <a href="tel:+63456061834"
           class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base transition-all duration-200 cursor-pointer"
           style="background-color: white; color: var(--color-tei-orange);"
           onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 28px rgba(0,0,0,0.2)'"
           onmouseout="this.style.transform=''; this.style.boxShadow=''">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
          </svg>
          (045) 606-1834
        </a>
        <a href="mailto:cwd@teiph.com"
           class="inline-flex items-center gap-3 px-7 py-4 rounded-2xl font-bold text-base border-2 border-white transition-all duration-200 cursor-pointer"
           style="color: white;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.transform='translateY(-2px)'"
           onmouseout="this.style.backgroundColor='transparent'; this.style.transform=''">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
          Email Us
        </a>
      </div>
    </div>
  </div>
</section>

@script
<script>
  (function () {
    function initAnimations() {
      gsap.utils.toArray('.scroll-reveal').forEach(el => {
        gsap.from(el, {
          scrollTrigger: { trigger: el, start: 'top 88%', invalidateOnRefresh: true },
          opacity: 0, y: 36, duration: 0.7, ease: 'power2.out',
        });
      });

      gsap.utils.toArray('.stagger-cards').forEach(container => {
        const cards = container.querySelectorAll('.card');
        gsap.from(cards, {
          scrollTrigger: { trigger: container, start: 'top 88%', invalidateOnRefresh: true },
          opacity: 0, y: 48, duration: 0.65, stagger: 0.1, ease: 'power2.out',
          clearProps: 'transform,opacity',
          onComplete() {
            cards.forEach(el => {
              el.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease';
            });
          },
        });
      });
    }

    if (document.readyState === 'complete') {
      initAnimations();
    } else {
      window.addEventListener('load', initAnimations);
    }
  })();
</script>
@endscript

</div>
