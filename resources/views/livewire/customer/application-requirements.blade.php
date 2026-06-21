<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Application Requirements',
      'badgeTitle' => 'Service Application',
      'subTitle'   => 'Obtain the following requirements before visiting the City Engineer\'s Office (CEO). Make sure all documents are complete to avoid delays in processing.',
  ])


  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-1.5 text-tei-blue">New Connection Application Requirements</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            The following requirements are for <strong class="text-tei-blue">new electric service connections</strong>. Requirements are grouped into Technical, Administrative, and Additional categories depending on your applicant type. Ensure all documents are original or certified true copies where required.
          </p>
        </div>
      </div>
    </div>


    {{-- ── TWO-COLUMN LAYOUT ─────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 stagger-cards">

      {{-- LEFT COLUMN (Technical + Administrative) --}}
      <div class="lg:col-span-3 space-y-6">

        {{-- ── TECHNICAL REQUIREMENTS ───────────────────── --}}
        <div class="scroll-reveal rounded-2xl overflow-hidden border border-tei-blue/8 bg-white" style="box-shadow: 0 2px 12px rgba(15,61,92,0.05);">
          {{-- Panel header --}}
          <div class="flex items-center gap-3 px-5 py-4 border-b border-tei-blue/8" style="background: linear-gradient(135deg, rgba(15,61,92,0.04), rgba(15,61,92,0.01));">
            <div class="w-8 h-8 rounded-lg bg-tei-blue/10 flex items-center justify-center shrink-0">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-tei-blue">Technical Requirements</h2>
              <p class="text-[11px] text-tei-gray-light mt-0.5">Must be installed prior to connection</p>
            </div>
          </div>
          {{-- Items --}}
          <div class="divide-y divide-tei-blue/5">
            @foreach ([
              'Electrical Wiring Installation',
              'Circuit Breakers',
              'Service Entrance',
              'Bunk House (if under construction)',
            ] as $item)
              <div class="flex items-center gap-3 px-5 py-3.5">
                <svg class="w-4 h-4 shrink-0 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm text-tei-gray">{{ $item }}</span>
              </div>
            @endforeach
          </div>
        </div>


        {{-- ── ADMINISTRATIVE REQUIREMENTS ──────────────── --}}
        <div class="scroll-reveal rounded-2xl overflow-hidden border border-tei-blue/8 bg-white" style="box-shadow: 0 2px 12px rgba(15,61,92,0.05);">
          {{-- Panel header --}}
          <div class="flex items-center gap-3 px-5 py-4 border-b border-tei-blue/8" style="background: linear-gradient(135deg, rgba(15,61,92,0.04), rgba(15,61,92,0.01));">
            <div class="w-8 h-8 rounded-lg bg-tei-blue/10 flex items-center justify-center shrink-0">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-tei-blue">Administrative Requirements</h2>
              <p class="text-[11px] text-tei-gray-light mt-0.5">Documents required for all applicants</p>
            </div>
          </div>

          {{-- Item 1 --}}
          <div class="flex items-start gap-3 px-5 py-3.5 border-b border-tei-blue/5">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm text-tei-gray">TEI Customer Information Form</span>
          </div>

          {{-- Item 2 --}}
          <div class="flex items-start gap-3 px-5 py-3.5 border-b border-tei-blue/5">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm text-tei-gray">Service Connection Permit (Electric Meter Connection)</span>
          </div>

          {{-- Item 3 — Proof of Ownership with sub-items --}}
          <div class="px-5 py-3.5 border-b border-tei-blue/5">
            <div class="flex items-start gap-3 mb-2">
              <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div>
                <p class="text-sm text-tei-gray font-medium">Proof of Ownership / Occupancy</p>
                <p class="text-xs text-tei-gray-light mt-0.5">Transfer Certificate of Title, Deed of Sale, Waiver of Rights, Contract of Lease, or other related documents</p>
              </div>
            </div>
            {{-- Informal Settlers sub-group --}}
            <div class="ml-7 mt-3 rounded-xl border border-tei-blue/10 bg-tei-blue/2 overflow-hidden">
              <div class="px-3 py-2 border-b border-tei-blue/8">
                <p class="text-[11px] font-bold uppercase tracking-wide text-tei-blue">For Informal Settlers</p>
              </div>
              <div class="divide-y divide-tei-blue/6">
                <div class="flex items-start gap-2.5 px-3 py-2.5">
                  <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-blue/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <p class="text-xs text-tei-gray leading-relaxed">Proof of right to occupy the premises issued by the authorized individual or local government unit or entity</p>
                </div>
                <div class="flex items-start gap-2.5 px-3 py-2.5">
                  <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-blue/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                  <p class="text-xs text-tei-gray leading-relaxed">Affidavit of Undertaking <span class="text-tei-gray-light">(to be provided by TEI)</span></p>
                </div>
              </div>
            </div>
          </div>

          {{-- Item 4 --}}
          <div class="flex items-start gap-3 px-5 py-3.5 border-b border-tei-blue/5">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm text-tei-gray">Electrical Plan / Load Schedule</span>
          </div>

          {{-- Item 5 — Valid IDs --}}
          <div class="px-5 py-3.5">
            <div class="flex items-start gap-3 mb-2">
              <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-sm text-tei-gray font-medium">Two (2) Valid IDs — any of the following:</p>
            </div>
            <div class="ml-7 flex flex-wrap gap-1.5">
              @foreach ([
                "Driver's License", "Passport", "PRC License", "SSS ID", "GSIS ID",
                "Senior Citizen's ID", "TIN ID", "Postal ID",
                "COMELEC Voter's ID", "Voter's Certification", "Original NBI Clearance",
              ] as $id)
                <span class="px-2.5 py-1 rounded-full text-[11px] font-medium bg-tei-blue/6 text-tei-blue border border-tei-blue/10">{{ $id }}</span>
              @endforeach
            </div>
          </div>

        </div>

      </div>


      {{-- RIGHT COLUMN (Additional Requirements) --}}
      <div class="lg:col-span-2">
        <div class="scroll-reveal rounded-2xl overflow-hidden border border-tei-orange/15 bg-white sticky top-24" style="box-shadow: 0 2px 12px rgba(231,103,39,0.07);">

          {{-- Panel header --}}
          <div class="flex items-center gap-3 px-5 py-4 border-b border-tei-orange/12" style="background: linear-gradient(135deg, rgba(231,103,39,0.05), rgba(231,103,39,0.01));">
            <div class="w-8 h-8 rounded-lg bg-tei-orange/10 flex items-center justify-center shrink-0">
              <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
              </svg>
            </div>
            <div>
              <h2 class="text-sm font-bold text-tei-blue">Additional Requirements</h2>
              <p class="text-[11px] text-tei-gray-light mt-0.5">Based on your applicant type</p>
            </div>
          </div>

          {{-- For Duly-Authorized Representatives --}}
          <div class="px-5 pt-4 pb-3 border-b border-tei-orange/8">
            <p class="text-[11px] font-bold uppercase tracking-wider text-tei-orange mb-2.5">For Duly-Authorized Representatives of Owners</p>
            <div class="space-y-2">
              @foreach ([
                'Duly notarized authorization to sign contracts with TEI',
                'Valid ID of Authorized Representative',
              ] as $item)
                <div class="flex items-start gap-2.5">
                  <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $item }}</p>
                </div>
              @endforeach
            </div>
          </div>

          {{-- For Tenants --}}
          <div class="px-5 pt-4 pb-3 border-b border-tei-orange/8">
            <p class="text-[11px] font-bold uppercase tracking-wider text-tei-orange mb-2.5">For Tenants</p>
            <div class="space-y-2">
              @foreach ([
                'Undertaking from the Property Owner',
                'Valid ID of Property Owner',
              ] as $item)
                <div class="flex items-start gap-2.5">
                  <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $item }}</p>
                </div>
              @endforeach
            </div>
          </div>

          {{-- For Commercial / Business --}}
          <div class="px-5 pt-4 pb-5">
            <p class="text-[11px] font-bold uppercase tracking-wider text-tei-orange mb-2.5">For Commercial / Business</p>
            <div class="space-y-2">
              @foreach ([
                'SEC Registration / Business Registration / DTI',
                'Secretary\'s Certificate authorizing the representative to sign the Meter Service Contract with TEI',
              ] as $item)
                <div class="flex items-start gap-2.5">
                  <svg class="w-3.5 h-3.5 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $item }}</p>
                </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>

    </div>


    {{-- Back link --}}
    <div class="mt-10 pt-8 border-t border-tei-blue/8 scroll-reveal">
      <a href="{{ route('customer.service-application') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Service Application
      </a>
    </div>

  </x-guest-section>

</div>
