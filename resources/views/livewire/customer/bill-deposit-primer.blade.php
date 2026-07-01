<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Bill Deposit Primer',
      'badgeTitle' => 'Customer',
      'subTitle'   => 'A complete guide to understanding your bill deposit — how it is computed, when it changes, and how to claim a refund.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS A BILL DEPOSIT?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            Whether you're a new applicant or a client requesting for reconnection, all Tarlac Electric Inc. (TEI) customers are required to pay a <strong class="text-tei-blue">bill deposit</strong>. Approximately equivalent to one month of the customer's monthly electric bill, this amount guarantees that he will be able to pay his statement. Failure to pay the required bill deposit shall result in the disconnection of the electric service.
          </p>
          <p class="text-sm leading-relaxed text-tei-gray">
            TEI will base the bill deposit on the customer's estimated electricity consumption or load schedule, which is submitted during service application. However, the amount is adjusted yearly depending on the actual average monthly electric energy consumption of the customer.
          </p>
          <div class="mt-4 flex items-start gap-2 rounded-xl px-4 py-3 bg-danger/10 border border-danger/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs text-danger">
              <strong>Important:</strong> Failure to pay the required bill deposit shall result in the <strong>disconnection of your electric service</strong>.
            </p>
          </div>
        </div>
      </div>
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — ANNUAL UPDATE OF BILL DEPOSIT
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Annual Review
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-3 text-tei-blue">Annual Update of Bill Deposit</h2>
        <p class="text-sm leading-relaxed max-w-3xl text-tei-gray">
          Every year on the anniversary month of your service contract, TEI will review your bill deposit to make sure it is enough to cover your monthly usage.
        </p>
      </div>

      {{-- Three scenario cards --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards mb-8">

        <x-card variant="warning">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-warning/15">
              <svg class="w-4 h-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
              </svg>
            </div>
            <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-warning/15 text-warning">Deposit Increases</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is 10% or more higher</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            If your actual average monthly bill is higher than your bill deposit by ten percent (10%) or more, your bill deposit will be adjusted accordingly and an additional amount will be collected from you. The corresponding interest shall be applied to your bill deposit adjustment. You have the option of paying the amount on a one-time or staggered basis.
          </p>
        </x-card>

        <x-card variant="info">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-info/15">
              <svg class="w-4 h-4 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
              </svg>
            </div>
            <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-info/15 text-info">No Change</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Amount falls within acceptable range</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            If the amount falls within the acceptable range, no additional fee will be collected from you. This also means that you will not be able to claim a bill deposit refund.
          </p>
        </x-card>

        <x-card variant="success">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-success/15">
              <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
              </svg>
            </div>
            <span class="text-xs font-bold px-2.5 py-0.5 rounded-full bg-success/15 text-success">Refund Eligible</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is less than 90%</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            If your actual average monthly bill is less than 90 percent (90%) of your bill deposit, you can apply for a refund. You have the option to refund the amount by cash or check at any TEI business center.
          </p>
        </x-card>

      </div>

      {{-- Practical example --}}
      <div class="rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8 scroll-reveal"
           style="box-shadow: 0 2px 12px rgba(15,61,92,0.05);">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
            <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
          </div>
          <div class="flex-1">
            <p class="text-sm font-bold mb-2 text-tei-blue">Practical Example</p>
            <p class="text-xs leading-relaxed text-tei-gray">
              For example, your bill deposit is P1,000. If your actual average monthly bill is more than P1,100, TEI will automatically adjust it the following year. If your actual average monthly bill is less than P900, you can apply for the refund.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — BILL DEPOSIT REFUND
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-12 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-success/10 text-success">
        Refund
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Bill Deposit Refund</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards mb-8">

      {{-- Good payer --}}
      <x-card variant="success">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2 flex-wrap">
              <h4 class="text-base font-bold text-tei-blue">Eligibility for Full Refund</h4>
              <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success">Good-payer refund</span>
            </div>
            <p class="text-sm leading-relaxed text-tei-gray">
              A customer who has diligently paid his electric bills on or before its due date for three (3) consecutive years can request for the full refund of his bill deposit. This is done by filing a bill deposit refund application. TEI will refund the amount within one (1) month of receiving the application. However, if the customer fails to pay his electric bill on time, TEI will restore his bill deposit.
            </p>
          </div>
        </div>
      </x-card>

      {{-- Service termination --}}
      <x-card variant="info">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-info/10">
            <svg class="w-5 h-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2 flex-wrap">
              <h4 class="text-base font-bold text-tei-blue">Refund Upon Service Termination</h4>
              <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-info/10 text-info">On termination</span>
            </div>
            <p class="text-sm leading-relaxed text-tei-gray">
              Customers terminating their TEI service can also avail of their bill deposit refund one (1) month from the termination of service as long as all of their bills have been settled.
            </p>
          </div>
        </div>
      </x-card>

    </div>

    {{-- Documentation requirements --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="flex items-center gap-3 mb-5">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
          <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <div>
          <p class="text-sm font-bold text-tei-blue">Documentation Requirements</p>
          <p class="text-xs text-tei-gray-light mt-0.5">To facilitate the bill deposit refund, present the following at any TEI business center.</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <x-card variant="primary">
          <div class="flex items-center gap-2 mb-3">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-3.5 h-3.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <p class="text-xs font-bold text-tei-blue">Standard</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">
            The account owner should present the original official receipt to TEI.
          </p>
        </x-card>

        <x-card variant="warning">
          <div class="flex items-center gap-2 mb-3">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-warning/15">
              <svg class="w-3.5 h-3.5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <p class="text-xs font-bold text-warning">If Receipt is Lost</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">
            If the official receipt is lost, the account owner should provide an affidavit of loss notarized by a registered attorney.
          </p>
        </x-card>

        <x-card variant="danger">
          <div class="flex items-center gap-2 mb-3">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 bg-danger/10">
              <svg class="w-3.5 h-3.5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <p class="text-xs font-bold text-danger">If Account Owner is Deceased</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">
            If the account owner has passed away, the representative should provide a death certificate.
          </p>
        </x-card>

      </div>
    </div>

  </x-guest-section>

</div>
