<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Executive Officers',
      'badgeTitle' => 'Company Profile',
      'subTitle'   => 'Meet the executive officers who lead the day-to-day operations and long-term direction of Tarlac Electric Inc.',
  ])


  <x-guest-section>

    @php
      $officers = [
        [
          'name'     => 'Vivencio M. Romero Jr.',
          'title'    => 'Chairman of the Board',
          'type'     => 'chairman',
          'initials' => 'VR',
          'bio'      => [
            'Engr. Vivencio M. Romero, Jr. has been the Chairman of the Board of Tarlac Electric Inc. since 1992. He was the President and General Manager of the Company from 1992 to 2018. He joined the Company in 1982 as Assistant Operations Manager.',
          ],
        ],
        [
          'name'     => 'Vitus M. Romero',
          'title'    => 'President and General Manager',
          'type'     => 'president',
          'initials' => 'VR',
          'bio'      => [
            'Engr. Vitus M. Romero is the President and General Manager of TEI. He was elected to the position of President in May 2018. Prior to his election as President, he was elected General Manager at the annual stockholders\' meeting in 2016, a position he holds up to this day. He joined the company in 2006 and was appointed as the Head of the Retail Services Group which oversees the Consumer and Technical Services Departments.',
          ],
        ],
        [
          'name'     => 'Venus M. Romero',
          'title'    => 'Vice President',
          'type'     => 'vp',
          'initials' => 'VR',
          'bio'      => [
            'Mr. Venus M. Romero was elected Vice President in May 2018, a position he holds up to this day. Aside from being a Vice-President, he has been the Head of the Company\'s Information Technology Department since 1991.',
          ],
        ],
        [
          'name'     => 'Maria Elisa B. Abaya',
          'title'    => 'Treasurer',
          'type'     => 'officer',
          'initials' => 'MA',
          'bio'      => [
            'Ms. Maria Elisa Abaya is the company\'s Treasurer and Treasury Head. She was appointed as Treasurer in May 2019. Prior to her appointment as Treasurer, she held the position of Administrative Services Head from July 2006 to May 2019. She joined the company in 1991 and held various accounting and audit positions.',
          ],
        ],
        [
          'name'     => 'Floriza D. Forlales',
          'title'    => 'Compliance Officer',
          'type'     => 'officer',
          'initials' => 'FF',
          'bio'      => [
            'Ms. Floriza D. Forlales is the Company\'s Compliance Officer and Head of Compliance. She was appointed as the Company\'s Compliance Officer in January 2021. Ms. Forlales was also appointed as the Company\'s Regulatory Compliance Officer in April 2017 and was subsequently appointed as Data Protection Officer in March 2024. She joined the Company in 2002 as a Corporate Accountant and was appointed as Chief Accountant in January 2008.',
          ],
        ],
        [
          'name'     => 'Leandro Rodel V. Atienza',
          'title'    => 'Corporate Secretary',
          'type'     => 'officer',
          'initials' => 'LA',
          'bio'      => [
            'Atty. Leandro Rodel V. Atienza was elected as the Corporate Secretary of the Company in 2019. He has been the Company\'s legal counsel since 2014.',
          ],
        ],
        [
          'name'     => 'Fredrick Rodel V. Atienza',
          'title'    => 'Assistant Corporate Secretary',
          'type'     => 'officer',
          'initials' => 'FA',
          'bio'      => [
            'Atty. Fredrick Rodel V. Atienza was elected as Assistant Corporate Secretary on 28 June 2024.',
          ],
        ],
      ];

      $badgeCfg = [
        'chairman' => ['bg-tei-orange/10 text-tei-orange border-tei-orange/20', 'Chairman'],
        'president' => ['bg-tei-blue/8 text-tei-blue border-tei-blue/15',       'President & GM'],
        'vp'        => ['bg-tei-blue/8 text-tei-blue border-tei-blue/15',       'Vice President'],
        'officer'   => ['bg-slate-100 text-slate-600 border-slate-200',         'Officer'],
      ];

      $avatarCfg = [
        'chairman' => 'bg-tei-orange',
        'president' => 'bg-tei-blue',
        'vp'        => 'bg-tei-blue/80',
        'officer'   => 'bg-slate-500',
      ];
    @endphp

    {{-- Officer list --}}
    <div class="max-w-4xl mx-auto">

      @foreach ($officers as $index => $officer)
        @php
          [$badgeClass, $badgeLabel] = $badgeCfg[$officer['type']];
          $avatarClass = $avatarCfg[$officer['type']];
          $isLast = $index === count($officers) - 1;
        @endphp

        <div class="scroll-reveal {{ $isLast ? '' : 'mb-10 pb-10 border-b' }}"
          style="{{ $isLast ? '' : 'border-color: rgba(15,61,92,0.08);' }}">

          <div class="flex gap-5 sm:gap-8">

            {{-- Avatar --}}
            <div class="shrink-0">
              <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center text-white font-black text-lg {{ $avatarClass }}">
                {{ $officer['initials'] }}
              </div>
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">

              {{-- Name + badge --}}
              <div class="flex flex-wrap items-start gap-2 mb-1">
                <h3 class="text-lg font-black text-tei-blue leading-snug">
                  {{ $officer['name'] }}
                </h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $badgeClass }} mt-0.5">
                  {{ $badgeLabel }}
                </span>
              </div>

              {{-- Title --}}
              <p class="text-sm font-semibold text-tei-orange mb-4">
                {{ $officer['title'] }}
              </p>

              {{-- Bio --}}
              <div class="space-y-3">
                @foreach ($officer['bio'] as $paragraph)
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
