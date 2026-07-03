<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Customer Services',
      'badgeTitle' => 'Customer Services',
      'subTitle' => 'Everything you need as a TEI customer — service applications, billing guides, special programs, and energy initiatives all in one place.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION HEADING
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading
      title="What We Offer"
      heading="All Customer Services"
      text="From new connections to bill management and special programs — managing your electricity made simple."
      align="center" />

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     ALL SERVICES
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      {{-- 1. Power Advisory Schedule --}}
      {{-- <x-custom-card icon=""
        title="Power Advisory Schedule"
        text="As Tarlac Electric Inc. (TEI) constantly works to improve its services, there may be occasional power interruptions in your area. Visit this page regularly or follow our official Facebook page @tei.ph to get updates on all electric service interruptions."
        href="customer.power-interruption-schedule"
        cta="View Schedule" /> --}}

      {{-- 2. How to Read Your Bill --}}
      <x-custom-card icon=""
        title="How to Read Your Bill"
        text="Customers of Tarlac Electric Inc. (TEI) can expect a Statement of Account (SOA) sent to their service address on a monthly basis. In it, you can find the statement period covered, the total amount you have to pay, and when you have to pay. To avail of the Prompt Payment Discount, you must pay your current bill at any TEI business center on or before its due date."
        href="customer.how-to-read-your-bill"
        cta="View Guide" />

      {{-- 3. Service Application (sub-links in slot) --}}
      <x-custom-card icon=""
        title="Service Application"
        text="Applying for the Tarlac Electric Inc. (TEI) service is easy! Just follow the necessary steps and you're on your way to having your home or office powered by TEI.">
        <div class="space-y-0.5 pt-3 border-t border-tei-blue/8 mt-1">
          @foreach ([
            ['Application Procedure', 'customer.service-application.application-procedure'],
            ['Application Requirement', 'customer.service-application.application-requirements'],
            ['Other Service Related Applications', 'customer.service-application.other-service-related-applications'],
          ] as [$label, $routeName])
            <a href="{{ Route::has($routeName) ? route($routeName) : '#' }}" wire:navigate
              class="flex items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-tei-blue hover:text-tei-orange hover:bg-tei-orange/5 transition-colors duration-150">
              <svg class="w-3.5 h-3.5 shrink-0 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              {{ $label }}
            </a>
          @endforeach
        </div>
      </x-custom-card>

      {{-- 4. Bill Deposit --}}
      <x-custom-card icon=""
        title="Bill Deposit"
        text="Whether you're a new applicant or a client requesting for reconnection, all Tarlac Electric Inc. (TEI) customers are required to pay a bill deposit. Approximately equivalent to one month of the customer's electric bill, this amount guarantees that he will be able to pay his statement. Failure to pay the required bill deposit shall result in the disconnection of the electric service."
        href="customer.bill-deposit"
        cta="Learn More" />

      {{-- 5. Bill Deposit Primer --}}
      {{-- <x-custom-card icon=""
        title="Bill Deposit Primer"
        text="Every year on the anniversary month of your service contract, TEI will review your bill deposit to make sure it is enough to cover your monthly usage. If your actual average monthly bill is higher than your bill deposit by ten percent (10%) or more, your bill deposit will be adjusted accordingly and an additional amount will be collected from you. The corresponding interest shall be applied to your bill deposit adjustment. You have the option of paying the amount on a one-time or staggered basis."
        href="customer.bill-deposit-primer"
        cta="Read Primer" /> --}}

      {{-- 6. Senior Citizen Discount --}}
      <x-custom-card icon=""
        title="Senior Citizen Discount"
        text="Following the Expanded Senior Citizen Act of 2010, Tarlac Electric Inc. (TEI) offers huge savings to elderly Filipinos aged 60 and above."
        href="customer.senior-citizen-discount"
        cta="View Discount Details" />

      {{-- 7. Net Metering Primer --}}
      <x-custom-card icon=""
        title="Net Metering Primer"
        text="Tarlac Electric Inc. (TEI) is in full support of clean, renewable, and sustainable energy. Residential and business owners are encouraged to find alternative means of creating energy-whether it be solar, wind, biomass, or biogas-and giving it back to the community."
        href="customer.net-metering-primer"
        cta="Learn About Net Metering" />

      {{-- 8. Distributed Energy Resources --}}
      <x-custom-card icon=""
        title="Distributed Energy Resources"
        text="The Distributed Energy Resources (DER) program, initiated by the ERC, aims to encourage the development and utilization of DER and promote energy efficiency and sustainability."
        href="customer.distributed-energy-resources"
        cta="Learn About DER" />

    </div>

  </x-guest-section-dark>

</div>
