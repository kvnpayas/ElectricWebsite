<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Business Centers',
      'badgeTitle' => 'Customer',
      'subTitle' => 'Conveniently pay your bills and avail of TEI services at any of our business centers near you.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — INTRO + LOCATIONS TABLE
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    {{-- Intro card --}}
    <div
      class="rounded-2xl p-6 sm:p-8 mb-12 scroll-reveal bg-gradient-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <p class="text-sm leading-relaxed text-tei-gray flex-1">
          As a Tarlac Electric Inc. (TEI) customer, you don't need to go far to settle your account! Aside from the TEI
          main office, you can conveniently visit these business centers with longer operating hours.
        </p>
      </div>
    </div>

    {{-- Locations table --}}
    <div class="scroll-reveal">
      <x-guest-table
          :headers="['Business Center', 'Address', 'Mon – Fri', 'Saturday', 'Sunday']"
          :alignments="['left', 'left', 'center', 'center', 'center']"
          :rows="[
              ['Citywalk', 'GF UA14, Zamora St. San Roque', '10:00 AM – 8:00 PM', '10:00 AM – 8:00 PM', '10:00 AM – 8:00 PM'],
              ['Magic Star Mall', 'UGF, Cut-Cut 1st, Romulo Blvd.', '10:00 AM – 8:00 PM', '10:00 AM – 8:00 PM', '9:00 AM – 8:00 PM'],
              ['Magic Star Matatalaib', 'Buno, Matatalaib', '8:00 AM – 8:00 PM', '8:00 AM – 8:00 PM', '8:00 AM – 8:00 PM'],
              ['Market City Mall', 'GF Bldg. A U10 Aquino Blvd. cor. J. Luna St. Poblacion', '8:00 AM – 7:00 PM', '8:00 AM – 7:00 PM', '8:00 AM – 7:00 PM'],
              ['Metrotown Mall', 'GF U113, Mc Arthur Highway, Sto. Cristo', '10:00 AM – 8:00 PM', '9:00 AM – 8:00 PM', '9:00 AM – 8:00 PM'],
              ['SM City Tarlac', 'LGF, Mc Arthur Highway, San Roque', '10:00 AM – 9:00 PM', '10:00 AM – 9:00 PM', '10:00 AM – 9:00 PM'],
          ]"
          :highlight="false" />
    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — LIST OF SERVICES
  ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-12 scroll-reveal">
        <span
          class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Services Available
        </span>
        <h2 class="text-2xl sm:text-3xl font-black mb-3 text-tei-blue">List of Services</h2>
        <p class="text-sm leading-relaxed max-w-3xl text-tei-gray">
          The following services are available at any TEI business center:
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 stagger-cards">

        @foreach (['Bill deposit refund', 'Bill deposit upgrade', 'Billing adjustment', 'Billing inquiries', 'Bill payment', 'Correction of name and service address', 'Correction of payment', 'Electric service disconnection request', 'Filing of complaint', 'Net metering application', 'Processing of change account ownership', 'Senior citizen discount application', 'Upgrading of load'] as $service)
          <div class="flex items-center gap-3 rounded-xl px-4 py-3.5 bg-white"
            style="border: 1px solid rgba(15,61,92,0.08); box-shadow: 0 1px 4px rgba(15,61,92,0.04);">
            <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 bg-success/10">
              <svg class="w-3.5 h-3.5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span class="text-sm text-tei-gray">{{ $service }}</span>
          </div>
        @endforeach

      </div>

    </div>
  </section>

</div>
