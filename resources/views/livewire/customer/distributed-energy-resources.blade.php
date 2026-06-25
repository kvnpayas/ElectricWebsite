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
    <div
      class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">What are Distributed Energy Resources (DER)?</h3>
          <div class="space-y-2 mb-3">
            <p class="text-sm leading-relaxed text-tei-gray">
              <strong class="text-tei-blue">Definition 1:</strong> Power sources connected to the distribution system or
              electrical system of the End-Users, that could be aggregated to meet a demand.
            </p>
            {{-- <p class="text-sm leading-relaxed text-tei-gray">
              <strong class="text-tei-blue">Definition 2:</strong> A variety of intermediate-scale power generation facilities that supply electricity to a consumer/End-User, often installed within or close to where the electricity is used. These could also be aggregated to meet or aid a specific electrical demand.
            </p> --}}
            <p class="text-sm leading-relaxed text-tei-gray">
              <strong class="text-tei-blue">Definition 2:</strong> Distributed Energy Resources refer to a variety of
              intermediate-scale power generation facilities that supplies electricity to a consumer/End-User, often
              installed within or close to where the electricity is used. These could also be aggregated/collected to
              meet or aid a specific electrical demand.
            </p>
          </div>
          <div class="flex items-start gap-2 rounded-xl px-4 py-3 text-sm bg-tei-orange/10 border border-tei-orange/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs text-tei-orange-dark">
              <strong>Legal Basis:</strong> ERC Resolution No. 11, Series of 2022 — adopted to encourage DER development
              and align with EPIRA, the RE Law, and other relevant regulations.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Not Applicable callout --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8 scroll-reveal">
      <div class="flex items-start gap-3 mb-4">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-danger/10">
          <svg class="w-4 h-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
          </svg>
        </div>
        <div>
          <h4 class="text-sm font-bold text-tei-blue">The DER Program is NOT applicable to the following:</h4>
          <p class="text-xs text-tei-gray-light mt-0.5">These facility types are governed by separate programs and
            regulations.</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach (['Net-Metering Facilities', 'Self-Generating Facilities (SGF)', 'Areas served by Microgrid System Provider (MGSP)', 'Solar Home Systems (SHS)', 'Energy Storage Systems (ESS)', 'Electric Vehicle and Charging Stations', 'DERs intended solely to export or sell power to the Grid'] as $item)
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
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-success/10 text-success">
          Program Overview
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">The DER Program &amp; Who May Apply</h2>
        {{-- <p class="text-sm max-w-2xl text-tei-gray">
          Initiated by the ERC, the program aims to encourage development of distributed energy and promote energy quality, reliability, and sustainability across all customer types.
        </p> --}}
        <p class="text-sm max-w-2xl text-tei-gray">
          The DER was initiated by the Energy Regulatory Commission (ERC) through Resolution No. 11, Series of 2022.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards">

        {{-- What is DER Program --}}
        <x-card variant="success">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-success/10">
            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9" />
            </svg>
          </div>
          <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success mb-2 inline-block">ERC
            Resolution No. 11, 2022</span>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">The DER Program</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            Encourages the development and utilization of DER while promoting energy quality, reliability, security,
            affordability, and sustainability. Aligned with <strong class="text-tei-blue">EPIRA (2001)</strong>, the RE
            Law and other relevant laws, rules and regulations.
          </p>
        </x-card>

        {{-- Eligibility Type 1 --}}
        <x-card variant="primary">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-tei-blue/10">
            <svg class="w-5 h-5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <span
            class="text-xs font-bold px-2 py-0.5 rounded-full bg-tei-orange/10 text-tei-orange mb-2 inline-block">Exporting
            DER</span>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Renewable Energy Export</h4>
          <p class="text-xs leading-relaxed mb-3 text-tei-gray">
            DERs utilizing <strong class="text-tei-blue">renewable energies</strong> for the End-User's total
            consumption AND exporting energy greater than <strong class="text-tei-blue">100 kW to 1 MW</strong>.
          </p>
          <div class="rounded-xl px-3 py-2 bg-warning/10 text-xs text-tei-gray">
            {{-- <strong class="text-tei-blue">Solar PV note:</strong> Capacity shall be more than 100 kWp to 1 MWp. --}}
            <strong class="text-warning">Note:</strong> The capacity limit for facilities that will use Solar
            Photovoltaic (PV) shall be more than 100 kWp to 1 MWp
          </div>
        </x-card>

        {{-- Eligibility Type 2 --}}
        <x-card variant="primary">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-tei-blue/10">
            <svg class="w-5 h-5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
          </div>
          <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-info/10 text-info mb-2 inline-block">Non-Exporting
            DER</span>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Supply Only</h4>
          <p class="text-xs leading-relaxed mb-3 text-tei-gray">
            DERs that will <strong class="text-tei-blue">only supply</strong> for the End-User's consumption, regardless
            of generation technology and capacity.
          </p>
          <div class="rounded-xl px-3 py-2 bg-warning/10 text-xs text-tei-gray">
            <strong class="text-warning">Note:</strong> The DER owner and End-User should not be the same entity.
          </div>
        </x-card>

      </div>

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — EXPORT RULES + CAPACITY LIMITS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-12 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-blue/10 text-tei-blue">
        Rules &amp; Limits
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Export Rules &amp; Capacity Limits</h2>
      <p class="text-sm max-w-2xl text-tei-gray">Key regulatory rules governing who may export energy and the allowable
        capacity of DER installations.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

      <x-card variant="info">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-info/10">
            <svg class="w-5 h-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
            </svg>
          </div>
          <div>
            <h4 class="text-base font-bold mb-2 text-tei-blue">Who May Export Energy?</h4>
            <p class="text-sm leading-relaxed mb-3 text-tei-gray">
              Only DERs that <strong class="text-tei-blue">utilize renewable energies</strong> shall be allowed to
              export to the distribution system of the Distribution Utility (DU).
            </p>
            {{-- <div class="flex items-center gap-2 rounded-xl px-3 py-2.5 bg-info/10 text-xs">
              <svg class="w-3.5 h-3.5 text-info shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span class="text-tei-gray">Renewable energy DERs only — non-renewable DERs may not export.</span>
            </div> --}}
          </div>
        </div>
      </x-card>

      <x-card variant="warning">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-warning/10">
            <svg class="w-5 h-5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
          </div>
          <div>
            <h4 class="text-base font-bold mb-2 text-tei-blue">Capacity Limits</h4>
            <div class="space-y-2">
              <div class="rounded-xl px-3 py-2.5 bg-tei-orange/10 text-xs">
                {{-- <p class="font-semibold text-tei-blue mb-0.5">Renewable Energy DERs</p> --}}
                {{-- <p class="text-tei-gray">Nameplate capacity: <strong class="text-tei-blue">more than 100 kW, not exceeding 1 MW</strong>.</p> --}}
                <p class="text-tei-gray">For DERs that will utilize renewable energy, the nameplate capacity should be
                  <strong class="text-tei-blue">more than 100 kW and should not exceed 1 MW</strong>.
                </p>
                {{-- <p class="text-tei-gray-light mt-1 italic">Max export capacity shall not exceed <strong class="text-warning">30%</strong> of the nameplate capacity.</p> --}}
                <p class="text-tei-gray-light mt-1 italic">The maximum capacity to export shall not exceed <strong
                    class="text-warning">30%</strong> of the nameplate capacity.</p>
              </div>
              <div class="rounded-xl px-3 py-2.5 bg-success/10 text-xs">
                {{-- <p class="font-semibold text-tei-blue mb-0.5">Non-Exporting (Supply Only) DERs</p> --}}
                {{-- <p class="text-tei-gray"><strong class="text-success">No capacity limitations</strong> for DERs that only supply the End-User's consumption.</p> --}}
                <p class="text-tei-gray">DERs that will only supply for the End-User's consumption shall have <strong
                    class="text-success">no capacity limitations</strong> </p>
              </div>
            </div>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 4 — REQUIREMENTS
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Requirements
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Administrative Requirements</h2>
        <p class="text-sm max-w-2xl text-tei-gray">
          Applying for the DER Program involves two sets of administrative requirements — one submitted to TEI (as the
          Distribution Utility) and another submitted to the ERC.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 stagger-cards">

        {{-- DU Requirements --}}
        <x-card variant="primary">
          <div class="flex items-center gap-3 mb-5">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9" />
              </svg>
            </div>
            <div>
              <h4 class="text-sm font-bold text-tei-blue">DU's Administrative Requirements</h4>
              <p class="text-xs text-tei-gray-light">Submit to TEI (Distribution Utility)</p>
            </div>
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
          <div class="flex items-center gap-3 mb-5">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-info/10">
              <svg class="w-4 h-4 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div>
              <h4 class="text-sm font-bold text-tei-blue">ERC's Administrative Requirements</h4>
              <p class="text-xs text-tei-gray-light">Submit to the Energy Regulatory Commission</p>
            </div>
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

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 5 — HOW TO APPLY
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-12 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
        Application Process
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">How to Apply for the DER Program</h2>
      {{-- <p class="text-sm max-w-2xl text-tei-gray">
        The application process involves a two-step procedure — first through TEI, then through the ERC.
      </p> --}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards mb-8">

      {{-- Step 1: Submit to TEI --}}
      <x-card variant="primary">
        <div class="flex items-start gap-4">
          <div
            class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10 text-tei-blue font-black text-sm">
            01
          </div>
          <div class="flex-1">
            <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to TEI (Distribution Utility)</h4>
            {{-- <p class="text-xs leading-relaxed mb-3 text-tei-gray">
              Upon submission of the complete DU Administrative Requirements to TEI, the following technical processes will be conducted, facilitated, and witnessed by TEI for the issuance of the <strong class="text-tei-blue">DU Certification</strong>:
            </p> --}}
            <p class="text-xs leading-relaxed mb-3 text-tei-gray">
              Upon submission of the complete Administrative Requirements to the DU (TEI), the necessary technical
              processes for the issuance <strong class="text-tei-blue">DU Certification</strong> will be conducted,
              facilitated and witnessed by the DU.
            </p>
            <div class="space-y-1.5">
              @foreach (['Distribution Impact Study', 'Distribution Assessment Study (if applicable)', 'DER Facility Testing and Commissioning', 'Power Quality Test'] as $process)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3.5 h-3.5 text-tei-blue shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $process }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </x-card>

      {{-- Step 2: Submit to ERC --}}
      <x-card variant="info">
        <div class="flex items-start gap-4">
          <div
            class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-info/10 text-info font-black text-sm">
            02
          </div>
          <div class="flex-1">
            <h4 class="text-sm font-bold mb-2 text-tei-blue">Submit to the ERC</h4>
            <p class="text-xs leading-relaxed text-tei-gray">
              Upon receipt of the <strong class="text-tei-blue">DU Certification from TEI</strong>, the applicant may
              proceed with the submission and processing of their DER Program application to the Energy Regulatory
              Commission (ERC).
            </p>
          </div>
        </div>

        {{-- <x-slot:footer>
          <div class="flex items-center gap-2 rounded-xl px-3 py-2.5 bg-success/10 text-xs">
            <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-tei-gray">TEI certification required before ERC application can proceed.</span>
          </div>
        </x-slot:footer> --}}
      </x-card>

    </div>

    {{-- Contact --}}
    <div class="rounded-2xl p-5 sm:p-6 bg-tei-surface border border-tei-blue/8 scroll-reveal">
      <div class="flex items-start gap-3">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
          <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div>
          <h4 class="text-sm font-bold text-tei-blue mb-1">For Questions &amp; More Information</h4>
          <p class="text-xs leading-relaxed text-tei-gray mb-2">To learn more about the DER Program, you may reach TEI
            through any of the following:</p>
          <div class="flex flex-wrap gap-x-5 gap-y-1 text-xs">
            <span class="font-semibold text-tei-blue">Main Office: Mabini St.,
              Tarlac City</span>
            <span class="text-tei-gray">Hotline: (045) 606-1834</span>
            <span class="text-tei-gray">Facebook: @tei.ph</span>
          </div>
        </div>
      </div>
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 6 — HOSTING CAPACITY TABLES
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-10 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-blue/10 text-tei-blue">
          Reference Data
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-1 text-tei-blue">TEI Hosting Capacity for DER</h2>
        <p class="text-sm text-tei-gray-light">As of March 31, 2026</p>
      </div>

      <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 stagger-cards">

        {{-- Per Feeder Table --}}
        <div>
          <div class="flex items-center gap-2 mb-4">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center bg-tei-orange/10">
              <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <h3 class="text-sm font-bold text-tei-blue">Per Feeder Hosting Capacity</h3>
          </div>
          <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white">
            <div class="grid grid-cols-2 bg-tei-blue px-5 py-3">
              <p class="text-xs font-bold text-white/80 uppercase tracking-wider">Feeder</p>
              <p class="text-xs font-bold text-white/80 uppercase tracking-wider text-right">Max Capacity (kW)</p>
            </div>
            @php
              $feeders = [
                  ['LIPIEWP', '2,011'],
                  ['LIPLINE', '4,400'],
                  ['LIPSSMP', '2,874'],
                  ['LIPIWSPC', '2,569'],
                  ['LIPSNMGL', '2,200'],
                  ['LIPHACIENDA', '2,100'],
                  ['SANRAFARMENIA', 'Two (2) embedded plants — 7.1 MW &amp; 2 MW'],
                  ['SANRAFSMBINAUGANAN', '3,024'],
                  ['SANRAFNORTH', '2,759'],
                  ['SANRAFNORHILLS', '1,200'],
                  ['SANRAFSOUTH', '2,400'],
                  ['MALGETHA', '1,253'],
                  ['MALJOSE', '2,016'],
                  ['MALGLOBE', '2,306'],
                  ['MALAMU', '2,978'],
                  ['PANGHIWAY', '3,400'],
                  ['PANGSCRUZ', 'One (1) embedded plant — 5.5 MW'],
                  ['PANGNASI', 'Loads → San Vicente FDR1'],
                  ['PANGSANVIC', 'Loads → San Vicente FDR2'],
                  ['PANGPOB', '3,708'],
                  ['PANGSSV', 'FOR N-1'],
                  ['TPCFDR 1', '2,700'],
                  ['TPCFDR 2', '2,700'],
                  ['San Vicente FDR1', '2,500'],
                  ['San Vicente FDR2', '1,100'],
                  ['San Vicente FDR3', '2,400'],
                  ['San Vicente FDR4', '1,700'],
                  ['San Vicente FDR5', '2,500'],
              ];
            @endphp
            @foreach ($feeders as [$feeder, $cap])
              @php $isNote = !is_numeric(str_replace([',', ' '], '', $cap)); @endphp
              <div
                class="grid grid-cols-2 px-5 py-3 border-b border-tei-blue/6 last:border-0 {{ $loop->even ? 'bg-tei-surface' : 'bg-white' }}">
                <p class="text-xs font-semibold text-tei-blue">{{ $feeder }}</p>
                <p
                  class="text-xs text-right {{ $isNote ? 'text-tei-gray-light italic' : 'font-black text-tei-orange' }}">
                  {!! $cap !!}</p>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Per Substation Table --}}
        <div>
          <div class="flex items-center gap-2 mb-4">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center bg-tei-blue/10">
              <svg class="w-3.5 h-3.5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9" />
              </svg>
            </div>
            <h3 class="text-sm font-bold text-tei-blue">Per Substation Hosting Capacity</h3>
          </div>
          <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white">
            <div class="grid grid-cols-2 bg-tei-blue px-5 py-3">
              <p class="text-xs font-bold text-white/80 uppercase tracking-wider">Substation</p>
              <p class="text-xs font-bold text-white/80 uppercase tracking-wider text-right">Max Capacity (kW)</p>
            </div>
            @foreach ([['LIP Substation', '16,154'], ['San Rafael Substation', '9,383'], ['Maliwalo Substation', '8,554'], ['Panganiban Substation', '7,108'], ['TPC Substation', '5,400'], ['San Vicente Substation', '10,200']] as [$sub, $cap])
              <div
                class="grid grid-cols-2 px-5 py-4 border-b border-tei-blue/6 last:border-0 {{ $loop->even ? 'bg-tei-surface' : 'bg-white' }}">
                <p class="text-sm font-semibold text-tei-blue">{{ $sub }}</p>
                <p class="text-sm font-black text-tei-orange text-right">{{ $cap }}</p>
              </div>
            @endforeach
          </div>

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
