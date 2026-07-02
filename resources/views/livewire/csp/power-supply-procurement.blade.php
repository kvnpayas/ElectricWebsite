<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Power Supply Procurement',
      'badgeTitle' => 'Competitive Selection Process',
      'subTitle'   => 'Latest Power Supply Procurement Plan (PSPP) of TEI and information on ongoing and completed bids.',
  ])


  {{-- ═══════════════════════════════════════════════
     MAIN CONTENT
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- INTRO --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-12 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="space-y-4 text-sm leading-relaxed text-tei-gray">
        <p>The conduct of CSP is governed by DOE Department Circular No. DC2023-06-0021 entitled <em>"Prescribing the Policy of the Mandatory Conduct of the Competitive Selection Process by the Distribution Utilities for the Procurement of Power Supply for their Captive Market"</em> and ERC Resolution No. 16, Series of 2023 entitled <em>"Implementing Guidelines for the Procurement, Execution, and Evaluation of Power Supply Agreements Entered into by Distribution Utilities for the Supply of Electricity to their Captive Market"</em>, which took effect on 19 July 2023 and 23 October 2023, respectively.</p>
        <p>This site contains the latest Power Supply Procurement Plan (PSPP) of TEI and information on ongoing bids.</p>
        <p>For inquiries, kindly email the BAC-Secretariat of TEI's Bids and Awards Committee for power supply agreements at
          <a href="mailto:bac-secretariat@teiph.com" class="text-tei-orange font-semibold hover:underline">bac-secretariat@teiph.com</a>.
        </p>
      </div>
    </div>


    {{-- ═══ BID ENTRIES ═══ --}}
    <div class="space-y-8">


      {{-- ─────────────────────────────────────────────
         ENTRY 1 — TEI-CSP-OT-2025-001 (Ongoing)
      ───────────────────────────────────────────── --}}
      <div class="rounded-2xl border border-tei-blue/10 border-l-4 border-l-success bg-white overflow-hidden scroll-reveal"
           style="box-shadow: 0 2px 12px rgba(15,61,92,0.06);">

        {{-- Card header --}}
        <div class="px-6 py-5 border-b border-tei-blue/8">
          <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="inline-flex text-xs font-bold px-3 py-1 rounded-full font-mono tracking-wide bg-tei-blue/8 text-tei-blue">
              TEI-CSP-OT-2025-001
            </span>
            <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full bg-success/10 text-success">
              <span class="size-1.5 rounded-full bg-success"></span>
              Ongoing
            </span>
            <span class="text-xs text-tei-gray-light sm:ml-auto">Posted: 02 Sep 2025</span>
          </div>
          <h2 class="text-lg sm:text-xl font-black text-tei-blue leading-snug">
            BASELOAD POWER SUPPLY TO THE CAPTIVE MARKET OF TEI
          </h2>
        </div>

        {{-- Card body --}}
        <div class="px-6 py-6 space-y-8">

          {{-- Contract details --}}
          <div class="rounded-xl overflow-hidden border border-tei-blue/8">
            @foreach ([
                ['Contract Capacity',                '10MW Supply from 26 December 2026 to 25 December 2041 with escalation in contracted capacity.'],
                ['Contract Term',                    '15 Years'],
                ['Date of Publication',              '02 September 2025'],
                ['1st Pre-bid Conference',           '19 September 2025'],
                ['2nd Pre-bid Conference',           '26 September 2025'],
                ['Expression of Interest Deadline',  '23 September 2025'],
                ['CSP Bid Opening',                  '21 November 2025'],
            ] as [$label, $value])
              <div class="flex gap-4 px-4 py-3 border-b border-tei-blue/6 last:border-0 odd:bg-tei-surface even:bg-white">
                <span class="text-xs font-bold text-tei-blue-dark shrink-0 w-52">{{ $label }}</span>
                <span class="text-xs text-tei-gray">{{ $value }}</span>
              </div>
            @endforeach
          </div>

          {{-- Contracted capacity schedule --}}
          <div>
            <p class="text-xs font-bold text-tei-blue uppercase tracking-widest mb-3">Contracted Capacity Schedule</p>
            <x-guest-table
                :headers="['Period From', 'Period To', 'Contracted Capacity (MW)']"
                :alignments="['left', 'left', 'center']"
                :rows="[
                    ['26-Dec-26', '25-Dec-27', '10'],
                    ['26-Dec-27', '25-Dec-28', '15'],
                    ['26-Dec-28', '25-Dec-31', '20'],
                    ['26-Dec-31', '25-Dec-41', '25'],
                ]"
                :highlight="false"
                :dense="true" />
          </div>

          {{-- Updates --}}
          <div>
            <p class="text-xs font-bold text-tei-blue uppercase tracking-widest mb-3">Updates</p>
            <div class="space-y-2">
              @foreach ([
                  ['26 Dec 2025', 'Notice of Award'],
                  ['06 Jan 2026', 'Erratum: Notice of Award'],
              ] as [$date, $label])
                <div class="flex items-center gap-3 rounded-xl px-4 py-2.5 bg-tei-surface">
                  <span class="text-xs text-tei-gray-light shrink-0 w-24">{{ $date }}</span>
                  <a href="#"
                     class="text-xs font-semibold text-tei-orange hover:underline flex-1">
                    {{ $label }}
                  </a>
                  <svg class="w-3.5 h-3.5 text-tei-orange shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Documents --}}
          <div>
            <p class="text-xs font-bold text-tei-blue uppercase tracking-widest mb-3">Documents</p>
            <div class="flex flex-wrap gap-2">
              @foreach ([
                  'Certification of Conformity (DOE-EPIMB-COC-2025-08-008)',
                  'Notification Regarding the Conduct of the Competitive Selection Process [TEI-CSP-OT-2025-001-R1]',
                  'Invitation to Bid (ITB) – 1st Round [02 September 2025]',
                  'Expression of Interest (EOI) – 1st Round (02 September 2025)',
                  'Non-Disclosure Undertaking (NDU) – 1st Round (02 September 2025)',
              ] as $doc)
                <a href="#"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors duration-150 bg-tei-blue/6 text-tei-blue hover:bg-tei-blue/12">
                  <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  {{ $doc }}
                </a>
              @endforeach
            </div>
          </div>

          {{-- Bid bulletins --}}
          <div>
            <p class="text-xs font-bold text-tei-blue uppercase tracking-widest mb-3">Bid Bulletins</p>
            <div class="flex flex-wrap gap-2">
              @foreach (['No. 01', 'No. 02', 'No. 03', 'No. 04', 'No. 05', 'No. 06'] as $bb)
                <a href="#"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors duration-150 bg-tei-orange/8 text-tei-orange hover:bg-tei-orange/16">
                  <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  Bid Bulletin {{ $bb }}
                </a>
              @endforeach
            </div>
          </div>

        </div>
      </div>


      {{-- ─────────────────────────────────────────────
         ENTRY 2 — TEI-CSP-RE-2025-001 (Failed)
      ───────────────────────────────────────────── --}}
      <div class="rounded-2xl border border-tei-blue/10 border-l-4 border-l-danger bg-white overflow-hidden scroll-reveal"
           style="box-shadow: 0 2px 12px rgba(15,61,92,0.06);">

        {{-- Card header --}}
        <div class="px-6 py-5 border-b border-tei-blue/8">
          <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="inline-flex text-xs font-bold px-3 py-1 rounded-full font-mono tracking-wide bg-tei-blue/8 text-tei-blue">
              TEI-CSP-RE-2025-001
            </span>
            <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full bg-danger/10 text-danger">
              <span class="size-1.5 rounded-full bg-danger"></span>
              Failed
            </span>
            <span class="text-xs text-tei-gray-light sm:ml-auto">Posted: 28 Apr 2025</span>
          </div>
          <h2 class="text-lg sm:text-xl font-black text-tei-blue leading-snug">
            SUPPLY OF RENEWABLE ENERGY TO TEI
          </h2>
        </div>

        {{-- Card body --}}
        <div class="px-6 py-6 space-y-8">

          {{-- Contract details --}}
          <div class="rounded-xl overflow-hidden border border-tei-blue/8">
            @foreach ([
                ['Contract Capacity',                '10,000 kW'],
                ['Contract Term',                    '10 Years'],
                ['Date of Publication',              '28 April 2025'],
                ['Pre-bid Conference',               '09 May 2025'],
                ['Expression of Interest Deadline',  '15 May 2025'],
                ['Bid Submission Deadline',          '24 June 2025'],
            ] as [$label, $value])
              <div class="flex gap-4 px-4 py-3 border-b border-tei-blue/6 last:border-0 odd:bg-tei-surface even:bg-white">
                <span class="text-xs font-bold text-tei-blue-dark shrink-0 w-52">{{ $label }}</span>
                <span class="text-xs text-tei-gray">{{ $value }}</span>
              </div>
            @endforeach
          </div>

          {{-- Documents --}}
          <div>
            <p class="text-xs font-bold text-tei-blue uppercase tracking-widest mb-3">Documents</p>
            <div class="flex flex-wrap gap-2">
              @foreach ([
                  'Notification on Failure of Bidding and Start of 2nd Round of CSP on 28 April 2025',
                  'Invitation to Bid (ITB) – 2nd Round (28 April 2025)',
                  'Expression of Interest (EOI) – 2nd Round (28 April 2025)',
                  'Non-Disclosure Undertaking (NDU) – 2nd Round (28 April 2025)',
                  'Terms of Reference (TOR) – 2nd Round (28 April 2025)',
                  'Contract Specifications – 2nd Round (28 April 2025)',
              ] as $doc)
                <a href="#"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors duration-150 bg-tei-blue/6 text-tei-blue hover:bg-tei-blue/12">
                  <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  {{ $doc }}
                </a>
              @endforeach
            </div>
          </div>

        </div>
      </div>

    </div>
  </x-guest-section>

</div>
