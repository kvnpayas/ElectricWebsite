<div x-data="{ tab: 'generation' }">

  {{-- COMPACT PAGE HEADER --}}
  @livewire('guest.page-header', [
      'subTitle' => 'Your monthly Statement of Account (SOA) shows everything you owe and why. This guide breaks down every charge line by line.',
      'badgeTitle' => 'Your Bill Explained',
  ])


  {{-- INTRO + CATEGORY OVERVIEW --}}

  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 mb-5 scroll-reveal"
      style="background: linear-gradient(135deg, rgba(15,61,92,0.04), rgba(15,61,92,0.02)); border: 1px solid rgba(15,61,92,0.08);">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">About Your Statement of Account
            (SOA)</h3>
          <p class="text-sm leading-relaxed mb-3 text-tei-gray">
            {{-- TEI sends a monthly Statement of Account to your service address showing the statement period covered,
              the total amount you have to pay, and the due date. --}}
            Customers of Tarlac Electric Inc. (TEI) can expect a Statement of Account (SOA) sent to their service
            address on a monthly basis. In it, you can find statement period covered, the total amount you have to
            pay,
            and when you have to pay.
          </p>
          <div class="flex items-start gap-2 rounded-xl px-4 py-3 text-sm bg-tei-orange/10 border border-tei-orange/20">
            <svg class="w-4 h-4 shrink-0 mt-0.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-tei-orange-dark">
              <strong>Prompt Payment Discount:</strong>
              Pay your bill on or before the due date at any TEI business center to avail of this discount.
            </p>
          </div>
        </div>
      </div>
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     STICKY TAB NAV + CONTENT
  ═══════════════════════════════════════════════ --}}
  <div id="bill-tabs">

    {{-- Sticky tab bar --}}
    <div class="sticky top-16 z-40 border-b bg-white border-tei-blue/10" >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto scrollbar-none -mb-px gap-0">

          @foreach ([['generation', 'Generation &amp; Transmission', '#E76727'], ['distribution', 'Distribution Revenues', '#0F3D5C'], ['others', 'Others', '#10B981'], ['taxes', 'Government Taxes', '#6B7280']] as [$id, $label, $color])
            <button
              @click="tab='{{ $id }}'; $el.dispatchEvent(new CustomEvent('tei-tab',{detail:{tab:'{{ $id }}'},bubbles:true}))"
              class="whitespace-nowrap flex items-center gap-2 px-5 py-4 text-sm font-semibold border-b-2 transition-all duration-150 cursor-pointer shrink-0"
              :style="tab === '{{ $id }}'
                  ?
                  'border-color: {{ $color }}; color: {{ $color }}' :
                  'border-color: transparent; color: var(--color-tei-gray-light)'">
              <span :class="tab === '{{ $id }}' ? 'scale-110' : ''"
                class="inline-block transition-transform duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  @if ($id === 'generation')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 10V3L4 14h7v7l9-11h-7z" />
                  @elseif ($id === 'distribution')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  @elseif ($id === 'others')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  @else
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                  @endif
                </svg>
              </span>
              {!! $label !!}
            </button>
          @endforeach

        </div>
      </div>
    </div>

    {{-- ────────────────────────────────────────────
       PANEL 1: Generation & Transmission
  ──────────────────────────────────────────── --}}
    <div id="panel-generation" x-show="tab === 'generation'" x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 scroll-reveal">
          <span
            class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">01</span>
          <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">
            Generation &amp; Transmission
          </h2>
          <p class="text-sm max-w-2xl text-tei-gray">
            These charges cover the cost of acquiring electricity from power suppliers and delivering it to TEI's local
            distribution network.
            They make up the <strong class="text-tei-blue">largest portion</strong> of your bill.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

          {{-- Generation Charge --}}
          <x-card variant="secondary">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
                <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                  <h4 class="text-base font-bold text-tei-blue">Generation Charge</h4>
                  <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-tei-orange/10 text-tei-orange">Largest
                    item</span>
                </div>
                <p class="text-sm leading-relaxed text-tei-gray">
                  The generation charge takes up the <strong class="text-tei-blue">biggest percentage
                    of your SOA</strong>.
                  Every month, TEI acquires electric power from its suppliers: producers under TEI power supply
                  agreements,
                  independent power producers, and the wholesale electricity spot market.
                </p>
              </div>
            </div>
          </x-card>

          {{-- DAA --}}
          <x-card variant="secondary">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
                <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
              </div>
              <div>
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">DAA (GRAM &amp; ICERA)
                </h4>
                <p class="text-sm leading-relaxed mb-3 text-tei-gray">
                  Two adjustment recovery mechanisms reviewed by the Energy Regulatory Commission (ERC).
                </p>
                <div class="space-y-2">
                  <div class="rounded-xl px-3 py-2 text-xs bg-tei-blue/10">
                    <strong class="text-tei-blue">GRAM</strong>
                    <span class="text-tei-gray"> — Generation Rate Adjustment Mechanism. Covers
                      ERC-approved costs in fuel and purchased power over a given period.</span>
                  </div>
                  <div class="rounded-xl px-3 py-2 text-xs bg-tei-blue/10">
                    <strong class="text-tei-blue">ICERA</strong>
                    <span class="text-tei-gray"> — Incremental Currency Exchange Rate Adjustment.
                      Covers foreign exchange rate fluctuations affecting power costs.</span>
                  </div>
                </div>
              </div>
            </div>
          </x-card>

          {{-- Transmission Charge --}}
          <x-card variant="secondary">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
                <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">Transmission Charge
                </h4>
                <p class="text-sm leading-relaxed text-tei-gray">
                  Paid to the <strong class="text-tei-blue">National Grid Corporation of the
                    Philippines (NGCP)</strong>,
                  this is the amount NGCP charges for delivering electricity from various power suppliers to TEI's
                  distribution system.
                </p>
              </div>
            </div>
          </x-card>


          {{-- System Loss Charge --}}
          <x-card variant="secondary">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
                <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                </svg>
              </div>
              <div>
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">System Loss Charge</h4>
                <p class="text-sm leading-relaxed text-tei-gray">
                  When transmitting electric power, technical and non-technical system losses are
                  <strong class="text-tei-blue">unavoidable</strong> due to the nature of energy
                  being transported.
                  This charge is added to your SOA to account for those losses.
                </p>
              </div>
            </div>
          </x-card>
        </div>
      </div>
    </div>

    {{-- ────────────────────────────────────────────
       PANEL 2: Distribution Revenues
  ──────────────────────────────────────────── --}}
    <div id="panel-distribution" x-show="tab === 'distribution'"
      x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0" class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12 scroll-reveal">
          <span
            class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-blue/10 text-tei-blue">02</span>
          <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">
            Distribution Revenues
          </h2>
          <p class="text-sm max-w-2xl text-tei-gray">
            These are TEI's charges for building, operating, and maintaining the local power distribution infrastructure
            that
            brings electricity directly to your home or business.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 stagger-cards">

          @foreach ([
        ['Distribution Charge', 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'The amount given to TEI for the <strong style="color: var(--color-tei-blue);">creation, operation, and maintenance</strong> of the distribution system, as well as the delivery of electricity to residential, commercial, and industrial establishments in Tarlac City.'],
        ['Supply Charge', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'Covers all TEI <strong style="color: var(--color-tei-blue);">customer-related services</strong> such as the computation of monthly charges, delivery of statement, and customer assistance.'],
        ['Metering Charge', 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'Includes the <strong style="color: var(--color-tei-blue);">operational and maintenance costs</strong> of your electric meter, the cost of reading the meter, and other service-related fees.'],
    ] as [$title, $ico, $desc])
            <x-card variant="primary">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4 bg-tei-blue-dark/10">
                <svg class="w-5 h-5 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ico }}" />
                </svg>
              </div>
              <h4 class="text-base font-bold mb-2 text-tei-blue">{{ $title }}</h4>
              <p class="text-sm leading-relaxed text-tei-gray">{!! $desc !!}</p>
            </x-card>
          @endforeach

        </div>
      </div>
    </div>

    {{-- ────────────────────────────────────────────
       PANEL 3: Others
  ──────────────────────────────────────────── --}}
    <div id="panel-others" x-show="tab === 'others'" x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 box-flex-group">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12 scroll-reveal">
          <span
            class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-success/10 text-success">03</span>
          <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">
            Others
          </h2>
          <p class="text-sm max-w-2xl text-tei-gray">
            Special discounts are given to TEI customers who are senior citizens or belong to the low-income bracket.
            Up to <strong class="text-tei-blue">5% discount</strong> is granted, subsidized by other
            TEI customers.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

          {{-- Lifeline Subsidy --}}
          <x-card variant="success">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
                <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                  <h4 class="text-base font-bold text-tei-blue">Subsidy on Lifeline</h4>
                  <span
                    class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success">Auto-applied</span>
                </div>
                <p class="text-sm leading-relaxed mb-3 text-tei-gray">
                  This subsidized rate is <strong class="text-tei-blue">automatically given</strong>
                  to
                  marginalized customers that use <strong>forty-five kilowatt-hours (45 kWh) or less</strong> every
                  month.
                  No application required.
                </p>
                <div
                  class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs font-semibold bg-success/10 text-success">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Threshold: ≤ 45 kWh / month
                </div>
              </div>
            </div>
          </x-card>

          {{-- Senior Citizen Subsidy --}}
          <x-card variant="success">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
                <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                  <h4 class="text-base font-bold text-tei-blue">Subsidy on Senior Citizen
                  </h4>
                  <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success">Up to 5%
                    discount</span>
                </div>
                <p class="text-sm leading-relaxed mb-3 text-gray-600">
                  Given to senior citizens using <strong>100 kWh or less per month</strong>, with a TEI electric meter
                  registered
                  under their name for at least <strong>one (1) year</strong>. This discount must be applied for on a
                  <strong>yearly basis</strong>.
                </p>
                <div class="flex flex-wrap gap-2">
                  <div
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-success/10 text-success">
                    ≤ 100 kWh / month
                  </div>
                  <div
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-tei-blue/10 text-tei-blue">
                    Meter ≥ 1 year under their name
                  </div>
                </div>
              </div>
            </div>
          </x-card>

        </div>
      </div>
    </div>

    {{-- ────────────────────────────────────────────
       PANEL 4: Government Taxes
  ──────────────────────────────────────────── --}}
    <div id="panel-taxes" x-show="tab === 'taxes'" x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 border-right-style">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12 scroll-reveal">
          <span
            class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-gray/10 text-tei-gray">04</span>
          <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue">
            Government Taxes
          </h2>
          <p class="text-sm max-w-2xl text-tei-gray">
            Mandated charges collected by TEI on behalf of national and local government agencies
            and remitted accordingly.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 stagger-cards">

          {{-- Franchise Tax --}}
          <x-card variant="accent">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-gray/10">
                <svg class="w-5 h-5 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                </svg>
              </div>
              <div>
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">Franchise Tax – Local
                </h4>
                <p class="text-sm leading-relaxed text-tei-gray">
                  Following the conditions of the <strong class="text-tei-blue">Local Government Code
                    (Sections 15 and 137)</strong>,
                  this tax is collected by TEI and paid accordingly to local government units.
                </p>
              </div>
            </div>
          </x-card>

          {{-- Value Added Tax --}}
          <x-card variant="accent">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-gray/10">
                <svg class="w-5 h-5 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <div>
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">Value Added Tax (VAT)
                </h4>
                <p class="text-sm leading-relaxed text-tei-gray">
                  This sales tax is added to the price of services obtained from TEI. It covers
                  <strong class="text-tei-blue">all services provided by TEI</strong> — from
                  generation and transmission
                  to distribution and sale of electricity.
                </p>
              </div>
            </div>
          </x-card>

          {{-- Universal Charge --}}
          <x-card variant="accent">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-tei-gray/10">
                <svg class="w-5 h-5 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="flex-1">
                <h4 class="text-base font-bold mb-1.5 text-tei-blue">Universal Charge</h4>
                <p class="text-sm leading-relaxed mb-3 text-tei-gray">
                  Covers four categories mandated by the government:
                </p>
                <div class="space-y-2">
                  @foreach ([['Missionary Electrification', 'Funds the energization of remote locations not easily accessible or connected to the TEI distribution system.'], ['Environmental Charge', 'Used for watershed rehabilitation and management of the National Power Corporation (NPC). Set at PHP 0.0025/kWh.'], ['Stranded Contract Cost', 'Excess of contracted cost of electricity under qualified IPP contracts of NPC over the actual selling price of contracted electric output.'], ['Stranded Debt', 'The amount that has not yet been settled from the sales and privatization of state power assets.']] as [$name, $detail])
                    <div class="rounded-xl px-3 py-2.5 bg-tei-blue/10">
                      <p class="text-xs font-bold mb-0.5 text-tei-blue">{{ $name }}
                      </p>
                      <p class="text-xs leading-relaxed text-tei-gray">{{ $detail }}
                      </p>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </x-card>

          {{-- FiT-All --}}
          <x-card variant="accent">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-success/10">
                <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                  <h4 class="text-base font-bold text-tei-blue">FiT-All (Renewable)</h4>
                  <span class="text-xs font-bold px-2 py-0.5 rounded-full bg-success/10 text-success">Green Energy</span>
                </div>
                <p class="text-sm leading-relaxed text-tei-gray">
                  <strong class="text-tei-blue">FiT-All</strong> stands for Feed-in-Tariff Allowance
                  —
                  an amount taken from TEI customers and given to <strong>producers of renewable energy</strong>.
                  This fee helps cover the high costs spent by developers to build and operate renewable energy
                  plants.
                </p>
              </div>
            </div>
          </x-card>

        </div>
      </div>
    </div>

  </div>{{-- end bill-tabs --}}
</div>

@script
  <script>
    (function() {
      const ac = new AbortController();
      document.addEventListener('livewire:navigate', () => ac.abort(), {
        once: true
      });

      function animatePanel(tabId) {
        const panel = document.getElementById('panel-' + tabId);
        if (!panel) return;

        const header = panel.querySelector('.scroll-reveal');
        if (header) {
          gsap.killTweensOf(header);
          gsap.fromTo(header, {
            opacity: 0,
            y: 20
          }, {
            opacity: 1,
            y: 0,
            duration: 0.5,
            ease: 'power2.out',
            clearProps: 'transform'
          });
        }

        const cards = panel.querySelectorAll('.card');
        if (!cards.length) return;
        gsap.killTweensOf(cards);
        gsap.fromTo(cards, {
          opacity: 0,
          y: 24
        }, {
          opacity: 1,
          y: 0,
          duration: 0.45,
          stagger: 0.08,
          ease: 'power2.out',
          delay: 0.12,
          clearProps: 'transform',
          onComplete() {
            cards.forEach(c => {
              c.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease';
            });
          },
        });
      }

      function initTabAnimations() {
        requestAnimationFrame(() => requestAnimationFrame(() => animatePanel('generation')));
        window.addEventListener('tei-tab', e => {
          setTimeout(() => animatePanel(e.detail.tab), 80);
        }, {
          signal: ac.signal
        });
      }

      if (document.readyState === 'complete') {
        initTabAnimations();
      } else {
        window.addEventListener('load', initTabAnimations, {
          signal: ac.signal
        });
      }
    })();
  </script>
@endscript
