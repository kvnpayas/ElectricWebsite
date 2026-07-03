<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'About Us',
      'badgeTitle' => 'About TEI',
      'subTitle' => 'Learn about Tarlac Electric Inc. — our history, governance, and commitment to powering the city of Tarlac.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION — ABOUT TOPICS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading title="Explore" heading="Learn More About TEI"
      text="From our company profile to investor information, find everything you need to know about Tarlac Electric Inc."
      align="center" />

  </x-guest-section>
  <x-guest-section-dark>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      <x-custom-card title="Profile" icon=""
        text="Discover the story of Tarlac Electric Inc. — our founding, mission, vision, and the values that guide us in serving over a hundred thousand customers across Tarlac."
        href="about-us.profile" cta="View Profile" />

      <x-custom-card title="Corporate Governance" icon=""
        text="TEI is committed to the highest standards of corporate governance. Learn about our board of directors, organizational structure, and the policies that ensure accountability and transparency."
        href="about-us.corporate-governance" cta="View Governance" />

      <x-custom-card title="Disclosures" icon=""
        text="Access official regulatory disclosures and filings required by the Energy Regulatory Commission (ERC) and other governing bodies, in line with our commitment to full transparency."
        href="about-us.disclosures" cta="View Disclosures" />

      <x-custom-card title="Investor Relations" icon=""
        text="Find financial reports, annual statements, and key information for stakeholders and investors who trust in Tarlac Electric Inc.'s long-term growth and service commitment."
        href="about-us.investor-relations" cta="View Investor Info" />

      <x-custom-card title="Press Materials / News" icon=""
        text="Stay up to date with the latest TEI news, press releases, announcements, and media resources. Follow our updates to know what's happening across the company and our service area."
        href="about-us.press-materials" cta="Read Latest News" />

      <x-custom-card title="FAQs" icon=""
        text="Find answers to commonly asked questions about TEI services, billing, connections, and more."
        href="about-us.faqs" cta="View FAQs" />

    </div>

  </x-guest-section-dark>

</div>
