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
    <x-guest-intro variant="success" label="Net Metering Program" title="What is the Net Metering Program?"
      text="Through the Net Metering Program under Republic Act 9513, TEI customers can install a Renewable Energy (RE) facility within their property. The RE facility should not exceed 100 kW in capacity and must be safely connected to the TEI grid for the energy to be credited. Anything beyond 100 kW will not be covered by the program."
      promptTitle="Before You Invest"
      promptText="Before investing in an RE facility, find out your load profile so you can purchase the right one that meets your needs." />

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 stagger-cards mt-15">

      <x-card variant="success">
        <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-3">RA 9513</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Republic Act 9513</h4>
        <p class="text-xs leading-relaxed text-tei-gray">The legal basis for the Net Metering Program. TEI is mandated
          to support customers with approved RE installations.</p>
      </x-card>

      <x-card variant="success">
        <div class="flex items-baseline gap-2 mb-3">
          <span class="text-4xl font-black text-success leading-none">100</span>
          <span class="text-xs font-bold uppercase tracking-widest text-success/40">kW</span>
        </div>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">Max Capacity</h4>
        <p class="text-xs leading-relaxed text-tei-gray">RE facilities must not exceed <strong class="text-tei-blue">100
            kW</strong> to qualify. Installations beyond this limit are not covered by the program.</p>
      </x-card>

      <x-card variant="primary">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-3">Credits</p>
        <h4 class="text-sm font-bold mb-1.5 text-tei-blue">TEI Bill Credits</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Excess energy you export to the TEI grid is measured and
          credited back to you, reducing your monthly bill.</p>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — HOW IT WORKS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

    <x-section-heading title="How It Works" variant="success" heading="Understanding Net Metering"
      text="Sign up for TEI's Net Metering Program so that a TEI representative can visit your residential or commercial property to install a bi-directional meter. This meter will be able to read both directions of energy flow."
      align="left" />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards">

      <x-card variant="success">
        <div class="flex items-start justify-between mb-5">
          <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
          <span class="text-5xl font-black leading-none select-none" style="color: rgba(34,197,94,0.1);">01</span>
        </div>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Bi-Directional Meter</h4>
        <p class="text-xs leading-relaxed text-tei-gray">
          TEI installs a special meter that reads <strong class="text-tei-blue">both directions</strong> of energy flow
          — energy you consume from the grid and energy you export back to it.
        </p>
      </x-card>

      <x-card variant="success">
        <div class="flex items-start justify-between mb-5">
          <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
          <span class="text-5xl font-black leading-none select-none" style="color: rgba(34,197,94,0.1);">02</span>
        </div>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Daytime — Solar Supplies</h4>
        <p class="text-xs leading-relaxed text-tei-gray">
          For example, your solar panels will supply the energy you need when the sun is out. The <strong
            class="text-tei-blue">excess energy</strong> you create will then be exported to the TEI power grid.
        </p>
      </x-card>

      <x-card variant="primary">
        <div class="flex items-start justify-between mb-5">
          <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
          <span class="text-5xl font-black leading-none select-none" style="color: rgba(15,61,92,0.07);">03</span>
        </div>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Night / Cloudy — TEI Supplies</h4>
        <p class="text-xs leading-relaxed text-tei-gray">
          At night or whenever solar energy cannot be harvested, <strong class="text-tei-blue">TEI will provide your
            electric energy.</strong> All the energy exported by your solar panels and provided by TEI will be measured
          accordingly.
        </p>
      </x-card>

    </div>

    {{-- Savings callout --}}
    <div class="mt-6 rounded-2xl p-5 sm:p-6 bg-white border border-tei-blue/8">
      <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 items-start">
        <div class="flex-1">
          <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-2">Can I save money?</p>
          <p class="text-sm font-bold mb-2 text-tei-blue">Can I save money through Net Metering?</p>
          <p class="text-xs leading-relaxed text-tei-gray">
            You automatically save money because you use less energy from the TEI grid. Through the Net Metering
            Program, you will <strong class="text-tei-blue">only be billed for your net energy use</strong>. The amount
            you save is equal to the excess energy you've exported to the TEI power grid multiplied by the generation
            rate. You will be compensated for the energy you provided through <strong class="text-tei-blue">TEI bill
              credits</strong>.
          </p>
        </div>
      </div>
    </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — WHY REGISTER WITH TEI?
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading title="Safety First" variant="danger"
      heading="Why Does TEI Need to Know About my RE Installation?"
      text="Enrolling in TEI's Net Metering Program will guarantee that the RE facility you've installed is stable and compliant with all safety measures and procedures. Plus, you can be certain that it is compatible with the TEI power grid, so that you can receive the highest value and savings from your RE investment."
      align="left" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

      {{-- Risks card --}}
      <x-card variant="danger">
        <p class="text-[10px] font-black text-danger uppercase tracking-[0.18em] mb-4">Unregistered RE</p>
        <h4 class="text-base font-bold mb-3 text-tei-blue">Risks of Not Notifying TEI</h4>
        <p class="text-xs leading-relaxed mb-4 text-tei-gray">
          If you do not inform TEI about your RE facility, you put yourself, your home or office, and others at risk:
        </p>
        <div class="grid grid-cols-2 gap-1.5">
          @foreach (['Damage to household appliances', 'Electrical fires', 'Electrocution of personnel', 'Grid instability', 'Inaccurate billing', 'Neighborhood blackouts', 'Service interruption'] as $risk)
            <div class="flex items-center gap-1.5 text-xs">
              <svg class="w-3 h-3 text-danger shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              <span class="text-tei-gray">{{ $risk }}</span>
            </div>
          @endforeach
        </div>
      </x-card>

      {{-- Benefits card --}}
      <x-card variant="success">
        <p class="text-[10px] font-black text-success uppercase tracking-[0.18em] mb-4">Protected</p>
        <h4 class="text-base font-bold mb-3 text-tei-blue">Benefits of Registering</h4>
        <p class="text-xs leading-relaxed mb-4 text-tei-gray">
          Even if you do not plan on exporting energy to the TEI grid, you should still notify TEI about your RE
          facility by applying for the Net Metering Program. This will keep your connection <strong
            class="text-tei-blue">100% safe</strong> and will prevent electrical accidents from happening.
        </p>
        <div class="space-y-1.5">
          @foreach (['RE facility certified stable and compliant', 'Fully compatible with the TEI power grid', 'Maximum savings and bill credits', 'Protection from electrical accidents', 'Compliant with RA 9513 requirements'] as $benefit)
            <div class="flex items-center gap-2 text-xs">
              <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span class="text-tei-gray">{{ $benefit }}</span>
            </div>
          @endforeach
        </div>
      </x-card>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 4 — HOW TO SIGN UP
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

      <x-section-heading title="Sign Up" heading="How to Sign Up"
        text="Interested parties may avail of Net Metering by submitting the list of requirements to TEI's main office (Mabini Street) or business centers."
        align="left" />

      {{-- Requirements grouped in 3 cards --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards mb-8">

        <x-card variant="primary">
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-4">Application</p>
          <h4 class="text-sm font-bold mb-3 text-tei-blue">Application Documents</h4>
          <div class="space-y-3">
            @foreach ([['Letter of Intent', 'Letter of Intent to participate in the Net Metering Program.'], ['Application Form', 'A Net Metering Application Form that you have filled out and signed.']] as [$name, $desc])
              <div class="flex items-start gap-2.5">
                <span class="text-xs font-black text-tei-blue/30 shrink-0 mt-0.5 w-4">{{ $loop->iteration }}.</span>
                <div>
                  <p class="text-xs font-semibold text-tei-blue">{{ $name }}</p>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $desc }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </x-card>

        <x-card variant="primary">
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-4">Technical</p>
          <h4 class="text-sm font-bold mb-3 text-tei-blue">Technical Documents</h4>
          <div class="space-y-3">
            @foreach ([['Electrical Plan', 'Electrical Plan with Renewable Energy (RE) Modification that has been signed and sealed by a professional electrical engineer.'], ['Electrical Permit', 'Electrical Permit for Net Metering from the Electrical Section of the City Engineer\'s Office in Tarlac City Hall.'], ['Technical Specifications', 'Technical specifications of the RE facility.'], ['Certificate of RE Facility', 'Proof from your solar PV panel supplier that the RE facility has passed international standards such as IEC, IEEE, and others.'], ['ERC Certificate of Compliance', 'Energy Regulatory Commission (ERC) Certificate of Compliance (COC) Form No. 1 and 2.']] as [$name, $desc])
              <div class="flex items-start gap-2.5">
                <span
                  class="text-xs font-black text-tei-blue/30 shrink-0 mt-0.5 w-4">{{ $loop->iteration + 2 }}.</span>
                <div>
                  <p class="text-xs font-semibold text-tei-blue">{{ $name }}</p>
                  <p class="text-xs text-tei-gray leading-relaxed">{{ $desc }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </x-card>

        <x-card variant="primary">
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-4">Government & ID</p>
          <h4 class="text-sm font-bold mb-3 text-tei-blue">Government & ID Documents</h4>
          <div class="space-y-3">
            @foreach ([['CTC or Cedula', 'Community Tax Certificate (CTC) or Cedula.'], ['Two (2) Valid IDs', 'Driver\'s license, Philippine passport, PRC license, new COMELEC voter\'s ID, voter\'s certification, SSS ID, GSIS ID, senior citizen\'s ID, TIN ID, postal ID, and original NBI clearance.']] as [$name, $desc])
              <div class="flex items-start gap-2.5">
                <span
                  class="text-xs font-black text-tei-blue/30 shrink-0 mt-0.5 w-4">{{ $loop->iteration + 7 }}.</span>
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

        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8">
          <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-1">Download</p>
          <p class="text-sm font-bold text-tei-blue mb-2">Application Form</p>
          <p class="text-xs text-tei-gray leading-relaxed mb-3">To download a copy of the Net Metering Program
            application form, please click here.</p>
          <a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-orange">
            Download Form
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>

        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8">
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-1">Contact</p>
          <p class="text-sm font-bold text-tei-blue mb-2">Questions or Inquiries</p>
          <p class="text-xs text-tei-gray leading-relaxed mb-3">After submitting all the requirements, the TEI Net
            Metering team will get in touch with you to update you about the status of your application. For further
            questions or inquiries, you may call our hotline at 606-1834 or visit us at the TEI main office.</p>
          <div class="flex flex-wrap gap-2 text-xs">
            <span class="font-semibold text-tei-blue">Hotline: (045) 606-1834</span>
            <span class="text-tei-gray-light">·</span>
            <span class="text-tei-gray">TEI Main Office, Mabini St., Tarlac City</span>
          </div>
        </div>

      </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 5 — HOSTING CAPACITY TABLE
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading title="Reference Data" variant="primary" heading="TEI Hosting Capacity for Net Metering"
      :text="$this->asOfLabel" align="left" />

    <div class="max-w-lg mx-auto scroll-reveal">
      <x-guest-table col1="Transformer Rating (kVA)" col2="Hosting Capacity (kWac)" :rows="$this->hostingRows" />

      {{-- Footnote --}}
      <p class="mt-4 text-xs leading-relaxed text-tei-gray-light text-center italic">
        These values serve as preliminary reference limits for the assessment of Net Metering applications. Final
        approval shall be based on the outcomes of the technical evaluation, ensuring compliance with TEI's
        operational reliability, safety standards, and overall network performance.
      </p>
    </div>

  </x-guest-section>

</div>
