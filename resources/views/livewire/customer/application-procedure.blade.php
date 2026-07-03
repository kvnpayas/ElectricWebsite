<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Application Procedure',
      'badgeTitle' => 'Service Application',
      'subTitle' => 'Applying for Tarlac Electric Inc. (TEI) service is easy! Just follow the necessary steps and you\'re on your way to having your home or office powered by TEI.',
  ])


  {{-- ═══════════════════════════════════════════════
     TIMELINE
  ═══════════════════════════════════════════════ --}}

  <x-guest-section>

    {{-- Intro card --}}
    <x-guest-intro label="Applying for Service" title="Before You Begin"
      text="The application process involves coordination between TEI, the City Engineer's Office (CEO), the Bureau of
            Fire Protection, and the Provincial Capitol Treasury. Read through all steps before visiting any office to
            ensure you have everything ready." />

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards mt-15">

      <x-card variant="primary">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-tei-blue leading-none">10</span>
          <span class="text-xs font-bold uppercase tracking-widest text-tei-blue/40">Steps</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Full Application Process</h4>
        <p class="text-xs leading-relaxed text-tei-gray">From form pickup to meter installation, the full process is outlined in 10 clear steps.</p>
      </x-card>

      <x-card variant="secondary">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-3">Required</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Site Visit</h4>
        <p class="text-xs leading-relaxed text-tei-gray">A TEI representative will visit your property to evaluate the site before approval.</p>
      </x-card>

      <x-card variant="success">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-success leading-none">4</span>
          <span class="text-xs font-bold uppercase tracking-widest text-success/40">Fees</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Fees Involved</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Service Connection Permit Fee, Fire Clearance, Service Connection Fee, and Bill Deposit are required.</p>
      </x-card>

    </div>

  </x-guest-section>
  <section class="py-20 bg-tei-surface">
    <div class="max-w-3xl mx-auto">

      {{-- ── PHASE 1 LABEL ───────────────────────────── --}}
      <div class="flex items-center gap-4 mb-8 scroll-reveal">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-lg bg-tei-blue flex items-center justify-center shrink-0">
            <span class="text-xs font-black text-white">1</span>
          </div>
          <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-tei-gray-light">Phase 1 · Steps 01–05</p>
            <p class="text-base font-bold text-tei-blue">Preparation & Submission</p>
          </div>
        </div>
        <div class="flex-1 h-px bg-tei-blue/10"></div>
      </div>


      {{-- ── TIMELINE STEPS 01–05 ─────────────────────── --}}
      <div class="relative">

        {{-- Vertical connecting line --}}
        <div
          class="absolute left-5 top-0 bottom-0 w-px bg-gradient-to-b from-tei-blue/20 via-tei-blue/15 to-transparent">
        </div>

        {{-- Step 01 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-blue flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(15,61,92,0.12);">
            <span class="text-[11px] font-black text-white">01</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Get the Customer Information Form</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              Proceed to any TEI business center and take one (1) copy of the <strong class="text-tei-blue">TEI Customer
                Information Form</strong>. You may also download and print the form.
            </p>
            <p class="text-sm leading-relaxed text-tei-gray mt-2">
              Depending on the type of connection, review all requirements listed on the form. Keep the form with you
              until the submission of requirements.
            </p>
          </div>
        </div>

        {{-- Step 02 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-blue flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(15,61,92,0.12);">
            <span class="text-[11px] font-black text-white">02</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Gather Requirements for CEO</h3>
            <p class="text-sm text-tei-gray mb-3">Obtain the following before visiting the <strong
                class="text-tei-blue">City Engineer's Office (CEO)</strong>:</p>
            <div class="space-y-2">
              @foreach (['Community Tax Certificate (CTC) or Cedula', 'Barangay clearance', 'Photo of the property being applied for', 'Proof of ownership or occupancy', 'Electrical plan and load schedule — signed and sealed by a licensed electrical engineer'] as $i => $req)
                <div class="flex items-start gap-3">
                  <span
                    class="w-5 h-5 rounded-full bg-tei-orange/10 text-tei-orange text-[10px] font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $i + 1 }}</span>
                  <p class="text-sm text-tei-gray leading-relaxed">{{ $req }}</p>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        {{-- Step 03 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-blue flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(15,61,92,0.12);">
            <span class="text-[11px] font-black text-white">03</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Service Connection Form at CEO</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              At the CEO, get a <strong class="text-tei-blue">Service Connection Form (Electric Meter
                Connection)</strong>. Fill out and sign the form, then submit it together with your requirements for
              evaluation.
            </p>
            <div
              class="mt-3 inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-tei-orange/8 border border-tei-orange/15">
              <svg class="w-3.5 h-3.5 text-tei-orange shrink-0" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-xs text-tei-orange font-semibold">Upon approval, pay the <strong>Service Connection Permit
                  Fee</strong> and keep the original receipt.</p>
            </div>
          </div>
        </div>

        {{-- Step 04 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-blue flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(15,61,92,0.12);">
            <span class="text-[11px] font-black text-white">04</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Fire Clearance</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              Obtain a <strong class="text-tei-blue">Fire Clearance Form</strong> from the Bureau of Fire Protection
              (BFP). Upon payment of the clearance, keep the original receipt.
            </p>
          </div>
        </div>

        {{-- Step 05 --}}
        <div class="relative flex gap-6 pb-4 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-warning flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(245,158,11,0.2);">
            <span class="text-[11px] font-black text-white">05</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Pay Service Connection Fee</h3>
            <p class="text-sm leading-relaxed text-tei-gray mb-3">
              Proceed to the <strong class="text-tei-blue">Provincial Capitol Treasury</strong> to pay the necessary
              Service Connection Fee. Upon payment, keep the original receipt.
            </p>
            <div class="rounded-xl p-3.5 bg-warning/6 border border-warning/20">
              <p class="text-xs font-bold text-warning mb-1">Note for Reconnection Applicants</p>
              <p class="text-xs text-tei-gray leading-relaxed">Skip this step when applying for a
                <strong>reconnection</strong>. Reconnections apply to accounts that have been disconnected for less than
                one (1) year.
              </p>
            </div>
          </div>
        </div>

      </div>


      {{-- ── PHASE 2 LABEL ───────────────────────────── --}}
      <div class="flex items-center gap-4 mt-8 mb-8 scroll-reveal">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-lg bg-tei-orange flex items-center justify-center shrink-0">
            <span class="text-xs font-black text-white">2</span>
          </div>
          <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-tei-gray-light">Phase 2 · Steps 06–10</p>
            <p class="text-base font-bold text-tei-blue">Review, Approval & Installation</p>
          </div>
        </div>
        <div class="flex-1 h-px bg-tei-blue/10"></div>
      </div>


      {{-- ── TIMELINE STEPS 06–10 ─────────────────────── --}}
      <div class="relative">

        <div
          class="absolute left-5 top-0 bottom-0 w-px bg-gradient-to-b from-tei-orange/20 via-tei-orange/10 to-transparent">
        </div>

        {{-- Step 06 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-orange flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(231,103,39,0.18);">
            <span class="text-[11px] font-black text-white">06</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Submit to TEI Customer Welfare Desk</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              Submit all requirements, the issued official receipts, and the completed Customer Information Form to the
              <strong class="text-tei-blue">TEI Customer Welfare Desk (CWD)</strong>.
            </p>
          </div>
        </div>

        {{-- Step 07 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-orange flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(231,103,39,0.18);">
            <span class="text-[11px] font-black text-white">07</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Sign the Data Privacy Consent</h3>
            <p class="text-sm leading-relaxed text-tei-gray mb-3">
              Sign the <strong class="text-tei-blue">Data Privacy Consent</strong> located at the back of the Customer
              Information Form.
            </p>
            <div class="rounded-xl p-3.5 border border-tei-blue/12 bg-tei-blue/3">
              <p class="text-xs font-bold text-tei-blue mb-1">Confidentiality Notice</p>
              <p class="text-xs text-tei-gray leading-relaxed">All submitted information will be treated with
                confidentiality and used only for official purposes. Documents will be verified by TEI's attending
                customer service representative. Additional documents may be required during the process.</p>
            </div>
          </div>
        </div>

        {{-- Step 08 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-orange flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(231,103,39,0.18);">
            <span class="text-[11px] font-black text-white">08</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">TEI Site Visit</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              A TEI representative will visit and review your site. Based on the findings, there may be additional
              requirements needed to proceed with the application. You will be properly informed about what is needed to
              gain approval.
            </p>
          </div>
        </div>

        {{-- Step 09 --}}
        <div class="relative flex gap-6 pb-10 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-tei-orange flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(231,103,39,0.18);">
            <span class="text-[11px] font-black text-white">09</span>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-tei-blue mb-2">Sign Contract & Pay Deposits</h3>
            <p class="text-sm leading-relaxed text-tei-gray">
              Once the site survey is complete, sign the <strong class="text-tei-blue">TEI Metered Service
                Contract</strong>, then pay the corresponding <strong class="text-tei-blue">bill deposit</strong> and
              <strong class="text-tei-blue">service fee</strong> at any TEI business center.
            </p>
          </div>
        </div>

        {{-- Step 10 --}}
        <div class="relative flex gap-6 pb-4 scroll-reveal">
          <div class="w-10 h-10 rounded-full bg-success flex items-center justify-center shrink-0 z-10 shadow-lg"
            style="box-shadow: 0 0 0 4px white, 0 0 0 5px rgba(16,185,129,0.2);">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <div class="flex-1 pt-1.5">
            <h3 class="text-base font-bold text-success mb-2">Meter Installation</h3>
            <p class="text-sm leading-relaxed text-tei-gray mb-3">
              A schedule is set between TEI and the applicant to <strong class="text-tei-blue">install the electric
                meter</strong> at the approved site.
            </p>
            <div class="rounded-xl p-4 bg-success/6 border border-success/15">
              <div class="flex items-center gap-2 mb-1">
                <svg class="w-4 h-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs font-bold text-success">You're all set!</p>
              </div>
              <p class="text-xs text-tei-gray leading-relaxed">Congratulations — once your meter is installed, you are
                officially powered by Tarlac Electric Inc.</p>
            </div>
          </div>
        </div>

      </div>


      {{-- ── BACK LINK ───────────────────────────────── --}}
      <div class="mt-10 pt-8 border-t border-tei-blue/8 scroll-reveal">
        <a href="{{ route('customer.service-application') }}" wire:navigate
          class="inline-flex items-center gap-2 text-sm font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Back to Service Application
        </a>
      </div>

    </div>
  </section>

</div>
