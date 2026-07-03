<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Bill Deposit',
      'badgeTitle' => 'Billing',
      'subTitle' => 'All TEI customers are required to maintain a bill deposit as a guarantee of payment. Learn how it is calculated, when it changes, and how to claim a refund.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS A BILL DEPOSIT?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <x-guest-intro variant="secondary" label="Billing" title="What is a Bill Deposit?"
      text="Whether you're a new applicant or a client requesting for reconnection. all Tarlac Electric Inc. (TEI)
            customers are required to pay a bill deposit. Approximately
            equivalent to one month of the customer's electric bill, this amount guarantees that he will be able to pay
            his statement. TEI will base the bill deposit on the customer's estimated electricity consumption or load
            schedule, which is submitted during service application. However, the amount is adjusted yearly depending on
            the actual average monthly electric energy consumption of the customer."
      promptTitle="Important"
      promptText="Failure to pay the required bill deposit shall result in the disconnection of your electric service." />

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards mt-15">

      <x-card variant="secondary">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-tei-orange leading-none">1</span>
          <span class="text-xs font-bold uppercase tracking-widest text-tei-orange/40">Month</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Deposit Amount</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Approximately equivalent to <strong class="text-tei-blue">one
            (1) month</strong> of the customer's estimated electric bill or load schedule.</p>
      </x-card>

      <x-card variant="primary">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-3">Required</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Who Must Pay</h4>
        <p class="text-xs leading-relaxed text-tei-gray"><strong class="text-tei-blue">All customers</strong> — new
          applicants and reconnection requests — are required to pay a bill deposit before service begins.</p>
      </x-card>

      <x-card variant="warning">
        <p class="text-[10px] font-black text-warning uppercase tracking-[0.18em] mb-3">Yearly</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Annual Review</h4>
        <p class="text-xs leading-relaxed text-tei-gray">TEI reviews and adjusts the deposit every year on the <strong
            class="text-tei-blue">anniversary month</strong> of your service contract based on actual average usage.</p>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — ANNUAL DEPOSIT REVIEW
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

    <x-section-heading title="Annual Review" heading="Annual Update of Bill Deposit"
      text="Every year on the anniversary month of your service contract, TEI reviews your bill deposit to make sure it still covers your monthly usage."
      align="left" />

    {{-- Three scenario cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards mb-8">

      <x-card variant="warning">
        <p class="text-[10px] font-black text-warning uppercase tracking-[0.18em] mb-4">Deposit Increases</p>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is 10% or more higher</h4>
        <p class="text-xs leading-relaxed mb-4 text-tei-gray">
          If your actual average monthly bill is <strong class="text-tei-blue">higher than your deposit by 10% or
            more</strong>, your bill deposit will be adjusted accordingly and an additional amount will be collected
          from you. The corresponding interest shall be applied to your bill deposit adjustment.
        </p>
        <x-slot:footer>
          <div class="border-l-2 border-warning pl-3">
            <p class="text-xs font-semibold text-warning mb-0.5">Payment Options</p>
            <p class="text-xs text-tei-gray">One-time or staggered basis</p>
          </div>
        </x-slot:footer>
      </x-card>

      <x-card variant="info">
        <p class="text-[10px] font-black text-info uppercase tracking-[0.18em] mb-4">No Change</p>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is within acceptable range</h4>
        <p class="text-xs leading-relaxed mb-4 text-tei-gray">
          If the amount falls <strong class="text-tei-blue">within the acceptable range</strong>, no additional fee will
          be collected from you. This also means that you will not be able to claim a bill deposit refund.
        </p>
      </x-card>

      <x-card variant="success">
        <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-4">Refund Eligible</p>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Bill is 90% or less</h4>
        <p class="text-xs leading-relaxed mb-4 text-tei-gray">
          If your actual average monthly bill is <strong class="text-tei-blue">less than 90% of your bill
            deposit</strong>, you can apply for a refund of the excess amount at any TEI business center.
        </p>
        <x-slot:footer>
          <div class="border-l-2 border-success pl-3">
            <p class="text-xs font-semibold text-success mb-0.5">Refund Method</p>
            <p class="text-xs text-tei-gray">Cash or check — available at any TEI business center.</p>
          </div>
        </x-slot:footer>
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
          <p class="text-xs text-tei-gray mb-3">If your current bill deposit is <strong
              class="text-tei-blue">₱1,000</strong>:</p>
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
  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — BILL DEPOSIT REFUND
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading title="Refund" variant="success" heading="Bill Deposit Refund"
      text="Customers who have maintained a good payment record may request a full refund of their bill deposit by filing a refund application at any TEI business center."
      align="left" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards mb-8">

      {{-- Eligibility card --}}
      <x-card variant="success">
        <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-4">Good-Payer Refund</p>
        <h4 class="text-base font-bold mb-3 text-tei-blue">Eligibility for Full Refund</h4>
        <p class="text-sm leading-relaxed mb-4 text-tei-gray">
          A customer who has <strong class="text-tei-blue">diligently paid</strong> their electric bills on or
          before the due date for <strong class="text-tei-blue">three (3) consecutive years</strong> can request
          the full refund of their bill deposit by filing a refund application. TEI will refund the amount within
          <strong class="text-tei-blue">one (1) month</strong> of receiving the application.
        </p>
        <div class="space-y-1.5">
          @foreach (['Paid on time for 3 consecutive years', 'File a bill deposit refund application', 'TEI processes refund within 1 month'] as $step)
            <div class="flex items-center gap-2 text-xs">
              <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span class="text-tei-gray">{{ $step }}</span>
            </div>
          @endforeach
        </div>

        <x-slot:footer>
          <div class="border-l-2 border-warning pl-3">
            <p class="text-xs text-tei-gray">If the customer <strong class="text-tei-blue">fails to pay</strong> an
              electric bill after receiving the refund, TEI will restore the bill deposit requirement.</p>
          </div>
        </x-slot:footer>
      </x-card>

      {{-- Termination card --}}
      <x-card variant="info">
        <p class="text-[10px] font-black text-info uppercase tracking-[0.18em] mb-4">On Termination</p>
        <h4 class="text-base font-bold mb-3 text-tei-blue">Refund Upon Service Termination</h4>
        <p class="text-sm leading-relaxed mb-4 text-tei-gray">
          Customers terminating their TEI service can also avail of their bill deposit refund <strong
            class="text-tei-blue">one (1) month from the date of service termination</strong>, as long as all
          outstanding bills have been settled.
        </p>
        <p class="text-xs text-tei-gray-light">Refund can be requested 1 month after service termination date.</p>

        <x-slot:footer>
          <p class="text-xs text-tei-gray">All outstanding bills must be fully settled before the refund can be
            processed.</p>
        </x-slot:footer>
      </x-card>

    </div>

    {{-- Documentation requirements --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="mb-5">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-1">Documentation</p>
        <h4 class="text-sm font-bold text-tei-blue">Requirements for Refund</h4>
        <p class="text-xs text-tei-gray-light mt-1">Present the following at any TEI business center to facilitate your
          refund.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        @foreach ([['Standard', 'text-tei-blue', 'bg-tei-blue/10', 'Present the original Official Receipt issued by TEI at the time of deposit payment.'], ['If Receipt is Lost', 'text-warning', 'bg-warning/10', 'Submit a notarized affidavit of loss executed before a registered attorney.'], ['If Account Owner is Deceased', 'text-danger', 'bg-danger/10', 'The authorized representative must present the death certificate of the account owner.']] as [$label, $textClass, $bgClass, $desc])
          <div class="rounded-xl p-4 {{ $bgClass }}">
            <p class="text-xs font-bold {{ $textClass }} mb-2">{{ $label }}</p>
            <p class="text-xs leading-relaxed text-tei-gray">{{ $desc }}</p>
          </div>
        @endforeach
      </div>
    </div>

  </x-guest-section>

</div>
