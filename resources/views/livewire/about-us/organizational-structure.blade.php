<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Organizational Structure',
      'badgeTitle' => 'Company Profile',
      'subTitle'   => 'An overview of how TEI is organized across its three functional departments.',
  ])


  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-12 scroll-reveal bg-linear-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Company Structure</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            The business of the Company is organized and managed under three functional departments, namely: the
            Network Services, Retail Services, and Support Services Departments.
            All heads of the three departments ultimately report to the President and General Manager of TEI.
          </p>
        </div>
      </div>
    </div>

  </x-guest-section>

  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="overflow-x-auto pb-10 scroll-reveal">
        <div class="min-w-[560px]">

          {{-- ── L1: President & GM ─────────────────────────── --}}
          <div class="flex justify-center">
            <div class="rounded-2xl px-10 py-5 text-center shadow-xl bg-linear-to-br from-tei-blue to-tei-blue-light transition-transform duration-200 hover:scale-105">
              <div class="text-[9px] font-bold tracking-[0.2em] uppercase mb-1.5 text-white/50">
                Chief Executive
              </div>
              <div class="text-sm font-black text-white">President and General Manager</div>
            </div>
          </div>

          {{-- Connector: L1 → L2 --}}
          <div class="flex justify-center h-7">
            <div class="w-px h-full bg-slate-200"></div>
          </div>

          {{-- ── L2: Executive Assistant ─────────────────────── --}}
          <div class="flex justify-center">
            <div class="bg-white rounded-xl px-8 py-3 text-center shadow-sm border border-tei-blue/12 transition-transform duration-200 hover:scale-105">
              <div class="text-[9px] font-semibold tracking-wider uppercase mb-0.5 text-tei-blue/35">
                Office of the President
              </div>
              <div class="text-sm font-bold text-tei-blue">Executive Assistant</div>
            </div>
          </div>

          {{-- Connector: L2 → horizontal branch --}}
          <div class="flex justify-center h-6">
            <div class="w-px h-full bg-slate-200"></div>
          </div>

          {{-- ── Horizontal branch: col-1-center → col-3-center ── --}}
          {{-- Border trick: right-half of col1 + full col2 + left-half of col3 = continuous line --}}
          <div class="grid grid-cols-3">

            {{-- Col 1: border-t on right half, vertical drop at col-center --}}
            <div class="flex h-7">
              <div class="flex-1"></div>
              <div class="flex-1 border-t border-slate-200">
                <div class="w-px h-full bg-slate-200"></div>
              </div>
            </div>

            {{-- Col 2: full border-t, center vertical drop --}}
            <div class="flex h-7 border-t border-slate-200 justify-center">
              <div class="w-px h-full bg-slate-200"></div>
            </div>

            {{-- Col 3: border-t on left half, vertical drop at col-center --}}
            <div class="flex h-7">
              <div class="flex-1 border-t border-slate-200 flex justify-end">
                <div class="w-px h-full bg-slate-200"></div>
              </div>
              <div class="flex-1"></div>
            </div>

          </div>

          {{-- ── L3: Three departments + sub-items ──────────── --}}
          <div class="grid grid-cols-3">

            {{-- Network Services --}}
            <div class="px-2.5 flex flex-col">
              <div class="rounded-xl px-3 py-3 text-center shadow-md bg-tei-blue transition-transform duration-200 hover:scale-105">
                <div class="text-[8px] uppercase font-bold tracking-wider mb-1 text-white/50">Department</div>
                <div class="text-sm font-black text-white leading-snug">Network Services</div>
              </div>
              <div class="flex justify-center h-4">
                <div class="w-px h-full bg-slate-200"></div>
              </div>
              <div class="space-y-1.5">
                @foreach ([
                  'Substation Operations & Maintenance',
                  'Lines Operations & Maintenance',
                  'System Planning and Design',
                ] as $sub)
                  <div class="rounded-lg px-2.5 py-2.5 text-center text-xs font-semibold text-tei-blue bg-tei-blue/5 border border-tei-blue/12 transition-transform duration-150 hover:scale-[1.03]">
                    {{ $sub }}
                  </div>
                @endforeach
              </div>
            </div>

            {{-- Retail Services --}}
            <div class="px-2.5 flex flex-col">
              <div class="rounded-xl px-3 py-3 text-center shadow-md bg-tei-orange transition-transform duration-200 hover:scale-105">
                <div class="text-[8px] uppercase font-bold tracking-wider mb-1 text-white/50">Department</div>
                <div class="text-sm font-black text-white leading-snug">Retail Services</div>
              </div>
              <div class="flex justify-center h-4">
                <div class="w-px h-full bg-slate-200"></div>
              </div>
              <div class="space-y-1.5">
                @foreach ([
                  'Consumer Services',
                  'Metering Services',
                  'Technical Services',
                ] as $sub)
                  <div class="rounded-lg px-2.5 py-2.5 text-center text-xs font-semibold text-tei-orange-dark bg-tei-orange/6 border border-tei-orange/18 transition-transform duration-150 hover:scale-[1.03]">
                    {{ $sub }}
                  </div>
                @endforeach
              </div>
            </div>

            {{-- Support Services --}}
            <div class="px-2.5 flex flex-col">
              <div class="rounded-xl px-3 py-3 text-center shadow-md bg-slate-600 transition-transform duration-200 hover:scale-105">
                <div class="text-[8px] uppercase font-bold tracking-wider mb-1 text-white/50">Department</div>
                <div class="text-sm font-black text-white leading-snug">Support Services</div>
              </div>
              <div class="flex justify-center h-4">
                <div class="w-px h-full bg-slate-200"></div>
              </div>
              <div class="space-y-1.5">
                @foreach ([
                  'Treasury',
                  'Accounting',
                  'Human Resources',
                  'Administrative',
                  'Information Technology & Communication',
                  'General Services',
                  'Legal',
                ] as $sub)
                  <div class="rounded-lg px-2.5 py-2.5 text-center text-xs font-semibold text-slate-600 bg-slate-50 border border-slate-200 transition-transform duration-150 hover:scale-[1.03]">
                    {{ $sub }}
                  </div>
                @endforeach
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </section>

</div>
