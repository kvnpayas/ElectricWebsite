<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Appliance Calculator',
      'badgeTitle' => 'Tools',
      'subTitle'   => 'Estimate your monthly electricity consumption based on appliance wattage, daily usage hours, and quantity.',
  ])


  {{-- ═══════════════════════════════════════════════
     CALCULATOR
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>
    <div
      class="max-w-lg mx-auto scroll-reveal"
      x-data="{
        watt:   0,
        hours:  0,
        qty:    1,
        get result() {
          const w = parseFloat(this.watt)  || 0;
          const h = parseFloat(this.hours) || 0;
          const q = parseFloat(this.qty)   || 0;
          return (w * h * q * 30) / 1000;
        },
        fmt(n) {
          return n.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        },
        clear() { this.watt = 0; this.hours = 0; this.qty = 1; }
      }"
    >

      {{-- Card --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 overflow-hidden"
           style="box-shadow: 0 4px 32px rgba(15,61,92,0.09);">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-tei-blue/8 bg-gradient-to-r from-tei-blue/3 to-tei-blue/1">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-tei-orange/10 flex items-center justify-center">
              <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M4 19h16a2 2 0 002-2V7a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <h2 class="text-base font-bold text-tei-blue">Monthly Consumption Calculator</h2>
              <p class="text-[11px] text-tei-gray-light mt-0.5">kWh = Watts × Hours × Quantity × 30 ÷ 1,000</p>
            </div>
          </div>
        </div>

        {{-- Inputs --}}
        <div class="p-6 space-y-5">

          {{-- Appliance Watt --}}
          <div>
            <label class="block text-xs font-bold text-tei-blue mb-1">
              Appliance Watt <span class="text-danger">*</span>
            </label>
            <p class="text-[11px] text-tei-gray-light mb-2">Rated wattage of the appliance or fixture</p>
            <div class="flex items-stretch rounded-xl border border-tei-blue/15 bg-tei-blue/2 focus-within:border-tei-orange focus-within:ring-2 focus-within:ring-tei-orange/15 transition-all duration-200 overflow-hidden">
              <input
                type="number"
                x-model="watt"
                min="0"
                placeholder="0"
                class="flex-1 min-w-0 bg-transparent px-4 py-3 text-sm font-mono text-tei-blue focus:outline-none placeholder:text-tei-gray-light/50"
              />
              <span class="flex items-center px-4 text-xs font-bold text-tei-gray-light border-l border-tei-blue/10 bg-tei-blue/3 shrink-0">W</span>
            </div>
          </div>

          {{-- Hours --}}
          <div>
            <label class="block text-xs font-bold text-tei-blue mb-1">
              Hours <span class="text-danger">*</span>
            </label>
            <p class="text-[11px] text-tei-gray-light mb-2">Average number of hours used per day</p>
            <div class="flex items-stretch rounded-xl border border-tei-blue/15 bg-tei-blue/2 focus-within:border-tei-orange focus-within:ring-2 focus-within:ring-tei-orange/15 transition-all duration-200 overflow-hidden">
              <input
                type="number"
                x-model="hours"
                min="0"
                max="24"
                placeholder="0"
                class="flex-1 min-w-0 bg-transparent px-4 py-3 text-sm font-mono text-tei-blue focus:outline-none placeholder:text-tei-gray-light/50"
              />
              <span class="flex items-center px-4 text-xs font-bold text-tei-gray-light border-l border-tei-blue/10 bg-tei-blue/3 shrink-0">hrs / day</span>
            </div>
          </div>

          {{-- Quantity --}}
          <div>
            <label class="block text-xs font-bold text-tei-blue mb-1">
              Quantity <span class="text-danger">*</span>
            </label>
            <p class="text-[11px] text-tei-gray-light mb-2">Total number of the same appliance or fixture</p>
            <div class="flex items-stretch rounded-xl border border-tei-blue/15 bg-tei-blue/2 focus-within:border-tei-orange focus-within:ring-2 focus-within:ring-tei-orange/15 transition-all duration-200 overflow-hidden">
              <input
                type="number"
                x-model="qty"
                min="1"
                placeholder="1"
                class="flex-1 min-w-0 bg-transparent px-4 py-3 text-sm font-mono text-tei-blue focus:outline-none placeholder:text-tei-gray-light/50"
              />
              <span class="flex items-center px-4 text-xs font-bold text-tei-gray-light border-l border-tei-blue/10 bg-tei-blue/3 shrink-0">unit(s)</span>
            </div>
          </div>

        </div>

        {{-- Result --}}
        <div class="mx-6 mb-6 rounded-xl bg-gradient-to-br from-tei-blue/5 to-tei-blue/2 border border-tei-blue/10 px-5 py-4">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-xs font-bold text-tei-blue">Monthly Consumption</p>
              <p class="text-[11px] text-tei-gray-light mt-0.5">Based on 30 days</p>
            </div>
            <div class="text-right">
              <span class="text-3xl font-black font-mono text-tei-orange" x-text="fmt(result)"></span>
              <span class="text-sm font-bold text-tei-orange/70 ml-1">kWh</span>
            </div>
          </div>
        </div>

        {{-- Clear button --}}
        <div class="px-6 pb-6">
          <button
            @click="clear()"
            class="w-full rounded-xl border border-tei-blue/15 py-2.5 text-sm font-semibold text-tei-gray hover:text-danger hover:border-danger/30 hover:bg-danger/4 transition-all duration-200 cursor-pointer"
          >
            Clear
          </button>
        </div>

      </div>

      <p class="mt-4 text-[11px] text-tei-gray-light text-center">
        This calculator provides an estimate only. Actual consumption may vary. For billing inquiries, please contact TEI.
      </p>

    </div>
  </x-guest-section>

</div>
