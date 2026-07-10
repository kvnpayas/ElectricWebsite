<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Distributed Energy Resources',
      'badgeTitle' => 'Clean Energy',
      'subTitle' => 'ERC Resolution No. 11, Series of 2022 — Rules Governing Distributed Energy Resources (DER). TEI supports the development and utilization of DER to promote energy quality, reliability, and sustainability.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS DER?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <x-guest-intro
      variant="primary"
      label="DER Program"
      title="What are Distributed Energy Resources (DER)?"
      text="Power sources connected to the distribution system or electrical system of the End-Users, that could be aggregated to meet a demand. Distributed Energy Resources refer to a variety of intermediate-scale power generation facilities that supplies electricity to a consumer/End-User, often installed within or close to where the electricity is used. These could also be aggregated/collected to meet or aid a specific electrical demand."
      promptTitle="Legal Basis"
      promptText="ERC Resolution No. 11, Series of 2022 — adopted to encourage DER development and align with EPIRA, the RE Law, and other relevant regulations." />

    {{-- Not Applicable callout --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8 scroll-reveal mt-15">
      <div class="mb-4">
        <p class="text-[10px] font-black text-danger uppercase tracking-[0.18em] mb-1">Not Applicable</p>
        <h4 class="text-sm font-bold text-tei-blue">The DER Program is NOT applicable to the following:</h4>
        <p class="text-xs text-tei-gray-light mt-0.5">These facility types are governed by separate programs and regulations.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach (['Net-Metering Facilities', 'Self-Generating Facilities (SGF)', 'Areas served by Microgrid System Provider (MGSP)', 'Solar Home Systems (SHS)', 'Energy Storage Systems (ESS)', 'Electric Vehicle and Charging Stations', 'DERs that are intended to solely export or sell power to the Grid or Distribution System'] as $item)
          <div class="flex items-center gap-2 rounded-xl px-3 py-2 bg-danger/5 text-xs">
            <svg class="w-3 h-3 text-danger shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="text-tei-gray">{{ $item }}</span>
          </div>
        @endforeach
      </div>
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — PROGRAM + ELIGIBILITY
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

      <x-section-heading
        title="Program Overview"
        variant="success"
        heading="The DER Program & Who May Apply"
        text="The DER Program was initiated by the Energy Regulatory Commission (ERC) through Resolution No. 11, Series of 2022. This aims to encourage the development and utilization of DER, promote energy quality, reliability, security, affordability, and sustainability to align with the objectives of the Electric Power Industry Reform Act of 2001 (EPIRA), RE Law, and other relevant laws, rules, and regulations."
        align="left" />

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards">

        {{-- What is DER Program --}}
        <x-card variant="success">
          <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-4">ERC Resolution No. 11, 2022</p>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">The DER Program</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            Encourages the development and utilization of DER while promoting energy quality, reliability, security,
            affordability, and sustainability. Aligned with <strong class="text-tei-blue">EPIRA (2001)</strong>, the RE
            Law and other relevant laws, rules and regulations.
          </p>
        </x-card>

        {{-- Eligibility Type 1 --}}
        <x-card variant="primary">
          <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-4">Exporting DER</p>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Renewable Energy Export</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            DERs that will utilize <strong class="text-tei-blue">renewable energies</strong> for the End-User's total
            consumption and export energy greater than <strong class="text-tei-blue">100 kW to 1 MW</strong>.
          </p>
          <x-slot:footer>
            <div class="border-l-2 border-warning pl-3">
              <p class="text-xs font-semibold text-warning mb-0.5">Note</p>
              <p class="text-xs text-tei-gray">The capacity limit for facilities that will use Solar Photovoltaic (PV) shall be more than 100 kWp to 1 MWp.</p>
            </div>
          </x-slot:footer>
        </x-card>

        {{-- Eligibility Type 2 --}}
        <x-card variant="primary">
          <p class="text-[10px] font-black text-info uppercase tracking-[0.18em] mb-4">Non-Exporting DER</p>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Supply Only</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            DERs that will <strong class="text-tei-blue">only supply</strong> for the End-User's consumption regardless
            of the generation technology and capacity.
          </p>
          <x-slot:footer>
            <div class="border-l-2 border-warning pl-3">
              <p class="text-xs font-semibold text-warning mb-0.5">Note</p>
              <p class="text-xs text-tei-gray">The DER owner and End-User should not be the same entity.</p>
            </div>
          </x-slot:footer>
        </x-card>

      </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — EXPORT RULES + CAPACITY LIMITS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading
      title="Rules & Limits"
      variant="primary"
      heading="Export Rules & Capacity Limits"
      text="Key regulatory rules governing who may export energy and the allowable capacity of DER installations."
      align="left" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

      <x-card variant="info">
        <p class="text-[10px] font-black text-info uppercase tracking-[0.18em] mb-4">Export Rule</p>
        <h4 class="text-base font-bold mb-2 text-tei-blue">Who May Export Energy?</h4>
        <p class="text-sm leading-relaxed text-tei-gray">
          Only DERs that <strong class="text-tei-blue">utilize renewable energies</strong> shall be allowed to
          export to the distribution system of the Distribution Utility (DU).
        </p>
      </x-card>

      <x-card variant="warning">
        <p class="text-[10px] font-black text-warning uppercase tracking-[0.18em] mb-4">Capacity Limits</p>
        <h4 class="text-base font-bold mb-2 text-tei-blue">Capacity Limits</h4>
        <div class="space-y-2">
          <div class="rounded-xl px-3 py-2.5 bg-tei-orange/10 text-xs">
            <p class="text-tei-gray">For DERs that will utilize renewable energy, the nameplate capacity should be
              <strong class="text-tei-blue">more than 100 kW and should not exceed 1 MW</strong>.
            </p>
            <p class="text-tei-gray-light mt-1 italic">The maximum capacity to export shall not exceed <strong
                class="text-warning">30%</strong> of the nameplate capacity.</p>
          </div>
          <div class="rounded-xl px-3 py-2.5 bg-success/10 text-xs">
            <p class="text-tei-gray">DERs that will only supply for the End-User's consumption shall have <strong
                class="text-success">no capacity limitations</strong>.</p>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 4 — REQUIREMENTS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <x-section-heading
        title="Requirements"
        heading="Administrative Requirements"
        text="Applying for the DER Program involves two sets of administrative requirements — one submitted to TEI (as the Distribution Utility) and another submitted to the ERC."
        align="left" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 stagger-cards">

        {{-- DU Requirements --}}
        <x-card variant="primary">
          <div class="mb-5">
            <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-1">Submit to TEI</p>
            <h4 class="text-sm font-bold text-tei-blue">DU's Administrative Requirements</h4>
            <p class="text-xs text-tei-gray-light mt-0.5">Submit to TEI (Distribution Utility)</p>
          </div>

          {{-- Core requirements --}}
          <div class="space-y-1.5 mb-4">
            @foreach (['Letter of Intent', 'DER Application Form', 'Electrical Plan', 'Electrical Permit', 'Detailed Planning Data', 'Valid IDs of DER owner and End-User'] as $req)
              <div class="flex items-center gap-2 text-xs">
                <svg class="w-3.5 h-3.5 text-tei-blue shrink-0" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-tei-gray">{{ $req }}</span>
              </div>
            @endforeach
          </div>

          {{-- Additional for exporting RE --}}
          <div class="rounded-xl p-3 bg-tei-orange/10 mb-3">
            <p class="text-xs font-bold text-tei-orange mb-2">+ Additional: Exporting DERs using Renewable Energy</p>
            <div class="space-y-1">
              @foreach (['Technical Specifications of RE Facility', 'Certificates of RE Facility'] as $req)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3 h-3 text-tei-orange shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $req }}</span>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Additional for corporations --}}
          <div class="rounded-xl p-3 bg-tei-blue/8">
            <p class="text-xs font-bold text-tei-blue mb-2">+ Additional: Corporations</p>
            <div class="space-y-1">
              @foreach (['SEC Registration', "Secretary's Certificate", 'Valid IDs of Corporate Secretary and Authorized Representative'] as $req)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3 h-3 text-tei-blue shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $req }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </x-card>

        {{-- ERC Requirements --}}
        <x-card variant="info">
          <div class="mb-5">
            <p class="text-[10px] font-black text-info uppercase tracking-[0.18em] mb-1">Submit to ERC</p>
            <h4 class="text-sm font-bold text-tei-blue">ERC's Administrative Requirements</h4>
            <p class="text-xs text-tei-gray-light mt-0.5">Submit to the Energy Regulatory Commission</p>
          </div>

          {{-- Core ERC requirements --}}
          <div class="space-y-1.5 mb-4">
            @foreach (['Application Form (ERC COC Form 1)', 'Distribution Utility (DU) Certification', 'Permit to Operate (PTO) — if applicable'] as $req)
              <div class="flex items-center gap-2 text-xs">
                <svg class="w-3.5 h-3.5 text-info shrink-0" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-tei-gray">{{ $req }}</span>
              </div>
            @endforeach
          </div>

          {{-- Additional for exporting RE --}}
          <div class="rounded-xl p-3 bg-success/10 mb-3">
            <p class="text-xs font-bold text-success mb-2">+ Additional: Exporting DERs using Renewable Energy</p>
            <div class="space-y-1">
              @foreach (['Renewable DER Supply Agreement', 'Management and/or Lease Contract — if applicable'] as $req)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3 h-3 text-success shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $req }}</span>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Additional for non-exporting --}}
          <div class="rounded-xl p-3 bg-info/8">
            <p class="text-xs font-bold text-info mb-2">+ Additional: Non-Exporting DERs</p>
            <div class="space-y-1">
              @foreach (['Company Profile (ERC COC Form 2)', 'Environmental Compliance Certificate (ECC) — if applicable'] as $req)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3 h-3 text-info shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $req }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </x-card>

      </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 5 — HOW TO APPLY
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading
      title="Application Process"
      heading="How to Apply for the DER Program"
      align="left" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards mb-8">

      {{-- Step 1: Submit to TEI --}}
      <x-card variant="primary">
        <div class="flex items-start justify-between mb-5">
          <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
          <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">01</span>
        </div>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to TEI (Distribution Utility)</h4>
        <p class="text-xs leading-relaxed mb-3 text-tei-gray">
          Upon submission of the complete Administrative Requirements to the DU (TEI), the necessary technical
          processes for the issuance of the <strong class="text-tei-blue">DU Certification</strong> will be conducted,
          facilitated, and witnessed by the DU.
        </p>
        <div class="space-y-1.5">
          @foreach (['Distribution Impact Study', 'Distribution Assessment Study (if applicable)', 'DER Facility Testing and Commissioning', 'Power Quality Test'] as $process)
            <div class="flex items-center gap-2 text-xs">
              <svg class="w-3.5 h-3.5 text-tei-blue shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <span class="text-tei-gray">{{ $process }}</span>
            </div>
          @endforeach
        </div>
      </x-card>

      {{-- Step 2: Submit to ERC --}}
      <x-card variant="info">
        <div class="flex items-start justify-between mb-5">
          <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
          <span class="text-5xl font-black leading-none select-none" style="color: rgba(14,165,233,0.1);">02</span>
        </div>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to the ERC</h4>
        <p class="text-xs leading-relaxed text-tei-gray">
          Upon receipt of the <strong class="text-tei-blue">DU Certification from TEI</strong>, the applicant may
          proceed with the submission and processing of their DER Program application to the Energy Regulatory
          Commission (ERC).
        </p>
      </x-card>

    </div>

    {{-- Contact --}}
    @php
      $primaryPhone = $phones->firstWhere('is_primary', true) ?? $phones->first();
    @endphp
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div>
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-1">Contact Us</p>
        <h4 class="text-sm font-bold text-tei-blue mb-2">For Questions &amp; More Information</h4>
        <p class="text-xs leading-relaxed text-tei-gray mb-3">To learn more about the DER Program, you may visit us at our Main Office ({{ $address }}), message us through our Facebook page (<a href="{{ $facebookUrl->url ?? '#' }}" target="_blank" rel="noopener"
              class="font-semibold text-tei-orange transition-colors duration-150 hover:text-tei-orange-dark">@tei.ph</a>), or contact us at {{ $primaryPhone->number }}.</p>
        <div class="flex flex-wrap gap-x-5 gap-y-1 text-xs">
          <span class="font-semibold text-tei-blue">Main Office: Mabini Street, Brgy. Mabini, Tarlac City</span>
          <span class="text-tei-gray">Hotline: {{ $primaryPhone->number }}</span>
          <span class="text-tei-gray">Facebook: <a href="{{ $facebookUrl->url ?? '#' }}" target="_blank" rel="noopener"
              class="font-semibold text-tei-orange transition-colors duration-150 hover:text-tei-orange-dark">@tei.ph</a></span>
        </div>
      </div>
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 6 — HOSTING CAPACITY TABLES
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <x-section-heading
        title="Reference Data"
        variant="primary"
        heading="TEI Hosting Capacity for DER"
        :text="$this->asOfLabel"
        align="left" />

      <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 stagger-cards">

        {{-- Per Feeder Table --}}
        <div>
          <h3 class="text-sm font-bold text-tei-blue mb-4">Per Feeder Hosting Capacity</h3>
          <x-guest-table
              col1="Feeder"
              col2="Max Capacity (kW)"
              :rows="$this->feederRows"
              :dense="true" />
        </div>

        {{-- Per Substation Table --}}
        <div>
          <h3 class="text-sm font-bold text-tei-blue mb-4">Per Substation Hosting Capacity</h3>
          <x-guest-table
              col1="Substation"
              col2="Max Capacity (kW)"
              :rows="$this->substationRows" />

          {{-- Footnote --}}
          <p class="mt-4 text-xs leading-relaxed text-tei-gray-light italic">
            These values serve as preliminary reference limits for the assessment of DER applications. Final approval
            shall be based on the outcomes of the technical evaluation, ensuring compliance with TEI's operational
            reliability, safety standards, and overall network performance.
          </p>
        </div>

      </div>

    </div>
  </section>

</div>
