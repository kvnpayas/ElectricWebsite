<div>

  {{-- ═══════════════════════════════════════════════
     COMPACT PAGE HEADER
  ═══════════════════════════════════════════════ --}}
  @livewire('guest.page-header', [
      'title' => 'Customer Services',
      'badgeTitle' => 'Customer Services',
      'subTitle' => 'Everything you need as a TEI customer — service applications, billing guides, special programs, and energy initiatives all in one place.',
  ])

  {{-- ═══════════════════════════════════════════════
     ALL SERVICES
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="text-center mb-14 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">What
        We Offer</span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3 text-tei-blue">
        All Customer Services
      </h2>
      <p class="text-base max-w-2xl mx-auto text-tei-gray">
        From new connections to bill management and special programs — managing your electricity made simple.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Power Advisory Schedule --}}
      {{-- <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Power Advisory Schedule</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          As TEI constantly works to improve its services, there may be occasional power interruptions in your area.
          Visit this page regularly or follow our official Facebook page <strong>@tei.ph</strong> to get updates on
          all electric service interruptions.
        </p>
        <a href="{{ route('customer.power-interruption-schedule') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Schedule
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card> --}}

      {{-- 2. How to Read Your Bill --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.how-to-read-your-bill') }}" wire:navigate class="hover:underline">How to Read
            Your Bill</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          TEI sends a monthly Statement of Account (SOA) to your service address showing the statement period, total
          amount due, and payment deadline.
          Pay on or before the due date at any TEI business center to avail of the <strong class="text-tei-blue">Prompt
            Payment Discount</strong>.
        </p>
        <a href="{{ route('customer.how-to-read-your-bill') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Guide
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>


      {{-- 3. Service Application (with 3 sub-items) --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Service Application</h3>
        <p class="text-sm leading-relaxed mb-4 text-tei-gray">
          Applying for TEI service is easy! Just follow the necessary steps and you're on your way to having your home
          or office powered by TEI.
        </p>
        {{-- Sub-items --}}
        <div class="space-y-1.5 pt-4 border-t" style="border-color: rgba(15,61,92,0.07);">
          @foreach ([['Application Procedure', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'customer.service-application.application-procedure'], ['Application Requirement', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'customer.service-application.application-requirements'], ['Other Service Related Applications', 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'customer.service-application.other-service-related-applications']] as [$lbl, $ico, $url])
            <a href="{{ $url && Route::has($url) ? route($url) : '#' }}" {{ $url ? 'wire:navigate' : '' }}
              class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-sm font-medium transition-colors duration-150"
              style="color: var(--color-tei-blue);"
              onmouseover="this.style.backgroundColor='rgba(231,103,39,0.06)'; this.style.color='var(--color-tei-orange)'"
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--color-tei-blue)'">
              <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $ico }}" />
              </svg>
              {{ $lbl }}
            </a>
          @endforeach
        </div>
      </x-custom-card>

      {{-- 4. Bill Deposit --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.bill-deposit') }}" wire:navigate class="hover:underline">Bill Deposit</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          All TEI customers — new applicants and reconnection requests — are required to pay a bill deposit
          approximately equivalent to one month's electric bill.
          This guarantees payment capability. Failure to pay the required deposit will result in disconnection of
          electric service.
        </p>
        <a href="{{ route('customer.bill-deposit') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Learn More
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 5. Bill Deposit Primer --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">Bill Deposit Primer</h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Every year on the anniversary month of your service contract, TEI reviews your bill deposit to ensure it
          covers monthly usage.
          If your average monthly bill is higher than your deposit by <strong class="text-tei-blue">10%
            or more</strong>, your deposit will be adjusted.
          You may pay the adjustment in one-time or staggered basis.
        </p>
        <a href="{{ route('customer.bill-deposit-primer') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Read Primer
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 6. Senior Citizen Primer --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.senior-citizen-discount') }}" wire:navigate class="hover:underline">Senior
            Citizen Discount</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Following the <strong class="text-tei-blue">Expanded Senior Citizen Act of 2010</strong>,
          Tarlac Electric Inc. offers significant savings to elderly Filipinos aged 60 and above on their monthly
          electricity consumption.
        </p>
        <a href="{{ route('customer.senior-citizen-discount') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Discount Details
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 7. Net Metering Primer --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.net-metering-primer') }}" wire:navigate class="hover:underline">Net Metering
            Primer</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          TEI is in full support of clean, renewable, and sustainable energy. Residential and business owners are
          encouraged to find alternative means of creating energy — whether solar, wind, biomass, or biogas — and give
          it back to
          the community.
        </p>
        <a href="{{ route('customer.net-metering-primer') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Learn About Net Metering
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 8. Distributed Energy Resources --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange-dark/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.distributed-energy-resources') }}" wire:navigate
            class="hover:underline">Distributed Energy Resources</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          The Distributed Energy Resources (DER) program, initiated by the ERC, aims to encourage the development
          and utilization of distributed energy and promote energy efficiency and sustainability across all customer
          types.
        </p>
        <a href="{{ route('customer.distributed-energy-resources') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Learn About DER
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

    </div>
  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     STATS SEPARATOR  (same as homepage)
  ═══════════════════════════════════════════════ --}}
  {{-- <section class="py-16 relative overflow-hidden" style="background-color: var(--color-tei-blue);">
    <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full blur-3xl pointer-events-none opacity-15"
      style="background: var(--color-tei-orange);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ([['8', 'Services Available', 'For all customer needs'], ['100K+', 'Customers Served', 'Across Tarlac Province'], ['24/7', 'Customer Support', 'Always ready to help'], ['1962', 'Established', 'Over 60 years of service']] as [$val, $lbl, $sub])
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
  </section> --}}
</div>
