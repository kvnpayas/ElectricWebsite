<div x-data="{ tab: 'generation' }">

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'How to Read Your Bill',
      'badgeTitle' => 'Your Bill Explained',
      'subTitle'   => 'Your monthly Statement of Account (SOA) shows everything you owe and why. This guide breaks down every charge line by line.',
  ])


  {{-- INTRO --}}
  <x-guest-section>
    <x-guest-intro
      label="What is an SOA?"
      title="Your Statement of Account (SOA)"
      text="Customers of Tarlac Electric Inc. (TEI) can expect a Statement of Account (SOA) sent to their service address on a monthly basis. In it, you can find the statement period covered, the total amount you have to pay, and when you have to pay. To avail of the Prompt Payment Discount, you must pay your current bill at any TEI business center on or before its due date. Read this comprehensive guide so that you can understand where your payment goes." />
  </x-guest-section>


  {{-- STICKY TAB NAV + CONTENT --}}
  <div id="bill-tabs">

    {{-- Sticky tab bar --}}
    <div class="sticky top-16 z-40 border-b bg-white border-tei-blue/10">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto scrollbar-none -mb-px gap-0">

          @foreach ([['generation', 'Generation & Transmission', '#E76727'], ['distribution', 'Distribution Revenues', '#0F3D5C'], ['others', 'Others', '#10B981'], ['taxes', 'Government Taxes', '#6B7280']] as [$id, $label, $color])
            <button
              @click="tab='{{ $id }}'; $el.dispatchEvent(new CustomEvent('tei-tab',{detail:{tab:'{{ $id }}'},bubbles:true}))"
              class="whitespace-nowrap flex items-center gap-2 px-5 py-4 text-sm font-semibold border-b-2 transition-all duration-150 cursor-pointer shrink-0"
              :style="tab === '{{ $id }}'
                  ? 'border-color: {{ $color }}; color: {{ $color }}'
                  : 'border-color: transparent; color: var(--color-tei-gray-light)'">
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
    <div id="panel-generation" x-show="tab === 'generation'"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
          <x-section-heading
            title="01"
            :heading="'Generation & Transmission'"
            text="These charges cover the cost of acquiring electricity from power suppliers and delivering it to TEI's local distribution network."
            variant="secondary"
            align="left" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

          {{-- Generation Charge --}}
          <x-card variant="secondary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Generation Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              The generation charge takes up the biggest percentage of your SOA. Every month, TEI acquires electric
              power for you from its different suppliers such as power producers with ongoing TEI power supply
              agreements, independent power producers, and wholesale electricity spot market.
            </p>
          </x-card>

          {{-- DAA --}}
          <x-card variant="secondary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">DAA (GRAM &amp; ICERA)</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              GRAM and ICERA are two adjustment recovery mechanisms that are reviewed by the Energy Regulatory
              Commission (ERC). GRAM is short for Generation Rate Adjustment Mechanism, while ICERA is short for
              Incremental Currency Exchange Rate Adjustment. These amounts cover ERC-approved costs in fuel, purchased
              power, and foreign exchange rates over a given period of time.
            </p>
          </x-card>

          {{-- Transmission Charge --}}
          <x-card variant="secondary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Transmission Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              Paid to the National Grid Corporation of the Philippines (NGCP), the transmission charge is the amount
              NGCP charges for the delivery of electricity from various power suppliers to TEI's distribution system.
            </p>
          </x-card>

          {{-- System Loss Charge --}}
          <x-card variant="secondary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">System Loss Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              When transmitting electric power, technical and non-technical system losses are unavoidable because of
              the nature of the energy being transported. Thus, a system loss charge is added to your SOA.
            </p>
          </x-card>

        </div>
      </div>
    </div>


    {{-- ────────────────────────────────────────────
       PANEL 2: Distribution Revenues
    ──────────────────────────────────────────── --}}
    <div id="panel-distribution" x-show="tab === 'distribution'"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
          <x-section-heading
            title="02"
            heading="Distribution Revenues"
            text="These are TEI's charges for building, operating, and maintaining the local power distribution infrastructure that brings electricity directly to your home or business."
            variant="primary"
            align="left" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

          <x-card variant="primary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Distribution Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              The distribution charge is the amount given to TEI. This is used for the creation, operation, and
              maintenance of TEI's distribution system, as well as the delivery of electricity to residential,
              commercial, and industrial establishments in Tarlac City.
            </p>
          </x-card>

          <x-card variant="primary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Supply Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              This amount covers all TEI customer-related services such as the computation of monthly charges,
              delivery of statement, and customer assistance.
            </p>
          </x-card>

          <x-card variant="primary">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Metering Charge</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              The metering charge includes the operational and maintenance costs of your electric meter, the cost of
              reading the meter, and other service-related fees.
            </p>
          </x-card>

        </div>
      </div>
    </div>


    {{-- ────────────────────────────────────────────
       PANEL 3: Others
    ──────────────────────────────────────────── --}}
    <div id="panel-others" x-show="tab === 'others'"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
          <x-section-heading
            title="03"
            heading="Others"
            text="Special discounts are given for TEI customers who are senior citizens or belong to the low income bracket. Up to five percent (5%) discount is given, with the amount being subsidized by other TEI customers."
            variant="success"
            align="left" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

          {{-- Lifeline Subsidy --}}
          <x-card variant="success">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Subsidy on Lifeline</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              This subsidized rate is automatically given to marginalized customers that use forty-five kilowatt hours
              (45 kWh) or less every month.
            </p>
          </x-card>

          {{-- Senior Citizen Subsidy --}}
          <x-card variant="success">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Subsidy on Senior Citizen</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              This subsidized rate is given to senior citizens that use one hundred kilowatt hours (100 kWh) or less
              per month, and has the TEI electricity meter registered under their name for at least one (1) year. This
              discount must be applied for on a yearly basis. For more information,
              <a href="{{ route('customer.senior-citizen-discount') }}" wire:navigate
                class="text-tei-orange font-semibold">click here</a>.
            </p>
          </x-card>

        </div>
      </div>
    </div>


    {{-- ────────────────────────────────────────────
       PANEL 4: Government Taxes
    ──────────────────────────────────────────── --}}
    <div id="panel-taxes" x-show="tab === 'taxes'"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      class="py-20 bg-tei-surface">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
          <x-section-heading
            title="04"
            heading="Government Taxes"
            text="Mandated charges collected by TEI on behalf of national and local government agencies and remitted accordingly."
            variant="accent"
            align="left" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

          {{-- Franchise Tax --}}
          <x-card variant="accent">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Franchise Tax – Local</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              Following the conditions of the Local Government Code (sections 15 and 137), the franchise tax is the
              amount collected by TEI and paid accordingly to local government units.
            </p>
          </x-card>

          {{-- Value Added Tax --}}
          <x-card variant="accent">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Value Added Tax</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              This sales tax is added to the price of services obtained from TEI. It covers all the services provided
              by TEI, from the generation and transmission of electricity to the distribution and sale of electricity.
            </p>
          </x-card>

          {{-- Universal Charge --}}
          <x-card variant="accent">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Universal Charge</h4>
            <p class="text-sm leading-relaxed mb-4 text-tei-gray">
              Four different categories fall under this charge, namely Missionary Electrification Charge,
              Environmental Charge, Stranded Contract Cost, and Stranded Debt.
            </p>
            <div class="space-y-2">
              @foreach ([
                'The Missionary Electrification Charge is the amount given to fund the energization of locations not easily accessible or readily connected to the TEI distribution system.',
                'The Environmental Charge is an environmental fund that is used for the watershed rehabilitation and management of the National Power Corporation (NPC). It is set at PHP 0.0025 per kWh.',
                'The Stranded Contract Cost is the excess of the contracted cost of electricity under qualified IPP contracts of NPC over the actual selling price of the contracted electric output.',
                'The Stranded Debt of NPC is the amount that has not yet been settled from the sales and privatization of state power assets.',
              ] as $item)
                <div class="flex items-start gap-2 text-sm text-tei-gray">
                  <span class="w-1.5 h-1.5 rounded-full bg-tei-gray/40 shrink-0 mt-2"></span>
                  {{ $item }}
                </div>
              @endforeach
            </div>
          </x-card>

          {{-- FiT-All --}}
          <x-card variant="accent">
            <h4 class="text-base font-bold mb-2 text-tei-blue">Fit-All (Renewable)</h4>
            <p class="text-sm leading-relaxed text-tei-gray">
              Fit-All is short for Feed-in-Tariff Allowance, an amount taken from TEI customers that will be given to
              producers of renewable energy. This fee will assist in covering the high costs spent by producers to
              develop renewable energy.
            </p>
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
