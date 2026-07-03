<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Senior Citizen Discount',
      'badgeTitle' => 'Special Programs',
      'subTitle' => 'Following the Expanded Senior Citizen Act of 2010, TEI offers significant savings to elderly Filipinos aged 60 and above on their monthly electricity consumption.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS THE SENIOR CITIZEN DISCOUNT?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <x-guest-intro variant="warning" label="Senior Citizen Discount" title="Get a 5% Discount!"
      text="Under the Expanded Senior Citizen Act of 2010, Tarlac Electric Inc. offers a 5% discount on the monthly electricity bills of qualified senior citizens. This is applicable if you are a Philippine senior citizen who uses one hundred kilowatt-hours (100 kWh) or less per month, and has the TEI electricity meter of your home registered under your name for at least one (1) year."
      promptTitle="Yearly Renewal Required"
      promptText="Applying for a senior citizen discount should be done on a yearly basis. It will not be automatically discounted in your TEI billing statement." />

    {{-- Eligibility quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards mt-15">

      <x-card variant="secondary">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-tei-orange leading-none">5%</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Discount Amount</h4>
        <p class="text-xs leading-relaxed text-tei-gray"><strong class="text-tei-blue">5% off</strong> on the monthly
          electricity bill, subsidized by other TEI customers as mandated by law.</p>
      </x-card>

      <x-card variant="primary">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-tei-blue leading-none">60</span>
          <span class="text-xs font-bold uppercase tracking-widest text-tei-blue/40">& above</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Who Qualifies</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Philippine senior citizen aged <strong class="text-tei-blue">60
            years and above</strong> using <strong class="text-tei-blue">100 kWh or less</strong> per month.</p>
      </x-card>

      <x-card variant="warning">
        <p class="text-[10px] font-black text-warning uppercase tracking-[0.18em] mb-3">Yearly</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Apply Yearly</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Application must be renewed <strong class="text-tei-blue">every
            year</strong>. Meter must be registered under the senior citizen's name for at least <strong
            class="text-tei-blue">one (1) year</strong>.</p>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — HOW TO APPLY
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

      <x-section-heading title="Application" heading="How to Apply"
        text="Follow these steps to avail of the senior citizen discount. If all requirements are complete, your application will be approved on the same day and the discount will be reflected on your next billing statement."
        align="left" />

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

        {{-- Step 1 --}}
        <x-card variant="primary">
          <div class="flex items-start justify-between mb-5">
            <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
            <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">01</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Get the Application Form</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            Get a <strong class="text-tei-blue">Senior Citizen Discount Form</strong> from any of the TEI business
            centers.
          </p>
        </x-card>

        {{-- Step 2 --}}
        <x-card variant="primary">
          <div class="flex items-start justify-between mb-5">
            <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
            <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">02</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Fill Out and Sign the Form</h4>
          <p class="text-xs leading-relaxed mb-3 text-tei-gray">
            <strong class="text-tei-blue">Personally</strong> fill out and sign the application form.
          </p>
          <x-slot:footer>
            <div class="border-l-2 border-danger pl-3">
              <p class="text-xs font-semibold text-danger mb-0.5">Representatives will not be allowed to sign on your behalf.</p>
            </div>
          </x-slot:footer>
        </x-card>

        {{-- Step 3 --}}
        <x-card variant="primary">
          <div class="flex items-start justify-between mb-5">
            <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
            <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">03</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Prepare Your Identification</h4>
          <p class="text-xs leading-relaxed mb-3 text-tei-gray">
            Prepare your <strong class="text-tei-blue">Senior Citizen ID</strong> and one (1) additional valid
            identification card. Accepted valid IDs:
          </p>
          <div class="flex flex-wrap gap-1.5">
            @foreach (['Philippine Passport', "Driver's License", "Voter's ID", 'SSS ID', 'GSIS ID', 'PRC Card', 'Postal ID'] as $id)
              <span
                class="text-xs px-2 py-0.5 rounded-full bg-tei-blue/10 text-tei-blue font-medium">{{ $id }}</span>
            @endforeach
          </div>
        </x-card>

        {{-- Step 4 --}}
        <x-card variant="primary">
          <div class="flex items-start justify-between mb-5">
            <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
            <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">04</span>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to a TEI Business Center</h4>
          <p class="text-xs leading-relaxed mb-3 text-tei-gray">
            To process the application, present the following to the <strong class="text-tei-blue">TEI main
              branch</strong> or any of its business centers:
          </p>
          <div class="space-y-1.5">
            @foreach (['Completed Senior Citizen Discount Form', 'Senior Citizen ID and 1 valid ID', 'Photocopy of both IDs', 'Most recent TEI billing statement', 'Barangay certification'] as $req)
              <div class="flex items-center gap-2 text-xs">
                <svg class="w-3.5 h-3.5 text-tei-blue shrink-0" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-tei-gray">{{ $req }}</span>
              </div>
            @endforeach
          </div>
        </x-card>

      </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — REQUIREMENTS & IMPORTANT REMINDERS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading title="Requirements" variant="primary" heading="What to Bring"
      text="Make sure all five requirements are complete before visiting a TEI business center. Incomplete submissions cannot be processed."
      align="left" />

    {{-- Requirements grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 stagger-cards mb-10">

      @foreach ([['Discount Form', 'success', 'text-success', 'Completed and personally signed Senior Citizen Discount Form.'], ['Senior Citizen ID', 'primary', 'text-tei-blue', 'Original Senior Citizen ID issued by your local government.'], ['1 Additional Valid ID', 'primary', 'text-tei-blue', 'Passport, Driver\'s License, Voter\'s ID, SSS, GSIS, PRC Card, or Postal ID.'], ['Photocopy of IDs', 'accent', 'text-tei-gray', 'Clear photocopy of both your Senior Citizen ID and the additional valid ID.'], ['Latest TEI Statement', 'accent', 'text-tei-gray', 'Your most recent monthly Statement of Account (SOA) from TEI.'], ['Barangay Certification', 'accent', 'text-tei-gray', 'Official barangay certification confirming your place of residence.']] as [$name, $variant, $textClass, $desc])
        <x-card variant="{{ $variant }}">
          <p class="text-[10px] font-black {{ $textClass }} uppercase tracking-[0.18em] mb-3">{{ $name }}</p>
          <p class="text-xs leading-relaxed text-tei-gray">{{ $desc }}</p>
        </x-card>
      @endforeach

    </div>

    {{-- Important reminders --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="mb-5">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-1">Reminders</p>
        <h4 class="text-sm font-bold text-tei-blue">Important Reminders</h4>
        <p class="text-xs text-tei-gray-light mt-1">Please take note of the following before filing your application.
        </p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="rounded-xl p-4 bg-danger/10">
          <p class="text-xs font-bold text-danger mb-2">No Senior Citizen ID</p>
          <p class="text-xs leading-relaxed text-tei-gray">Senior citizens <strong class="text-tei-blue">cannot
              apply</strong> for the discount without a valid Senior Citizen ID. Secure your ID first before filing.</p>
        </div>
        <div class="rounded-xl p-4 bg-success/10">
          <p class="text-xs font-bold text-success mb-2">Same-Day Approval</p>
          <p class="text-xs leading-relaxed text-tei-gray">If all requirements are complete, your application is
            <strong class="text-tei-blue">approved on the same day</strong>. The discount will appear on your next
            billing statement.</p>
        </div>
        <div class="rounded-xl p-4 bg-warning/10">
          <p class="text-xs font-bold text-warning mb-2">Yearly Renewal Required</p>
          <p class="text-xs leading-relaxed text-tei-gray">The discount is <strong class="text-tei-blue">not
              automatic</strong>. You must re-apply every year. Failure to renew means the discount will not be applied
            to your bill.</p>
        </div>
      </div>
    </div>

  </x-guest-section>

</div>
