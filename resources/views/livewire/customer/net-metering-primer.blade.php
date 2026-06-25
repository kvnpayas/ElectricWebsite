<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Net Metering',
      'badgeTitle' => 'Clean Energy',
      'subTitle' => 'Tarlac Electric Inc (TEI) is in full support of clean, renewable, and sustainable energy. Residential and business owners are encouraged to find alternative means of creating energy-whether it be solar, wind, biomass, or biogas-and giving it back to the community.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — WHAT IS NET METERING?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div
      class="rounded-2xl p-6 sm:p-8 mb-10 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Net Metering Program</h3>
          <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            Through the Net Metering Program under <strong class="text-tei-blue">Republic Act 9513</strong>, TEI
            customers can install a Renewable Energy (RE) facility within their property. The RE facility should not
            exceed <strong class="text-tei-blue">100 kW in capacity</strong> and must be safely connected to the TEI
            grid for the energy to be credited. Anything beyond 100 kW will not be covered by the program.
          </p>
          <div class="flex items-start gap-2 rounded-xl px-4 py-3 text-sm bg-tei-orange/10 border border-tei-orange/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
            <p class="text-xs text-tei-orange-dark">
              <strong>Tip:</strong> Before investing in an RE facility, find out your load profile so you can purchase
              the right one that meets your needs.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards">

      <x-card variant="success">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Republic Act 9513</h4>
            <p class="text-xs leading-relaxed text-tei-gray">The legal basis for the Net Metering Program. TEI is
              mandated to support customers with approved RE installations.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="success">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">Max 100 kW Capacity</h4>
            <p class="text-xs leading-relaxed text-tei-gray">RE facilities must not exceed <strong
                class="text-tei-blue">100 kW</strong> to qualify. Installations beyond this limit are not covered by the
              program.</p>
          </div>
        </div>
      </x-card>

      <x-card variant="success">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-sm font-bold mb-1 text-tei-blue">TEI Bill Credits</h4>
            <p class="text-xs leading-relaxed text-tei-gray">Excess energy you export to the TEI grid is measured and
              credited back to you, reducing your monthly bill.</p>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — HOW IT WORKS
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-success/10 text-success">
          How It Works
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Understanding Net Metering</h2>
        {{-- <p class="text-sm max-w-2xl text-tei-gray">
          Sign up for TEI's Net Metering Program so a TEI representative can install a <strong class="text-tei-blue">bi-directional meter</strong> at your property — one that reads energy flowing in both directions.
        </p> --}}
        <p class="text-sm max-w-2xl text-tei-gray">
          Sign up for TEI's Net Metering Program so a TEI representative can visit your residential or commercial
          property to install a <strong class="text-tei-blue">bi-directional meter.</strong> This meter will be able to
          read both directions of energy flow.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards">

        <x-card variant="success">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-success/10">
            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Bi-Directional Meter</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            TEI installs a special meter that reads <strong class="text-tei-blue">both directions</strong> of energy
            flow, energy you consume from the grid and energy you export back to it.
          </p>
        </x-card>

        <x-card variant="success">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-success/10">
            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Daytime — Solar Supplies</h4>
          {{-- <p class="text-xs leading-relaxed text-tei-gray">
            When the sun is out, your solar panels supply the energy you need. <strong class="text-tei-blue">Excess energy</strong> is exported to the TEI grid and measured for credit.
          </p> --}}
          <p class="text-xs leading-relaxed text-tei-gray">
            Your solar panels will supply the energy you need when the sun is out. The <strong
              class="text-tei-blue">Excess energy</strong> you create will then be exported to the TEI power grid.
          </p>
        </x-card>

        <x-card variant="primary">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-tei-blue/10">
            <svg class="w-5 h-5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </div>
          <h4 class="text-sm font-bold mb-2 text-tei-blue">Night / Cloudy TEI Supplies</h4>
          <p class="text-xs leading-relaxed text-tei-gray">
            When solar energy cannot be harvested, <strong class="text-tei-blue">TEI will provide your electric
              energy</strong>
            as normal. You are only billed for your net energy use.
          </p>
        </x-card>

      </div>

      {{-- Savings callout --}}
      <div class="mt-6 rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-bold mb-1 text-tei-blue">Can I save money through Net Metering?</p>
            {{-- <p class="text-xs leading-relaxed text-tei-gray">
              Yes. Through the program, you will <strong class="text-tei-blue">only be billed for your net energy
                use</strong>. The amount you save is equal to the excess energy exported to the TEI grid multiplied by
              the generation rate. You will be compensated for the energy you provided through <strong
                class="text-tei-blue">TEI bill credits</strong>.
            </p> --}}
            <p class="text-xs leading-relaxed text-tei-gray">
              You automatically save money because you use less energy from TEI grid. Through the Net Metering Program.
              you will <strong class="text-tei-blue">only be billed for your net energy use</strong>. The amount you
              save is equal to the excess energy exported to the TEI grid multiplied by
              the generation rate. You will be compensated for the energy you provided through <strong
                class="text-tei-blue">TEI bill credits</strong>.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — WHY REGISTER WITH TEI?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-12 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-danger/10 text-danger">
        Safety First
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">Why Does TEI Need to Know About my RE
        Installation?</h2>
      {{-- <p class="text-sm max-w-2xl text-tei-gray">
        Enrolling in TEI's Net Metering Program guarantees that your RE facility is <strong
          class="text-tei-blue">stable, compliant, and compatible</strong> with the TEI power grid — ensuring the
        highest value and safety from your RE investment.
      </p> --}}
      <p class="text-sm max-w-2xl text-tei-gray">
        Enrolling in TEI's Net Metering Program will guarantee that the RE facility you've installed is <strong
          class="text-tei-blue">stable and compliant with all safety measures and procedures. </strong> Plus, you can
        be certain that it is compatible with the TEI power grid, so that you can receive the highest value and savings
        from your RE investment.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

      {{-- Risks card --}}
      <x-card variant="danger">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-danger/10">
            <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
          </div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2 flex-wrap">
              <h4 class="text-base font-bold text-tei-blue">Risks of Not Notifying TEI</h4>
              <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-danger/10 text-danger">Unregistered RE</span>
            </div>
            <p class="text-xs leading-relaxed mb-4 text-tei-gray">
              If you do not inform TEI about your RE facility, you put yourself, your home or office, and others at
              risk:
            </p>
            <div class="grid grid-cols-2 gap-1.5">
              @foreach (['Damage to household appliances', 'Electrical fires', 'Electrocution of personnel', 'Grid instability', 'Inaccurate billing', 'Neighborhood blackouts', 'Service interruption'] as $risk)
                <div class="flex items-center gap-1.5 text-xs">
                  <svg class="w-3 h-3 text-danger shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  <span class="text-tei-gray">{{ $risk }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </x-card>

      {{-- Benefits card --}}
      <x-card variant="success">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2 flex-wrap">
              <h4 class="text-base font-bold text-tei-blue">Benefits of Registering</h4>
              <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success">Protected</span>
            </div>
            <p class="text-xs leading-relaxed mb-4 text-tei-gray">
              Even if you do not plan on exporting energy to the TEI grid, you should still apply for the Net Metering
              Program. This keeps your connection <strong class="text-tei-blue">100% safe</strong> and prevents
              electrical accidents.
            </p>
            <div class="space-y-1.5">
              @foreach (['RE facility certified stable and compliant', 'Fully compatible with the TEI power grid', 'Maximum savings and bill credits', 'Protection from electrical accidents', 'Compliant with RA 9513 requirements'] as $benefit)
                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-tei-gray">{{ $benefit }}</span>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 4 — HOW TO SIGN UP
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Sign Up
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">How to Sign Up</h2>
        {{-- <p class="text-sm max-w-2xl text-tei-gray">
          Submit the complete list of requirements to <strong class="text-tei-blue">TEI's main office (Mabini
            Street)</strong> or any of its business centers. After submitting, the TEI Net Metering team will contact
          you with updates on the status of your application.
        </p> --}}
        <p class="text-sm max-w-2xl text-tei-gray">
          Interested parties may avail of Net Metering by submitting the list of requirements to <strong class="text-tei-blue">TEI's main office (Mabini
            Street)</strong> or any of its business centers.
        </p>
      </div>

      {{-- Requirements grouped in 3 cards --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards mb-8">

        <x-card variant="primary">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <h4 class="text-sm font-bold text-tei-blue">Application Documents</h4>
          </div>
          <div class="space-y-3">
            @foreach ([['Letter of Intent', 'Letter of Intent to participate in the Net Metering Program.'], ['Application Form', 'A Net Metering Application Form that you have filled out and signed.']] as [$name, $desc])
              <div class="flex items-start gap-2">
                <div
                  class="w-5 h-5 rounded-full bg-tei-blue/10 text-tei-blue flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">
                  {{ $loop->iteration }}
                </div>
                <div>
                  <p class="text-xs font-semibold text-tei-blue">{{ $name }}</p>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $desc }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </x-card>

        <x-card variant="primary">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
              </svg>
            </div>
            <h4 class="text-sm font-bold text-tei-blue">Technical Documents</h4>
          </div>
          <div class="space-y-3">
            @foreach ([['Electrical Plan', 'Electrical Plan with Renewable Energy (RE) Modification signed and sealed by a professional electrical engineer.'], ['Electrical Permit', 'Electrical Permit for Net Metering from the Electrical Section of the City Engineer\'s Office in Tarlac City Hall.'], ['Technical Specifications', 'Technical specifications of the RE facility.'], ['Certificate of RE Facility', 'Proof from your solar PV panel supplier that the facility has passed international standards such as IEC, IEEE, and others.'], ['ERC Certificate of Compliance', 'ERC Certificate of Compliance (COC) Form No. 1 and 2.']] as [$name, $desc])
              <div class="flex items-start gap-2">
                <div
                  class="w-5 h-5 rounded-full bg-tei-blue/10 text-tei-blue flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">
                  {{ $loop->iteration + 2 }}
                </div>
                <div>
                  <p class="text-xs font-semibold text-tei-blue">{{ $name }}</p>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $desc }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </x-card>

        <x-card variant="primary">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
              <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
              </svg>
            </div>
            <h4 class="text-sm font-bold text-tei-blue">Government & ID Documents</h4>
          </div>
          <div class="space-y-3">
            @foreach ([['CTC or Cedula', 'Community Tax Certificate (CTC) or Cedula.'], ['Two (2) Valid IDs', 'Driver\'s license, Philippine passport, PRC license, COMELEC voter\'s ID, voter\'s certification, SSS ID, GSIS ID, senior citizen\'s ID, TIN ID, postal ID, or original NBI clearance.']] as [$name, $desc])
              <div class="flex items-start gap-2">
                <div
                  class="w-5 h-5 rounded-full bg-tei-blue/10 text-tei-blue flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">
                  {{ $loop->iteration + 7 }}
                </div>
                <div>
                  <p class="text-xs font-semibold text-tei-blue">{{ $name }}</p>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $desc }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </x-card>

      </div>

      {{-- Download + Contact --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
            <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-bold text-tei-blue mb-1">Download Application Form</p>
            <p class="text-xs text-tei-gray leading-relaxed mb-2">Get a copy of the Net Metering Program application
              form to start your application.</p>
            <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-orange">
              Download Form
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 flex items-start gap-3">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/10">
            <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-bold text-tei-blue mb-1">Questions or Inquiries</p>
            <p class="text-xs text-tei-gray leading-relaxed mb-2">After submitting your requirements, the TEI Net
              Metering team will contact you with status updates.</p>
            <div class="flex flex-wrap gap-2 text-xs">
              <span class="font-semibold text-tei-blue">Hotline: (045) 606-1834</span>
              <span class="text-tei-gray-light">·</span>
              <span class="text-tei-gray">TEI Main Office, Mabini St., Tarlac City</span>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>


  {{-- ═══════════════════════════════════════════════
     SECTION 5 — HOSTING CAPACITY TABLE
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <div class="mb-10 scroll-reveal">
      <span
        class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-blue/10 text-tei-blue">
        Reference Data
      </span>
      <h2 class="text-2xl sm:text-3xl font-black mb-1 text-tei-blue">TEI Hosting Capacity for Net Metering</h2>
      <p class="text-sm text-tei-gray-light">As of March 31, 2026</p>
    </div>

    <div class="max-w-lg mx-auto scroll-reveal">
      <div class="rounded-2xl overflow-hidden border border-tei-blue/8 bg-white">

        {{-- Table header --}}
        <div class="grid grid-cols-2 bg-tei-blue px-6 py-3.5">
          <p class="text-xs font-bold text-white/80 uppercase tracking-wider">Transformer Rating (kVA)</p>
          <p class="text-xs font-bold text-white/80 uppercase tracking-wider text-right">Hosting Capacity (kWac)</p>
        </div>

        {{-- Table rows --}}
        @foreach ([[15, 6], [25, 10], [37.5, 15], [50, 20], [75, 30], [100, 40]] as [$kva, $kwac])
          <div
            class="grid grid-cols-2 px-6 py-4 border-b border-tei-blue/6 last:border-0
            {{ $loop->even ? 'bg-tei-surface' : 'bg-white' }}">
            <p class="text-sm font-semibold text-tei-blue">{{ $kva }}</p>
            <p class="text-sm font-black text-tei-orange text-right">{{ $kwac }}</p>
          </div>
        @endforeach

      </div>

      {{-- Footnote --}}
      <p class="mt-4 text-xs leading-relaxed text-tei-gray-light text-center italic">
        These values serve as preliminary reference limits for the assessment of Net Metering applications. Final
        approval shall be based on the outcomes of the technical evaluation, ensuring compliance with TEI's operational
        reliability, safety standards, and overall network performance.
      </p>
    </div>

  </x-guest-section>

</div>
