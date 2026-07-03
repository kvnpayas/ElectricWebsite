<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Rates & Advisories',
      'badgeTitle' => 'Rates & Advisories',
      'subTitle' => 'Stay informed with the latest power interruption schedules, regulatory advisories, rate schedules, and official announcements from TEI.',
  ])


  <x-guest-section>
    <x-section-heading
      title="Stay Informed"
      heading="All Rates & Advisories"
      text="From power interruption notices to approved rate schedules — find all official TEI publications and regulatory filings in one place."
      align="center" />
  </x-guest-section>

  <x-guest-section-dark>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

      <x-custom-card
        icon=""
        title="Power Interruption Schedule"
        text="View scheduled and emergency power interruptions in your area. Stay ahead of outages with real-time updates on affected barangays, interruption times, and the reason for each advisory."
        href="rate-and-advisories.power-interruption-schedule"
        cta="View Power Interruption Schedule" />

      <x-custom-card
        icon=""
        title="Advisories"
        text="Access official advisories and notices filed with the Energy Regulatory Commission (ERC). All documents are published in PDF format in compliance with transparency and public disclosure requirements."
        href="rate-and-advisories.advisories"
        cta="View Advisories" />

      <x-custom-card
        icon=""
        title="Rate Schedule / Customer Class"
        text="Review the current approved electricity rates per customer class as authorized by the ERC. Rate schedules cover residential, commercial, industrial, and other applicable consumer categories."
        href="rate-and-advisories.rate-schedule"
        cta="View Rate Schedule" />

      <x-custom-card
        icon=""
        title="Others"
        text="Browse additional regulatory documents, public notices, and official publications that do not fall under a specific category — including ERC orders, resolutions, and other relevant issuances applicable to TEI customers."
        href="rate-and-advisories.other-documents"
        cta="View Documents" />

    </div>

  </x-guest-section-dark>

</div>
