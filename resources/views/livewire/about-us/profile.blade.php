<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Company Profile',
      'badgeTitle' => 'About TEI',
      'subTitle'   => 'Learn about Tarlac Electric Inc. — our story, mission, vision, and the values that power our service.',
  ])


  <x-guest-section>

    {{-- ═══════════════════════════════════════════════
       COMPANY DESCRIPTION
    ═══════════════════════════════════════════════ --}}
    <div class="scroll-reveal mb-16">
      <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">

        {{-- Text --}}
        <div class="lg:col-span-3 space-y-4">
          <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase bg-tei-orange/10 text-tei-orange">
            Who We Are
          </span>
          <h2 class="text-2xl sm:text-3xl font-black text-tei-blue leading-snug">
            Powering Tarlac for Over 70 Years
          </h2>
          <p class="text-sm leading-relaxed text-tei-gray">
            Tarlac Electric Inc. (TEI – Tarlac) is a private electric distribution utility that has been supplying electric power to the City of Tarlac in the Tarlac province for over 70 years. With a franchise area of 275 sq. km., TEI provides energy to countless residential homes and commercial establishments. It has a peak demand of 79,900 kW and a customer base of almost 80,000 in 2018.
          </p>
          <p class="text-sm leading-relaxed text-tei-gray">
            TEI's customer base has exponentially grown from 25,000 in 1991 to 80,000 in 2018. Residential units make up 94% of the customer base, while 5.6% fall under the small commercial segment. The remaining 0.4% goes to secondary, primary, 69 kV, and flat/street lights customer classes.
          </p>
          <p class="text-sm leading-relaxed text-tei-gray">
            The company's power supply has expanded to keep up with its customers' growing demands. From only having two (2) substations with a total capacity of 80 MVA connected to six (6) 13.8 kV feeders back in 1991, it currently has six (6) substations with a total capacity of 156 MVA connected to twenty (20) 13.8 kV feeders.
          </p>
        </div>

        {{-- Stats sidebar --}}
        <div class="lg:col-span-2 grid grid-cols-2 gap-4">
          @foreach ([
            ['275', 'sq. km.', 'Franchise Area', 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'],
            ['80K+', 'customers', 'Customer Base (2018)', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
            ['156 MVA', 'capacity', 'Total Substation Capacity', 'M13 10V3L4 14h7v7l9-11h-7z'],
            ['20', 'feeders', '13.8 kV Feeders', 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0'],
          ] as [$val, $unit, $label, $icon])
            <div class="rounded-2xl p-5 border scroll-reveal"
              style="border-color: rgba(15,61,92,0.08); background: linear-gradient(135deg, rgba(15,61,92,0.03), rgba(15,61,92,0.01));">
              <div class="w-9 h-9 rounded-xl flex items-center justify-center mb-3 bg-tei-orange/10">
                <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                </svg>
              </div>
              <p class="text-2xl font-black text-tei-blue leading-none">{{ $val }}</p>
              <p class="text-xs text-tei-orange font-semibold mt-0.5">{{ $unit }}</p>
              <p class="text-xs text-tei-gray mt-1 leading-snug">{{ $label }}</p>
            </div>
          @endforeach
        </div>

      </div>
    </div>

    {{-- ═══════════════════════════════════════════════
       MISSION / VISION / VALUES
    ═══════════════════════════════════════════════ --}}
    <div class="mb-16 scroll-reveal">
      <div class="text-center mb-10">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Our Foundation
        </span>
        <h2 class="text-2xl sm:text-3xl font-black text-tei-blue">Mission, Vision & Values</h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

        {{-- Mission --}}
        <div class="rounded-2xl p-7 border text-center scroll-reveal"
          style="border-color: rgba(15,61,92,0.09); background: linear-gradient(135deg, rgba(15,61,92,0.04), rgba(15,61,92,0.01));">
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="text-sm font-black uppercase tracking-widest text-tei-orange mb-3">Mission</h3>
          <p class="text-sm leading-relaxed text-tei-gray italic">
            "To provide quality electricity efficiently to the community."
          </p>
        </div>

        {{-- Vision --}}
        <div class="rounded-2xl p-7 border text-center scroll-reveal"
          style="border-color: rgba(231,103,39,0.15); background: linear-gradient(135deg, rgba(231,103,39,0.06), rgba(231,103,39,0.02));">
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-tei-orange/10">
            <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </div>
          <h3 class="text-sm font-black uppercase tracking-widest text-tei-orange mb-3">2024 Vision</h3>
          <p class="text-sm leading-relaxed text-tei-gray italic">
            "To be an outstanding utility."
          </p>
        </div>

        {{-- Values --}}
        <div class="rounded-2xl p-7 border text-center scroll-reveal"
          style="border-color: rgba(15,61,92,0.09); background: linear-gradient(135deg, rgba(15,61,92,0.04), rgba(15,61,92,0.01));">
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </div>
          <h3 class="text-sm font-black uppercase tracking-widest text-tei-orange mb-4">Values</h3>
          <div class="flex flex-wrap justify-center gap-2">
            @foreach (['Quality', 'Integrity', 'Commitment', 'Humility', 'Stewardship'] as $value)
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-tei-blue/8 text-tei-blue">
                {{ $value }}
              </span>
            @endforeach
          </div>
        </div>

      </div>
    </div>

    {{-- ═══════════════════════════════════════════════
       COMPANY DOCUMENTS & LINKS
    ═══════════════════════════════════════════════ --}}
    <div class="scroll-reveal">
      <div class="text-center mb-10">
        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold tracking-[0.15em] uppercase mb-4 bg-tei-orange/10 text-tei-orange">
          Company Information
        </span>
        <h2 class="text-2xl sm:text-3xl font-black text-tei-blue">People & Documents</h2>
        <p class="text-sm max-w-lg mx-auto mt-2 text-tei-gray">
          Learn more about TEI's leadership and access official company documents.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 stagger-cards">

        {{-- Board of Directors --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Board of Directors</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Meet the board of directors that provide strategic oversight and governance for Tarlac Electric Inc.
          </p>
          <a href="{{ route('about-us.profile.board-of-directors') }}" wire:navigate
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View Board
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- Executive Officers --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
            <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Executive Officers</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Get to know the executive officers who lead TEI's day-to-day operations and long-term direction.
          </p>
          <a href="{{ route('about-us.profile.executive-officers') }}" wire:navigate
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View Officers
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- Management Team --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Management Team</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Explore the department heads and managers who ensure TEI delivers quality service across all operations.
          </p>
          <a href="{{ route('about-us.profile.management-team') }}" wire:navigate
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View Team
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- Organizational Chart --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
            <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Organizational Structure</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            View the complete organizational structure of Tarlac Electric Inc. and how each department connects.
          </p>
          <a href="{{ route('about-us.profile.organizational-structure') }}" wire:navigate
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View Structure
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- Articles of Incorporation --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Articles of Incorporation</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Access TEI's Articles of Incorporation — the founding legal document establishing the corporation and its purpose.
          </p>
          <a href="#"
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View Document
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- By Laws --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
            <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">By Laws</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Review the internal rules and regulations that govern the management and operations of Tarlac Electric Inc.
          </p>
          <a href="#"
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            View By Laws
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

      </div>
    </div>

  </x-guest-section>

</div>
