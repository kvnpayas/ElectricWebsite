<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Company Profile',
      'badgeTitle' => 'About TEI',
      'subTitle'   => 'Learn about Tarlac Electric Inc. — our story, mission, vision, and the values that power our service.',
  ])


  {{-- ═══════════════════════════════════════════════
     SECTION 1 — COMPANY PROFILE
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading
      title="Who We Are"
      heading="Company Profile"
      align="left" />

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-start">

      {{-- Description text --}}
      <div class="lg:col-span-3 space-y-4">
        <p class="text-sm leading-relaxed text-tei-gray">
          Tarlac Electric Inc. (TEI - Tarlac) is a private electric distribution utility that has been supplying electric power to the City of Tarlac in the Tarlac province for over 70 years. With a franchise area of 275 sq. km., TEI provides energy to countless residential homes and commercial establishments. It has a peak demand of 79,900 kW and a customer base of almost 80,000 in 2018.
        </p>
        <p class="text-sm leading-relaxed text-tei-gray">
          TEI's customer base has exponentially grown from 25,000 in 1991 to 80,000 in 2018. Residential units make up 94% of the customer base, while 5.6% fall under the small commercial segment. The remaining 0.4% goes to secondary, primary, 69 kV, and flat/street lights customer classes.
        </p>
        <p class="text-sm leading-relaxed text-tei-gray">
          The company's power supply has expanded to keep up with its customers' growing demands. From only having two (2) substations with a total capacity of 80 MVA connected to six (6) 13.8 kV feeders back in 1991, it currently has six (6) substations with a total capacity of 156 MVA connected to twenty (20) 13.8 kV feeders.
        </p>
      </div>

      {{-- Stats --}}
      <div class="lg:col-span-2 grid grid-cols-2 gap-4">
        @foreach ([
          ['275', 'sq. km.', 'Franchise Area'],
          ['80K+', 'customers', 'Customer Base (2018)'],
          ['156 MVA', 'capacity', 'Total Substation Capacity'],
          ['20', 'feeders', '13.8 kV Feeders'],
        ] as [$val, $unit, $label])
          <x-card variant="primary">
            <p class="text-2xl font-black text-tei-blue leading-none">{{ $val }}</p>
            <p class="text-[11px] font-bold text-tei-orange mt-1 uppercase tracking-wide">{{ $unit }}</p>
            <p class="text-xs text-tei-gray mt-1.5 leading-snug">{{ $label }}</p>
          </x-card>
        @endforeach
      </div>

    </div>

  </x-guest-section>


  {{-- ═══════════════════════════════════════════════
     SECTION 2 — MISSION / VISION / VALUES
  ═══════════════════════════════════════════════ --}}
  <x-guest-section-dark>

    <x-section-heading
      title="Our Foundation"
      heading="Mission, Vision & Values"
      align="left" />

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 stagger-cards">

      {{-- Mission --}}
      <x-card variant="primary">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-4">Mission</p>
        <p class="text-sm leading-relaxed text-tei-gray italic">
          "To provide quality electricity efficiently to the community."
        </p>
      </x-card>

      {{-- Vision --}}
      <x-card variant="secondary">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-4">2024 Vision</p>
        <p class="text-sm leading-relaxed text-tei-gray italic">
          "To be an outstanding utility."
        </p>
      </x-card>

      {{-- Values --}}
      <x-card variant="primary">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-4">Values</p>
        <div class="space-y-2">
          @foreach (['Quality', 'Integrity', 'Commitment', 'Humility', 'Stewardship'] as $value)
            <p class="text-[10px] font-black text-tei-gray uppercase tracking-[0.18em]">{{ $value }}</p>
          @endforeach
        </div>
      </x-card>

    </div>

  </x-guest-section-dark>


  {{-- ═══════════════════════════════════════════════
     SECTION 3 — PEOPLE & DOCUMENTS
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-section-heading
      title="Company Information"
      heading="People & Documents"
      text="Learn more about TEI's leadership and access official company documents."
      align="left" />

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

      <x-custom-card icon=""
        title="Board of Directors"
        text="Meet the board of directors that provide strategic oversight and governance for Tarlac Electric Inc."
        href="about-us.profile.board-of-directors"
        cta="View Board" />

      <x-custom-card icon=""
        title="Executive Officers"
        text="Get to know the executive officers who lead TEI's day-to-day operations and long-term direction."
        href="about-us.profile.executive-officers"
        cta="View Officers" />

      <x-custom-card icon=""
        title="Management Team"
        text="Explore the department heads and managers who ensure TEI delivers quality service across all operations."
        href="about-us.profile.management-team"
        cta="View Team" />

      <x-custom-card icon=""
        title="Organizational Chart"
        text="View the complete organizational chart of Tarlac Electric Inc. and how each department connects."
        href="about-us.profile.organizational-structure"
        cta="View Chart" />

      <x-custom-card icon=""
        title="Articles of Incorporation"
        text="Access TEI's Articles of Incorporation — the founding legal document establishing the corporation and its purpose."
        href="about-us.profile.articles-of-incorporation"
        cta="View Document" />

      <x-custom-card icon=""
        title="By Laws"
        text="Review the internal rules and regulations that govern the management and operations of Tarlac Electric Inc."
        href="about-us.profile.by-laws"
        cta="View By Laws" />

    </div>

  </x-guest-section>

</div>
