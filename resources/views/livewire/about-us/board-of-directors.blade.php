<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Board of Directors',
      'badgeTitle' => 'Company Profile',
      'subTitle'   => 'Meet the board of directors who provide strategic oversight and governance for Tarlac Electric Inc.',
  ])


  <x-guest-section>

    @php
      $directors = [
        [
          'name'    => 'Vivencio M. Romero Jr.',
          'title'   => 'Chairman of the Board',
          'type'    => 'chairman',
          'initials'=> 'VR',
          'bio'     => [
            'Engr. Vivencio M. Romero, Jr. has been the Chairman of the Board of Tarlac Electric Inc. since 1992. He was the President and General Manager of the Company from 1992 to 2018. He joined the Company in 1982 as Assistant Operations Manager.',
          ],
        ],
        [
          'name'    => 'Vitus M. Romero',
          'title'   => 'Director/President and General Manager',
          'type'    => 'officer',
          'initials'=> 'VR',
          'bio'     => [
            'Engr. Vitus M. Romero is the President and General Manager of TEI. He was elected to the position of President in May 2018. Prior to his election as President, he was elected General Manager at the annual stockholders\' meeting in 2016, a position he holds up to this day. He joined the company in 2006 and was appointed as the Head of the Retail Services Group which oversees the Consumer and Technical Services Departments.',
            'He was initially elected to the Board of Directors in April 2007 and has been re-elected at each subsequent annual meeting. He was elected as member of the Company\'s Board Corporate Governance Committee in June 2025.',
          ],
        ],
        [
          'name'    => 'Venus M. Romero',
          'title'   => 'Director/Vice President',
          'type'    => 'officer',
          'initials'=> 'VR',
          'bio'     => [
            'Mr. Venus M. Romero was elected Vice President in May 2018, a position he holds up to this day. Aside from being a Vice-President, he has been the Head of the Company\'s Information Technology Department since 1991.',
            'Mr. Romero was initially elected as a Director in April 1997 and has been re-elected at each subsequent annual meeting. He was elected as member of the Company\'s Board Risk Oversight Committee in June 2025.',
          ],
        ],
        [
          'name'    => 'Maria Victoria R. San Pascual',
          'title'   => 'Director',
          'type'    => 'director',
          'initials'=> 'MS',
          'bio'     => [
            'Ms. Maria Victoria R. San Pascual was first elected to the Board of Directors in May 2017 and has been consistently re-elected at every annual meeting thereafter. She was also the Corporate Secretary from 2005 to June 2019, and a consultant from 2018 to 2021. Prior to those positions, she was the Administrative Manager from 1983-1995.',
            'Ms. San Pascual was elected as Member of the Company\'s Board Audit Committee in March 2021 and in June 2025.',
          ],
        ],
        [
          'name'    => 'Miriam S. Galvez',
          'title'   => 'Independent Director',
          'type'    => 'independent',
          'initials'=> 'MG',
          'bio'     => [
            'Engr. Miriam S. Galvez was elected as Independent Director on 27 January 2021 to serve for the remaining term of the resigning director, Mr. Virgilio M. Romero, and was re-elected as Independent Director during the Annual Stockholders\' Meeting from 2022 to 2025. She was also elected as Chairperson of the Board Audit Committee in March 2021 and June 2025, and as member of the Corporate Governance Committee and Board Risk Oversight Committee in June 2025.',
            'Engr. Galvez earned her Masters in Engineering Education Major in Electrical Engineering degree in 1990 and Doctor of Education degree in 2006 from the Central Luzon Polytechnic College (now NEUST). She has been a faculty member of Tarlac State University since 1991, served as Dean of the College of Engineering and Technology from 2014 to August 2022, and served as Chairperson of the College of Engineering Graduate Program. She has been re-appointed as the Dean of the College of Engineering for Academic Year 2024-2025.',
          ],
        ],
        [
          'name'    => 'Augusto D. Sarmiento',
          'title'   => 'Independent Director',
          'type'    => 'independent',
          'initials'=> 'AS',
          'bio'     => [
            'Engr. Augusto D. Sarmiento was elected as Independent Director in June 2025. Engr. Sarmiento earned his Bachelor of Science in Electrical Engineering degree from the Holy Angel University in 1980 and completed his Master of Business Administration from University of Pangasinan-PHINMA in 2013. He is both a Registered Electrical Engineer and a Professional Electrical Engineer.',
            'With decades of experience in the electric industry, Engr. Sarmiento began his career as Cadet Engineer in 1981 in a private distribution utility. He was subsequently promoted as Line Supervisor in 1983, Senior Supervising Engineer QCO in 1986, and Assistant Area Manager-QCO in 1996. He later served as Operations Manager in 2001, Network Operations Manager in 2004 and Chief Operating Officer of the same company from 2019 until his retirement in 2024.',
          ],
        ],
      ];

      $badgeCfg = [
        'chairman'    => ['bg-tei-orange/10 text-tei-orange border-tei-orange/20',  'Chairman'],
        'officer'     => ['bg-tei-blue/8 text-tei-blue border-tei-blue/15',         'Officer'],
        'director'    => ['bg-tei-blue/8 text-tei-blue border-tei-blue/15',         'Director'],
        'independent' => ['bg-emerald-50 text-emerald-700 border-emerald-200',      'Independent Director'],
      ];

      $avatarCfg = [
        'chairman'    => 'bg-tei-orange',
        'officer'     => 'bg-tei-blue',
        'director'    => 'bg-tei-blue/80',
        'independent' => 'bg-emerald-600',
      ];
    @endphp

    {{-- Director list --}}
    <div class="max-w-4xl mx-auto">

      @foreach ($directors as $index => $director)
        @php
          [$badgeClass, $badgeLabel] = $badgeCfg[$director['type']];
          $avatarClass = $avatarCfg[$director['type']];
          $isLast = $index === count($directors) - 1;
        @endphp

        <div class="scroll-reveal {{ $isLast ? '' : 'mb-10 pb-10 border-b' }}"
          style="{{ $isLast ? '' : 'border-color: rgba(15,61,92,0.08);' }}">

          <div class="flex gap-5 sm:gap-8">

            {{-- Avatar --}}
            <div class="shrink-0">
              <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center text-white font-black text-lg {{ $avatarClass }}">
                {{ $director['initials'] }}
              </div>
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">

              {{-- Name + badge --}}
              <div class="flex flex-wrap items-start gap-2 mb-1">
                <h3 class="text-lg font-black text-tei-blue leading-snug">
                  {{ $director['name'] }}
                </h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $badgeClass }} mt-0.5">
                  {{ $badgeLabel }}
                </span>
              </div>

              {{-- Title --}}
              <p class="text-sm font-semibold text-tei-orange mb-4">
                {{ $director['title'] }}
              </p>

              {{-- Bio --}}
              <div class="space-y-3">
                @foreach ($director['bio'] as $paragraph)
                  <p class="text-sm leading-relaxed text-tei-gray">{{ $paragraph }}</p>
                @endforeach
              </div>

            </div>
          </div>

        </div>
      @endforeach

    </div>

    {{-- Back link --}}
    {{-- <div class="max-w-4xl mx-auto mt-12 pt-8 border-t scroll-reveal" style="border-color: rgba(15,61,92,0.08);">
      <a href="{{ route('about-us.profile') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-bold text-tei-blue transition-all duration-200 hover:text-tei-orange">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Company Profile
      </a>
    </div> --}}

  </x-guest-section>

</div>
