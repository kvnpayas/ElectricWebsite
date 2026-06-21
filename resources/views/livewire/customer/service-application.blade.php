<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Service Application',
      'badgeTitle' => 'Customer Services',
      'subTitle'   => 'Applying for Tarlac Electric Inc. service is easy. Choose a topic below to get started with your application.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — APPLICATION TYPES
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">How to Apply for TEI Service</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            Applying for TEI electric service involves a few steps — from preparing your documents to coordinating with the City Engineer's Office (CEO) and scheduling a site visit. Select a section below to learn more about each stage of the process.
          </p>
        </div>
      </div>
    </div>

    {{-- Section heading --}}
    <div class="text-center mb-10 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
        Application Guide
      </span>
      <h2 class="text-3xl sm:text-4xl font-black mb-3 text-tei-blue">Choose a Topic</h2>
      <p class="text-base max-w-xl mx-auto text-tei-gray">
        Everything you need to know about applying for or modifying your TEI electric service connection.
      </p>
    </div>

    {{-- 3 cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Application Procedure --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.service-application.application-procedure') }}" wire:navigate class="hover:underline">Application Procedure</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Applying for TEI service is easy. Just follow the necessary steps and you're on your way to having your home or office powered by TEI.
        </p>
        <a href="{{ route('customer.service-application.application-procedure') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Procedure
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 2. Application Requirements --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
          <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.service-application.application-requirements') }}" wire:navigate class="hover:underline">Application Requirements</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          Obtain the following requirements before visiting the City Engineer's Office (CEO): Community Tax Certificate (CTC) or Cedula, Barangay clearance, and more.
        </p>
        <a href="{{ route('customer.service-application.application-requirements') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          View Requirements
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

      {{-- 3. Other Service Related Applications --}}
      <x-custom-card>
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
          <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
        </div>
        <h3 class="text-base font-bold mb-2 text-tei-blue">
          <a href="{{ route('customer.service-application.other-service-related-applications') }}" wire:navigate class="hover:underline">Other Service Related Applications</a>
        </h3>
        <p class="text-sm leading-relaxed mb-5 text-tei-gray">
          A TEI representative will visit and review the applicant's site. The applicant will be properly informed about the additional requirements needed to gain approval.
        </p>
        <a href="{{ route('customer.service-application.other-service-related-applications') }}" wire:navigate
          class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
          Learn More
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </x-custom-card>

    </div>


    {{-- Quick contact callout --}}
    <div class="mt-10 scroll-reveal rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex gap-3 items-start">
          <div class="w-9 h-9 rounded-xl bg-tei-blue/8 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-bold text-tei-blue mb-0.5">Need assistance?</p>
            <p class="text-xs text-tei-gray leading-relaxed">Visit our office at Mabini St., Tarlac City or contact us directly. Our staff will guide you through the application process.</p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 sm:shrink-0">
          <a href="tel:+63456061834"
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold bg-tei-blue text-white transition-all duration-200 hover:bg-tei-blue/85">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            (045) 606-1834
          </a>
          <a href="mailto:cwd@teiph.com"
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold border border-tei-blue/20 text-tei-blue transition-all duration-200 hover:bg-tei-blue/5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            cwd@teiph.com
          </a>
        </div>
      </div>
    </div>

  </x-guest-section>

</div>
