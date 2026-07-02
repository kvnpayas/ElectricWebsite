<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Service Application',
      'badgeTitle' => 'Customer Services',
      'subTitle' => 'Applying for Tarlac Electric Inc. service is easy. Choose a topic below to get started with your application.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — APPLICATION TYPES
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <x-guest-intro label="Service Application" title="How to Apply for TEI Service"
      text="Applying for TEI electric service involves a few steps — from preparing your documents to coordinating with
            the City Engineer's Office (CEO) and scheduling a site visit. Select a section below to learn more about
            each stage of the process." />


  </x-guest-section>

  <x-guest-section-dark>

    {{-- Section heading --}}
    <div class="flex items-center gap-6 mb-10 scroll-reveal">
      <div class="h-px flex-1 bg-tei-blue/8"></div>
      <p class="text-[11px] font-bold text-tei-orange uppercase tracking-[0.2em] shrink-0">Application Guide</p>
      <div class="h-px flex-1 bg-tei-blue/8"></div>
    </div>
    {{-- 3 cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Application Procedure --}}
      <x-custom-card title="Application Procedure" number="01"
        text="Applying for TEI service is easy. Just follow the necessary steps and you're on your way to having your home
          or office powered by TEI."
        cta="View Procedure" href="customer.service-application.application-procedure" />

      {{-- 2. Application Requirements --}}
      <x-custom-card title="Application Requirements" number="02"
        text="Obtain the following requirements before visiting the City Engineer's Office (CEO): Community Tax Certificate
              (CTC) or Cedula, Barangay clearance, and more."
        cta="View Requirements" href="customer.service-application.application-requirements" />

      {{-- 3. Other Service Related Applications --}}
      <x-custom-card title="Other Service Related Applications" number="03"
        text="A TEI representative will visit and review the applicant's site. The applicant will be properly informed about
          the additional requirements needed to gain approval."
        cta="Learn More" href="customer.service-application.other-service-related-applications" />

    </div>
  </x-guest-section-dark>



</div>
