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
    <x-guest-intro
      variant="primary"
      label="Business Centers"
      title="Visit Us Near You"
      text="As a Tarlac Electric Inc. (TEI) customer, you don't need to go far to settle your account! Aside from the TEI main office, you can conveniently visit these business centers with longer operating hours." />

    {{-- Locations table --}}
    <div class="scroll-reveal mt-12">
      <x-section-heading
        title="Operating Hours"
        heading="Business Center Locations"
        text="All business centers are open Monday through Sunday. Hours may vary per location."
        align="left" />
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
  <x-guest-section-dark>

    <x-section-heading
      title="Services Available"
      heading="List of Services"
      text="The following services are available at any TEI business center:"
      align="left" />

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 stagger-cards">

      @foreach (['Bill deposit refund', 'Bill deposit upgrade', 'Billing adjustment', 'Billing inquiries', 'Bill payment', 'Correction of name and service address', 'Correction of payment', 'Electric service disconnection request', 'Filing of complaint', 'Net metering application', 'Processing of change account ownership', 'Senior citizen discount application', 'Upgrading of load'] as $service)
        <div class="flex items-center gap-2.5 rounded-xl px-4 py-3 bg-white border border-tei-blue/8">
          <svg class="w-3.5 h-3.5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
          </svg>
          <span class="text-sm text-tei-gray">{{ $service }}</span>
        </div>
      @endforeach

    </div>

  </x-guest-section-dark>

</div>
