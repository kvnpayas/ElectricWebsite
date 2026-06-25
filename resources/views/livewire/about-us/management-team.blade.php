<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Management Team',
      'badgeTitle' => 'Company Profile',
      'subTitle'   => 'The department heads and managers who drive TEI\'s day-to-day operations across every area of the business.',
  ])


  <x-guest-section>

    @php
      $members = [

        // ── Senior Leadership ─────────────────────────
        [
          'name'     => 'Vitus M. Romero',
          'title'    => 'President and General Manager',
          'dept'     => 'Senior Leadership',
          'initials' => 'VR',
          'color'    => 'bg-tei-orange',
          'bio'      => 'Engr. Vitus M. Romero is the President and General Manager of TEI. He was elected to the position of President in May 2018. Prior to his election as President, he was elected General Manager at the annual stockholders\' meeting in 2016. He joined the company in 2006 and was appointed as the Head of the Retail Services Group which oversees the Consumer and Technical Services Departments.',
        ],
        [
          'name'     => 'Venus M. Romero',
          'title'    => 'Information Technology & Communication Services Head',
          'dept'     => 'Senior Leadership',
          'initials' => 'VR',
          'color'    => 'bg-tei-blue',
          'bio'      => 'Venus M. Romero has been the Head of the Information Technology Communications Department since 1991. He has also served as Vice President of the Company since 2018.',
        ],

        // ── Finance ───────────────────────────────────
        [
          'name'     => 'Maria Elisa B. Abaya',
          'title'    => 'Treasury Head',
          'dept'     => 'Finance',
          'initials' => 'MA',
          'color'    => 'bg-tei-blue/80',
          'bio'      => 'Ms. Maria Elisa Abaya is the company\'s Treasurer and Head of Treasury. She ensures that the Company has efficient liquidity planning and control related to the company\'s financial activities. Prior to her appointments as Treasurer and Treasury Head, she held the position of Administrative Services Head from July 2006 to May 2019. She joined the company in 1991 and held various accounting and audit positions.',
        ],
        [
          'name'     => 'Lorna J. Ragasa',
          'title'    => 'Accounting Head',
          'dept'     => 'Finance',
          'initials' => 'LR',
          'color'    => 'bg-tei-blue/80',
          'bio'      => 'Ms. Lorna J. Ragasa was appointed as Accounting Head last January 19, 2024. As Accounting Head, she is responsible for the efficient and effective implementation of controls and procedures involving the recording of financial transactions, and timely preparation of financial statement and related analysis and reports.',
        ],

        // ── Compliance & Legal ────────────────────────
        [
          'name'     => 'Floriza D. Forlales',
          'title'    => 'Compliance Officer',
          'dept'     => 'Compliance & Legal',
          'initials' => 'FF',
          'color'    => 'bg-tei-blue/80',
          'bio'      => 'Ms. Floriza D. Forlales is the Company\'s Compliance Officer. As Compliance Officer, she is responsible for the Company\'s full compliance to industry regulations and other reportorial requirements as may be required by the government and its instrumentalities.',
        ],

        // ── Operations ────────────────────────────────
        [
          'name'     => 'Anna Bianca R. Morales',
          'title'    => 'Acting Retail Services Head',
          'dept'     => 'Operations',
          'initials' => 'AM',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Ms. Anna Bianca R. Morales was appointed as Acting Retail Services Head in June 2022. She closely monitors the departments that involve retail activities — Consumer, Metering, and Technical Services — ensuring that retail activities are operating efficiently, from customer experience to metering and meter lab activities.',
        ],
        [
          'name'     => 'Roy Y. Yutuc',
          'title'    => 'Substation Operations & Maintenance Head',
          'dept'     => 'Operations',
          'initials' => 'RY',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Roy Y. Yutuc is responsible for the overall management and safety of the distribution system, substation operations and maintenance. He joined the company in 1997 as a Junior Electrical Engineer.',
        ],
        [
          'name'     => 'Alvin T. Mercado',
          'title'    => 'System Planning and Design Head',
          'dept'     => 'Operations',
          'initials' => 'AM',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Alvin T. Mercado is directly responsible for the overall management of the Company\'s system planning, engineering design, facility monitoring and distribution mapping operations. He joined the company in 1997 as a Junior Electrical Engineer.',
        ],
        [
          'name'     => 'Frederick C. Calma',
          'title'    => 'Metering Services Head',
          'dept'     => 'Operations',
          'initials' => 'FC',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Engr. Frederick C. Calma oversees all metering operations such as meter installation, meter accuracy monitoring, rehabilitation of meters, metering complaints, pilferage and maintenance. He joined the company in 1994 as a Cadet Engineer.',
        ],
        [
          'name'     => 'Angeline Rina M. Ramos',
          'title'    => 'Consumer Services Head',
          'dept'     => 'Operations',
          'initials' => 'AR',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Ms. Angeline Rina M. Ramos is the Consumer Services Head since June 2022. She ensures that the Company is responsibly performing administrative functions directly involving consumer welfare from new meter application, meter reading, billing, collection, disconnection, and reconnection, and is able to establish quality relationships with customers.',
        ],
        [
          'name'     => 'Nelson L. Gutierrez',
          'title'    => 'Technical Services Head',
          'dept'     => 'Operations',
          'initials' => 'NG',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Engr. Nelson L. Gutierrez was appointed as Technical Services Head on January 16, 2021. As Technical Services Head, he ensures the efficiency and alignment of the distribution mapping, facility monitoring, pole attachment management and meterlab\'s operations with the Company\'s overall direction.',
        ],
        [
          'name'     => 'Jayson T. Fider',
          'title'    => 'Lines Operations and Maintenance Head',
          'dept'     => 'Operations',
          'initials' => 'JF',
          'color'    => 'bg-tei-blue/70',
          'bio'      => 'Engr. Jayson T. Fider is the Lines Operations and Maintenance Head since June 2022. As Lines Operations and Maintenance Head, he is responsible for the overall efficient management and safety of the distribution and sub-transmission line system.',
        ],

        // ── Support Services ──────────────────────────
        [
          'name'     => 'Wendy V. Abad',
          'title'    => 'Human Resources Head',
          'dept'     => 'Support Services',
          'initials' => 'WA',
          'color'    => 'bg-slate-500',
          'bio'      => 'Ms. Wendy V. Abad has been appointed as Human Resource Head last September 18, 2023. She handles all HR related operations that range from employee recruitment, training design to human resource policies. She develops human resource programs to promote employee competency, well-being and overall company growth.',
        ],
        [
          'name'     => 'Jinalyn D. Quiazon',
          'title'    => 'General Services Head',
          'dept'     => 'Support Services',
          'initials' => 'JQ',
          'color'    => 'bg-slate-500',
          'bio'      => 'Jinalyn D. Quiazon is responsible for the day-to-day administrative transactions for procurement, warehousing, maintenance and security of company properties. She joined the Company in 2019 as a Management Trainee.',
        ],

        // ── Consultant ────────────────────────────────
        [
          'name'     => 'Henry John G. Sacaguing',
          'title'    => 'Consultant, Network Services',
          'dept'     => 'Consultant',
          'initials' => 'HS',
          'color'    => 'bg-emerald-600',
          'bio'      => 'Engr. Henry John Sacaguing is a Consultant for Network Services Group. He was the Network Services Head of the Company prior to his retirement on 30 October 2023, having been appointed to the position in April 2016. He also served as the Lines Operations and Maintenance Head from 1998. He joined the Company in 1983 as Electrical Lineman.',
        ],

      ];

      $deptColors = [
        'Senior Leadership'  => 'bg-tei-orange/10 text-tei-orange border-tei-orange/20',
        'Finance'            => 'bg-tei-blue/8 text-tei-blue border-tei-blue/15',
        'Compliance & Legal' => 'bg-violet-50 text-violet-700 border-violet-200',
        'Operations'         => 'bg-tei-blue/8 text-tei-blue border-tei-blue/15',
        'Support Services'   => 'bg-slate-100 text-slate-600 border-slate-200',
        'Consultant'         => 'bg-emerald-50 text-emerald-700 border-emerald-200',
      ];

      $grouped = collect($members)->groupBy('dept');
    @endphp


    @foreach ($grouped as $dept => $people)
      {{-- Department group --}}
      <div class="mb-14 scroll-reveal">

        {{-- Department heading --}}
        <div class="flex items-center gap-3 mb-7">
          <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $deptColors[$dept] }}">
            {{ $dept }}
          </span>
          <div class="flex-1 h-px" style="background: rgba(15,61,92,0.08);"></div>
        </div>

        {{-- Members grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-10 gap-y-8">

          @foreach ($people as $member)
            <div class="flex gap-4 scroll-reveal">

              {{-- Avatar --}}
              <div class="shrink-0">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-black text-sm {{ $member['color'] }}">
                  {{ $member['initials'] }}
                </div>
              </div>

              {{-- Info --}}
              <div class="flex-1 min-w-0">
                <h3 class="text-base font-black text-tei-blue leading-snug">{{ $member['name'] }}</h3>
                <p class="text-xs font-semibold text-tei-orange mt-0.5 mb-3">{{ $member['title'] }}</p>
                <p class="text-sm leading-relaxed text-tei-gray">{{ $member['bio'] }}</p>
              </div>

            </div>
          @endforeach

        </div>
      </div>
    @endforeach


    {{-- Back link --}}
    {{-- <div class="mt-4 pt-8 border-t scroll-reveal" style="border-color: rgba(15,61,92,0.08);">
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
