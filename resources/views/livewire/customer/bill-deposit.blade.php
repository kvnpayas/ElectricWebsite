<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Bill Deposit',
      'badgeTitle' => 'Billing',
      'subTitle'   => 'All TEI customers are required to maintain a bill deposit as a guarantee of payment. Learn how it is calculated, when it changes, and how to claim a refund.',
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
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">What is a Bill Deposit?</h3>
          {{-- <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            All Tarlac Electric Inc. (TEI) customers — whether new applicants or clients requesting reconnection — are required to pay a <strong class="text-tei-blue">bill deposit</strong>. The amount is approximately equivalent to one (1) month of the customer's electric bill and serves as a guarantee of payment capability. TEI bases the deposit on the customer's estimated electricity consumption or load schedule submitted during service application, and adjusts it yearly based on actual average monthly consumption.
          </p> --}}
          <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            Whether you're a new applicant or a client requesting for reconnection. all Tarlac Electric Inc. (TEI) customers are required to pay a <strong class="text-tei-blue">bill deposit</strong>. Approximately equivalent to one month of the customer's electric bill, this amount guarantees that he will be able to pay his statement. TEI will base the bill deposit on the customer's estimated electricity consumption or load schedule, which is submitted during service application. However, the amount is adjusted yearly depending on the actual average monthly electric energy consumption of the customer.
          </p>
          <div class="flex items-start gap-2 rounded-xl px-4 py-3 text-sm bg-danger/10 border border-danger/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-danger text-xs">
              <strong>Important:</strong> Failure to pay the required bill deposit shall result in the <strong>disconnection of your electric service</strong>.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards">

      <x-card variant="secondary">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Deposit Amount</h4>
            <p class="text-xs leading-relaxed text-tei-gray">Approximately equivalent to <strong class="text-tei-blue">one (1) month</strong> of the customer's estimated electric bill or load schedule.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="secondary">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Who Must Pay</h4>
            <p class="text-xs leading-relaxed text-tei-gray"><strong class="text-tei-blue">All customers</strong> — new applicants and reconnection requests — are required to pay a bill deposit before service begins.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="secondary">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Annual Review</h4>
            <p class="text-xs leading-relaxed text-tei-gray">TEI reviews and adjusts the deposit every year on the <strong class="text-tei-blue">anniversary month</strong> of your service contract based on actual average usage.</p>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — ANNUAL DEPOSIT REVIEW
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Annual Review
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Annual Update of Bill Deposit</h2>
        {{-- <p class="text-sm max-w-2xl text-tei-gray">
          Every year on the anniversary month of your service contract, TEI reviews your bill deposit to make sure it still covers your monthly usage. The outcome depends on how your actual average monthly bill compares to your current deposit.
        </p> --}}
        <p class="text-sm max-w-2xl text-tei-gray">
          Every year on the anniversary month of your service contract, TEI reviews your bill deposit to make sure it still covers your monthly usage.
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
          {{-- <p class="text-xs leading-relaxed mb-4 text-tei-gray">
            If your actual average monthly bill is <strong class="text-tei-blue">higher than your deposit by 10% or more</strong>, TEI will collect an additional amount. The corresponding interest will be applied to your deposit adjustment.
          </p> --}}
          <p class="text-xs leading-relaxed mb-4 text-tei-gray">
            If your actual average monthly bill is <strong class="text-tei-blue">higher than your deposit by 10% or more</strong>, your bill deposit will be adjusted accordingly and an additional amount will be collected from you. The corresponding interest shall be applied to your bill deposit adjustment.
          </p>
          <div class="rounded-xl px-3 py-2.5 bg-warning/10">
            <p class="text-xs font-semibold text-warning mb-0.5">Payment Options</p>
            {{-- <p class="text-xs text-tei-gray">One-time or staggered basis — your choice.</p> --}}
            <p class="text-xs text-tei-gray">One-time or staggered basis</p>
          </div>
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
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is within acceptable range</h4>
          <p class="text-xs leading-relaxed mb-4 text-tei-gray">
            If the amount falls <strong class="text-tei-blue">within the acceptable range</strong>, no additional fee will be collected from you. This also means that you will not be able to claim a bill deposit refund.
          </p>
          {{-- <div class="rounded-xl px-3 py-2.5 bg-info/10">
            <p class="text-xs font-semibold text-info mb-0.5">Acceptable Range</p>
            <p class="text-xs text-tei-gray">Between 90% and 110% of current deposit.</p>
          </div> --}}
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
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is 90% or less</h4>
          <p class="text-xs leading-relaxed mb-4 text-tei-gray">
            If your actual average monthly bill is <strong class="text-tei-blue">less than 90% of your bill deposit</strong>, you can apply for a refund of the excess amount at any TEI business center.
          </p>
          <div class="rounded-xl px-3 py-2.5 bg-success/10">
            <p class="text-xs font-semibold text-success mb-0.5">Refund Method</p>
            <p class="text-xs text-tei-gray">Cash or check — available at any TEI business center.</p>
          </div>
        </x-card>

      </div>

      {{-- Example callout --}}
      <div class="rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
            <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
          </div>
          <div class="flex-1">
            <p class="text-sm font-bold mb-1 text-tei-blue">Practical Example</p>
            <p class="text-xs text-tei-gray mb-3">If your current bill deposit is <strong class="text-tei-blue">₱1,000</strong>:</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
              <div class="rounded-xl px-3 py-2.5 bg-warning/10">
                <p class="font-bold text-warning">Avg. Bill &gt; ₱1,100</p>
                <p class="text-tei-gray mt-0.5">Deposit will be adjusted upward</p>
              </div>
              <div class="rounded-xl px-3 py-2.5 bg-info/10">
                <p class="font-bold text-info">₱900 ≤ Bill ≤ ₱1,100</p>
                <p class="text-tei-gray mt-0.5">No change to deposit</p>
              </div>
              <div class="rounded-xl px-3 py-2.5 bg-success/10">
                <p class="font-bold text-success">Avg. Bill &lt; ₱900</p>
                <p class="text-tei-gray mt-0.5">Excess refund can be claimed</p>
              </div>
            </div>
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
      <p class="text-sm max-w-2xl text-tei-gray">
        Customers who have maintained a good payment record may request a full refund of their bill deposit by filing a refund application at any TEI business center.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards mb-8">

      {{-- Eligibility card --}}
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
            <p class="text-sm leading-relaxed mb-4 text-tei-gray">
              A customer who has <strong class="text-tei-blue">diligently paid</strong> their electric bills on or before the due date for <strong class="text-tei-blue">three (3) consecutive years</strong> can request the full refund of their bill deposit by filing a refund application. TEI will refund the amount within <strong class="text-tei-blue">one (1) month</strong> of receiving the application.
            </p>
            <div class="space-y-1.5">
              @foreach ([
                  'Paid on time for 3 consecutive years',
                  'File a bill deposit refund application',
                  'TEI processes refund within 1 month',
              ] as $step)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $step }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <x-slot:footer>
          <div class="flex items-start gap-2 rounded-xl px-3 py-2.5 bg-warning/10">
            <svg class="w-3.5 h-3.5 text-warning shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs text-tei-gray">If the customer <strong class="text-tei-blue">fails to pay</strong> an electric bill after receiving the refund, TEI will restore the bill deposit requirement.</p>
          </div>
        </x-slot:footer>
      </x-card>

      {{-- Termination card --}}
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
            <p class="text-sm leading-relaxed mb-4 text-tei-gray">
              Customers terminating their TEI service can also avail of their bill deposit refund <strong class="text-tei-blue">one (1) month from the date of service termination</strong>, as long as all outstanding bills have been settled.
            </p>
            <div class="flex items-start gap-2 text-xs">
              <svg class="w-3.5 h-3.5 text-info shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-tei-gray">Refund can be requested 1 month after service termination date</span>
            </div>
          </div>
        </div>

        <x-slot:footer>
          <div class="flex items-center gap-2 text-xs text-tei-gray">
            <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            All outstanding bills must be fully settled before the refund can be processed.
          </div>
        </x-slot:footer>
      </x-card>

    </div>

    {{-- Documentation requirements --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="flex items-center gap-3 mb-5">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
          <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <div>
          <h4 class="text-sm font-bold text-tei-blue">Documentation Requirements</h4>
          <p class="text-xs text-tei-gray-light mt-0.5">Present the following at any TEI business center to facilitate your refund.</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        @foreach ([
            ['Standard',                    'text-tei-blue',  'bg-tei-blue/10',  'bg-tei-blue/20',  'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',  'Present the original Official Receipt issued by TEI at the time of deposit payment.'],
            ['If Receipt is Lost',          'text-warning',   'bg-warning/10',   'bg-warning/20',   'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',  'Submit a notarized affidavit of loss executed before a registered attorney.'],
            ['If Account Owner is Deceased','text-danger',    'bg-danger/10',    'bg-danger/20',    'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',  'The authorized representative must present the death certificate of the account owner.'],
        ] as [$label, $textClass, $bgClass, $iconBg, $icon, $desc])
          <div class="rounded-xl p-4 {{ $bgClass }}">
            <div class="flex items-center gap-2 mb-2">
              <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 {{ $iconBg }}">
                <svg class="w-3.5 h-3.5 {{ $textClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                </svg>
              </div>
              <p class="text-xs font-bold {{ $textClass }}">{{ $label }}</p>
            </div>
            <p class="text-xs leading-relaxed text-tei-gray">{{ $desc }}</p>
          </div>
        @endforeach
      </div>
    </div>

  </x-guest-section>

</div>
