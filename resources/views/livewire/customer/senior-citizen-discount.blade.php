<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Senior Citizen Discount',
      'badgeTitle' => 'Special Programs',
      'subTitle'   => 'Following the Expanded Senior Citizen Act of 2010, TEI offers significant savings to elderly Filipinos aged 60 and above on their monthly electricity consumption.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS THE SENIOR CITIZEN DISCOUNT?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Senior Citizen Discount</h3>
          <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            Under the <strong class="text-tei-blue">Expanded Senior Citizen Act of 2010</strong>, Tarlac Electric Inc. offers a <strong class="text-tei-blue">5% discount</strong> on the monthly electricity bills of qualified senior citizens. This discount is applicable to Philippine senior citizens who use <strong class="text-tei-blue">one hundred kilowatt-hours (100 kWh) or less per month</strong> and have their TEI electricity meter registered under their name for at least one (1) year.
          </p>
          <div class="flex items-start gap-2 rounded-xl px-4 py-3 text-sm bg-warning/10 border border-warning/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs text-warning">
              <strong>Reminder:</strong> This discount must be applied for on a <strong>yearly basis</strong>. It will not be automatically applied to your TEI billing statement.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Eligibility quick facts --}}
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
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Discount Amount</h4>
            <p class="text-xs leading-relaxed text-tei-gray"><strong class="text-tei-blue">5% off</strong> on the monthly electricity bill, subsidized by other TEI customers as mandated by law.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="secondary">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Who Qualifies</h4>
            <p class="text-xs leading-relaxed text-tei-gray">Philippine senior citizen aged <strong class="text-tei-blue">60 years and above</strong> using <strong class="text-tei-blue">100 kWh or less</strong> per month.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="secondary">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Apply Yearly</h4>
            <p class="text-xs leading-relaxed text-tei-gray">Application must be renewed <strong class="text-tei-blue">every year</strong>. Meter must be registered under the senior citizen's name for at least <strong class="text-tei-blue">one (1) year</strong>.</p>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — HOW TO APPLY
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Application
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">How to Apply</h2>
        <p class="text-sm max-w-2xl text-tei-gray">
          Follow these steps to avail of the senior citizen discount. If all requirements are complete, your application will be <strong class="text-tei-blue">approved on the same day</strong> and the discount will be reflected on your next billing statement.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

        {{-- Step 1 --}}
        <x-card variant="primary">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10 text-tei-blue font-black text-sm">
              01
            </div>
            <div>
              <h4 class="text-sm font-bold mb-2 text-tei-blue">Get the Application Form</h4>
              <p class="text-xs leading-relaxed text-tei-gray">
                Obtain a <strong class="text-tei-blue">Senior Citizen Discount Form</strong> from any of the TEI business centers. The form is available free of charge.
              </p>
            </div>
          </div>
        </x-card>

        {{-- Step 2 --}}
        <x-card variant="primary">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10 text-tei-blue font-black text-sm">
              02
            </div>
            <div>
              <h4 class="text-sm font-bold mb-2 text-tei-blue">Fill Out and Sign the Form</h4>
              <p class="text-xs leading-relaxed mb-3 text-tei-gray">
                <strong class="text-tei-blue">Personally</strong> fill out and sign the application form.
              </p>
              <div class="flex items-start gap-2 rounded-xl px-3 py-2 bg-danger/10">
                <svg class="w-3.5 h-3.5 text-danger shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
                <p class="text-xs text-danger font-semibold">Representatives will not be allowed to sign on your behalf.</p>
              </div>
            </div>
          </div>
        </x-card>

        {{-- Step 3 --}}
        <x-card variant="primary">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10 text-tei-blue font-black text-sm">
              03
            </div>
            <div>
              <h4 class="text-sm font-bold mb-2 text-tei-blue">Prepare Your Identification</h4>
              <p class="text-xs leading-relaxed mb-3 text-tei-gray">
                Prepare your <strong class="text-tei-blue">Senior Citizen ID</strong> and one (1) additional valid identification card. Accepted valid IDs:
              </p>
              <div class="flex flex-wrap gap-1.5">
                @foreach (['Philippine Passport', "Driver's License", "Voter's ID", 'SSS ID', 'GSIS ID', 'PRC Card', 'Postal ID'] as $id)
                  <span class="text-xs px-2 py-0.5 rounded-full bg-tei-blue/10 text-tei-blue font-medium">{{ $id }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </x-card>

        {{-- Step 4 --}}
        <x-card variant="primary">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10 text-tei-blue font-black text-sm">
              04
            </div>
            <div>
              <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to a TEI Business Center</h4>
              <p class="text-xs leading-relaxed mb-3 text-tei-gray">
                Present your complete requirements at the <strong class="text-tei-blue">TEI main branch</strong> or any of its business centers for processing.
              </p>
              <div class="space-y-1.5">
                @foreach ([
                    'Completed Senior Citizen Discount Form',
                    'Senior Citizen ID and 1 valid ID',
                    'Photocopy of both IDs',
                    'Most recent TEI billing statement',
                    'Barangay certification',
                ] as $req)
                  <div class="flex items-center gap-2 text-xs">
                    <svg class="w-3.5 h-3.5 text-tei-blue shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-tei-gray">{{ $req }}</span>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </x-card>

      </div>

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — REQUIREMENTS & IMPORTANT REMINDERS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-12 scroll-reveal">
      <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-blue/10 text-tei-blue">
        Requirements
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">What to Bring</h2>
      <p class="text-sm max-w-2xl text-tei-gray">
        Make sure all five requirements are complete before visiting a TEI business center. Incomplete submissions cannot be processed.
      </p>
    </div>

    {{-- Requirements grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 stagger-cards mb-10">

      @foreach ([
          ['Discount Form',         'success', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',  'Completed and personally signed Senior Citizen Discount Form.'],
          ['Senior Citizen ID',     'primary',  'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2', 'Original Senior Citizen ID issued by your local government.'],
          ['1 Additional Valid ID', 'primary',  'M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zM12.75 9.375a.375.375 0 11-.75 0 .375.375 0 01.75 0zM12.75 12.375a.375.375 0 11-.75 0 .375.375 0 01.75 0zM12.75 15.375a.375.375 0 11-.75 0 .375.375 0 01.75 0z', 'Passport, Driver\'s License, Voter\'s ID, SSS, GSIS, PRC Card, or Postal ID.'],
          ['Photocopy of IDs',      'accent',   'M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z', 'Clear photocopy of both your Senior Citizen ID and the additional valid ID.'],
          ['Latest TEI Statement',  'accent',   'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'Your most recent monthly Statement of Account (SOA) from TEI.'],
          ['Barangay Certification','accent',   'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9',  'Official barangay certification confirming your place of residence.'],
      ] as [$name, $variant, $icon, $desc])
        <x-card variant="{{ $variant }}">
          <div class="flex items-start gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0
              @if($variant === 'success') bg-success/10
              @elseif($variant === 'primary') bg-tei-blue/10
              @else bg-tei-gray/10
              @endif">
              <svg class="w-4 h-4
                @if($variant === 'success') text-success
                @elseif($variant === 'primary') text-tei-blue
                @else text-tei-gray
                @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
              </svg>
            </div>
            <div>
              <h4 class="text-sm font-bold mb-1 text-tei-blue">{{ $name }}</h4>
              <p class="text-xs leading-relaxed text-tei-gray">{{ $desc }}</p>
            </div>
          </div>
        </x-card>
      @endforeach

    </div>

    {{-- Important reminders --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="flex items-center gap-3 mb-5">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
          <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <h4 class="text-sm font-bold text-tei-blue">Important Reminders</h4>
          <p class="text-xs text-tei-gray-light mt-0.5">Please take note of the following before filing your application.</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="rounded-xl p-4 bg-danger/10">
          <div class="flex items-center gap-2 mb-2">
            <svg class="w-4 h-4 text-danger shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
            <p class="text-xs font-bold text-danger">No Senior Citizen ID</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">Senior citizens <strong class="text-tei-blue">cannot apply</strong> for the discount without a valid Senior Citizen ID. Secure your ID first before filing.</p>
        </div>
        <div class="rounded-xl p-4 bg-success/10">
          <div class="flex items-center gap-2 mb-2">
            <svg class="w-4 h-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs font-bold text-success">Same-Day Approval</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">If all requirements are complete, your application is <strong class="text-tei-blue">approved on the same day</strong>. The discount will appear on your next billing statement.</p>
        </div>
        <div class="rounded-xl p-4 bg-warning/10">
          <div class="flex items-center gap-2 mb-2">
            <svg class="w-4 h-4 text-warning shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs font-bold text-warning">Yearly Renewal Required</p>
          </div>
          <p class="text-xs leading-relaxed text-tei-gray">The discount is <strong class="text-tei-blue">not automatic</strong>. You must re-apply every year. Failure to renew means the discount will not be applied to your bill.</p>
        </div>
      </div>
    </div>

  </x-guest-section>

</div>
