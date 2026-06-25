<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Privacy Policy',
      'badgeTitle' => 'Legal',
      'subTitle'   => 'How we collect, protect, use, and share your personal information.',
  ])


  <x-guest-section>

    {{-- Intro card --}}
    <div class="rounded-2xl p-6 sm:p-8 scroll-reveal bg-linear-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">TEI Privacy Policy Statement</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            This Privacy Policy covers your personal information when transacting or doing business with
            <strong class="font-semibold text-tei-blue">Tarlac Electric, Inc.</strong>
            (individually and collectively known as "TEI", the "Company", "we", "us" or "our").
          </p>
          <p class="text-sm leading-relaxed text-tei-gray mt-3">
            Maintaining your privacy is an important part of the products and services that we provide. This Privacy
            Statement, hereafter referred to as "Statement", explains how we collect, protect, use, and share information
            when you access our social media page and/or apply for and avail of our products and services.
          </p>
        </div>
      </div>
    </div>

  </x-guest-section>


  <section class="py-16 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:grid lg:grid-cols-[240px_1fr] lg:gap-10">

        {{-- ── Sticky sidebar TOC (desktop only) ── --}}
        <aside class="hidden lg:block self-start sticky top-24">
          <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3 px-3">On This Page</p>
            <nav class="flex flex-col gap-0.5">
              @foreach ([
                ['rights',       'Rights of Data Subjects'],
                ['customers',    'Customer Data'],
                ['employees',    'Employee Data'],
                ['vendors',      'Vendor & Supplier Data'],
                ['contractors',  'Contractor Data'],
                ['shareholders', 'Shareholder Data'],
                ['guests',       'Guest / Visitor Data'],
                ['updating',     'Updating Personal Data'],
                ['disclosure',   'Data Disclosure & Sharing'],
                ['protective',   'Protective Measures'],
                ['retention',    'Retention & Disposal'],
                ['additional',   'Additional Information'],
              ] as [$id, $label])
                <a href="#{{ $id }}"
                  class="text-xs text-tei-gray/70 hover:text-tei-blue px-3 py-2 rounded-lg hover:bg-tei-blue/5 transition-colors duration-150">
                  {{ $label }}
                </a>
              @endforeach
            </nav>
        </aside>

        {{-- ── Content cards ── --}}
        <div class="mt-0 flex flex-col gap-5">


          {{-- ═══ 1. Rights of Data Subjects ═══ --}}
          <div id="rights" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Rights Of Data Subjects</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6">
              <p class="text-sm text-tei-gray leading-relaxed mb-4">Data subjects have the following rights:</p>
              <ol class="space-y-2.5 mb-5">
                @foreach ([
                  'Right to be informed;',
                  'Right to object;',
                  'Right to access;',
                  'Right to rectify or correct erroneous data;',
                  'Right to erase or block;',
                  'Right to secure data portability;',
                  'Right to indemnified for damages; and',
                  'Right to file a complaint.',
                ] as $i => $item)
                  <li class="flex items-start gap-3 text-sm text-tei-gray">
                    <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
              <p class="text-sm text-tei-gray leading-relaxed">
                The Company's decisions to provide access, consider requests for correction or erasure, and address
                objection to process personal data as it appears in the Company's official records, are always subject to
                applicable and relevant laws and/or the DPA, its IRR and other issuances of the NPC.
              </p>
            </div>
          </div>


          {{-- ═══ 2. Customer Data ═══ --}}
          <div id="customers" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue leading-snug">Data We Collect From Prospective And Existing Customers, Including Customers With Terminated Services</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-5">

              <div>
                <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you provide to us when you apply for service:</p>
                <ul class="space-y-2 ml-3">
                  @foreach (['Name', 'Address', 'Contact number (Mobile, Telephone, Fax)', 'Email Address', 'Tax Identification Number (TIN)'] as $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                      {{ $item }}
                    </li>
                  @endforeach
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                    <div>
                      Proof of Ownership/ Occupancy
                      <ul class="mt-2 space-y-1.5 ml-4">
                        @foreach (['Transfer Certificate of Title', 'Deed of Sale', 'Waiver of Rights', 'Contract of Lease', 'Other related documents'] as $sub)
                          <li class="flex items-start gap-2 text-sm text-tei-gray/75">
                            <span class="w-1 h-1 rounded-full bg-tei-orange/50 shrink-0 mt-2"></span>
                            {{ $sub }}
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                    Details of authorized representative, if applicable
                  </li>
                </ul>
              </div>

              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">2.</span>
                Information you give us when you communicate with any of our representatives such as with respect to
                inquiries and complaint details on the quality and reliability of electric service.
              </p>
              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">3.</span>
                Information you provide for verification purpose (to facilitate refunds or to avail of zero-rate VAT
                transactions), such as photocopy of a valid identification card.
              </p>
              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">4.</span>
                Any other information you voluntarily provide for any legitimate purpose declared at point of collection
                of such information.
              </p>

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach (['Manage your accounts', 'Respond to your inquiry, concern or complaint'] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">3</span>
                    <div>
                      Send messages such as:
                      <ul class="mt-2 space-y-1.5 ml-2">
                        @foreach (['Outage/power interruption notifications', 'Updates on application/ additional requirements', 'Statement of Accounts', 'Other information that you may request'] as $sub)
                          <li class="flex items-start gap-2 text-sm text-tei-gray/75">
                            <span class="w-1 h-1 rounded-full bg-tei-orange/50 shrink-0 mt-2"></span>
                            {{ $sub }}
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  @foreach (['Verify your identity and eligibility to claim refund.', 'To meet legal and regulatory requirements. This include processing or disclosure of information that may be required under pertinent laws, rules, or regulations.'] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 4 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>

            </div>
          </div>


          {{-- ═══ 3. Employee Data ═══ --}}
          <div id="employees" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue leading-snug">Data We Collect From Prospective, Active And Separated Employees</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-3">
              @foreach ([
                'Information you submit when you apply at TEI for work, including what is contained in your resume or curriculum vitae and application form',
                'Information we collect during the processing of your application, such as testing results, employment offer, results of character investigation, and pre-employment medical assessment',
                'Information we collect and maintain about you during your employment such as your payroll information, including but not limited to government mandated and third party remittances like SSS, Philhealth, and Pag-ibig contributions, taxes, bank account information; wages; entitlements and benefits; health and welfare benefits; medical and dental care records; beneficiary and emergency contact information; training and certifications, performance evaluation; sanctions; employment changes/ work history',
                'Information we retain about you even after your separation from service, such as beneficiaries, and contact information',
                'Any other information you voluntarily provide for any legitimate purpose declared at point of collection of such information',
              ] as $i => $item)
                <p class="text-sm text-tei-gray leading-relaxed">
                  <span class="font-semibold text-tei-blue">{{ $i + 1 }}.</span> {{ $item }}
                </p>
              @endforeach

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12 mt-5!">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach ([
                    'Evaluate your eligibility for initial employment, including the verification of your qualifications and character references (background checking)',
                    'Administer your pay, statutory deductions, entitlements, and benefits',
                    'Comply with applicable statutory and regulatory requirements and submissions',
                    'Conduct performance reviews and rewards',
                    'Establish appropriate training and/or developmental interventions',
                    'Administer disciplinary action and sanctions',
                    'Collect and maintain contact information',
                    'Maintain your employment records',
                    'Process employee work-related claims',
                    'Develop health and wellness programs',
                  ] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>
            </div>
          </div>


          {{-- ═══ 4. Vendor & Supplier Data ═══ --}}
          <div id="vendors" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Vendors And Suppliers</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-5">
              <div>
                <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you submit to TEI for processing of payments:</p>
                <ul class="space-y-2 ml-3">
                  @foreach ([
                    'Name',
                    'Tax Identification Number (TIN), copy of Certificate of Registration with the Bureau of Internal Revenue',
                    'Address',
                    'Contact details',
                    'Banking information',
                  ] as $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ul>
              </div>
              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">2.</span>
                Any other information you voluntarily provide for any legitimate purpose declared at point of collection of such information.
              </p>

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach ([
                    'Establish and manage business relationships with you',
                    'Facilitate the payment of your invoices for any goods delivered or services rendered',
                    'Comply with statutory, legal and regulatory requirements',
                    'Update or maintain your vendor account information',
                    'Establish details of your authorized contact persons and services you deliver and receiving of payment',
                  ] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>
            </div>
          </div>


          {{-- ═══ 5. Contractor Data ═══ --}}
          <div id="contractors" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Contractors</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-4">
              <ul class="space-y-2">
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">1</span>
                  Audited Financial Statements
                </li>
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">2</span>
                  DOLE Certificates
                </li>
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">3</span>
                  <div>
                    Information you provide for processing of payments:
                    <ul class="mt-2 space-y-2 ml-2">
                      @foreach ([
                        'Name',
                        'Tax Identification Number (TIN), copy of Certificate of Registration with the Bureau of Internal Revenue',
                        'Address',
                        'Contact details',
                        'Banking Information',
                      ] as $sub)
                        <li class="flex items-start gap-2 text-sm text-tei-gray/80">
                          <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                          {{ $sub }}
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">4</span>
                  Any other information you voluntarily provide for any legitimate purpose declared at point of collection of such information.
                </li>
              </ul>

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12 mt-2">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach ([
                    'Facilitate the payment of your invoices for any services rendered',
                    'Comply with statutory, legal and regulatory requirements',
                    'Update or maintain your account information',
                    'Establish details of your authorized contact persons for the services you render and receiving of payment',
                  ] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>
            </div>
          </div>


          {{-- ═══ 6. Shareholder Data ═══ --}}
          <div id="shareholders" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Shareholders</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-5">
              <div>
                <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you submit to us when you become a shareholder of or in the course of being a shareholder of TEI:</p>
                <ul class="space-y-2 ml-3">
                  @foreach ([
                    'Name',
                    'Address',
                    'Contact details',
                    'Marital status',
                    'Government issued identification',
                    'Details of your authorized representative if applicable',
                  ] as $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ul>
              </div>
              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">2.</span>
                Any other information you voluntarily provide for any legitimate purpose declared at point of collection of such information.
              </p>

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach ([
                    'Maintain our shareholder register',
                    'Manage your account',
                    'Comply with statutory, legal and regulatory requirements',
                    'Handle dividends or any other payments',
                    'Facilitate communications',
                  ] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>
            </div>
          </div>


          {{-- ═══ 7. Guest / Visitor Data ═══ --}}
          <div id="guests" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Guests / Visitors</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-5">
              <div>
                <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you provide when you enter TEI's premises:</p>
                <ul class="space-y-2 ml-3">
                  @foreach (['Name', 'Address', 'Vehicle type and plate number or conduction sticker number'] as $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ul>
              </div>
              <p class="text-sm text-tei-gray leading-relaxed">
                <span class="font-semibold text-tei-blue">2.</span>
                Any information you voluntarily provide for any legitimate purpose declared at point of collection of such information.
              </p>

              {{-- Purpose --}}
              <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
                <div class="flex items-center gap-2 mb-3">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center bg-tei-orange/12">
                    <svg class="w-3.5 h-3.5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange">Purpose</p>
                </div>
                <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
                <ol class="space-y-2.5">
                  @foreach ([
                    'Establish your identity',
                    'Record the purpose of your visit',
                    'Monitor your activities inside the company premises',
                  ] as $i => $item)
                    <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                      <span class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                      {{ $item }}
                    </li>
                  @endforeach
                </ol>
              </div>
            </div>
          </div>


          {{-- ═══ 8. Updating Personal Data ═══ --}}
          <div id="updating" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Updating Of Personal Data Submitted By Data Subjects</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6">
              <p class="text-sm text-tei-gray leading-relaxed">
                Data subjects are primarily responsible for ensuring that all personal data submitted are accurate,
                complete and up-to-date. From time to time, the Company requests updated data; it is important that
                subjects cooperate and provide the same. The Company takes reasonable steps to make sure that the personal
                data it collects, generates, uses or discloses are accurate, complete, and up-to-date.
              </p>
            </div>
          </div>


          {{-- ═══ 9. Data Disclosure & Sharing ═══ --}}
          <div id="disclosure" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Data Disclosure And Sharing</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-4">
              <p class="text-sm text-tei-gray leading-relaxed">
                Access to your personal information is restricted to TEI employees and/or contractors on a need to know
                basis to carry out their responsibilities with regard to the conduct of our business such as meter reading,
                bill delivery, field inspection, energization, and restoration of your electric service. We require our
                contractors, through a Non-Disclosure Agreement (NDA), to secure and keep your information confidential
                and we do not allow them to disclose your information to others, or to use it for their own purposes.
              </p>
              <p class="text-sm text-tei-gray leading-relaxed">
                Your information may also be disclosed to government entities pursuant to and in compliance with
                applicable laws and regulations, subpoena or court order.
              </p>
            </div>
          </div>


          {{-- ═══ 10. Protective Measures ═══ --}}
          <div id="protective" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Protective Measures Imposed On Your Personal Data</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-4">
              <p class="text-sm text-tei-gray leading-relaxed">
                The Company strictly enforces its privacy policy, which was crafted in accordance with the DPA. Moreover,
                the Company implements technological, organizational, and physical security measures to protect personal
                data from loss, misuse, unauthorized modification, unauthorized or accidental access or disclosure,
                alteration or destruction. The measures implemented by the Company to safeguard your personal data
                include, but are not limited to the following:
              </p>
              <ul class="space-y-2.5 ml-1">
                @foreach ([
                  'Secured servers and firewalls, encryption on computing devices;',
                  'Restricted access only for qualified and authorized personnel; and',
                  'Strict implementation of information security policies',
                ] as $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                    {{ $item }}
                  </li>
                @endforeach
              </ul>
            </div>
          </div>


          {{-- ═══ 11. Retention & Disposal ═══ --}}
          <div id="retention" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Retention And Disposal</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-4">
              @foreach ([
                ['Customers', 'electronic data is retained as long as the account is active. For delinquent accounts, data will automatically be disposed 10 years after settlement of the outstanding balance. Physical data is retained for 10 years after collection.'],
                ['Employees', 'physical and electronic data is retained as long as the Employee is with the Company. Physical data is disposed 10 years after separation from the company while electronic data is retained 5 years longer.'],
                ['Vendors and Suppliers', 'electronic data is retained as long as the Vendor and/or Supplier continuously transacts with the Company. For Vendors and/or Suppliers which have ceased or discontinued its operations, electronic data shall be retained 10 years after the Company\'s last transaction with the said Vendors and/or Suppliers. Physical data is retained for 10 years after the payment for goods and/or services supplied by the Vendors and/or Suppliers.'],
                ['Contractors', 'electronic data is retained as long as the Contractors continuously transact with the Company. For Contractors which have ceased or discontinued its operations, electronic data shall be retained 10 years after the Company\'s last transaction with the said Contractors. Physical data is retained for 10 years after the payment for services rendered by the Contractors.'],
                ['Shareholders', 'physical and electronic data is retained as long as the Shareholder maintained his ownership/shareholdings to the Company. Physical and electronic data shall be disposed 10 years after the Shareholder\'s shares has been sold and/or redeemed by the Company.'],
                ['Guests/Visitors', 'data is retained in a log book and is kept for a period of 3 years after the last entry was made in the said log book.'],
              ] as [$entity, $policy])
                <div class="flex items-start gap-3 pb-4 border-b border-tei-blue/5 last:border-0 last:pb-0">
                  <span class="px-2.5 py-1 rounded-lg text-[10px] font-black bg-tei-blue/8 text-tei-blue shrink-0 mt-0.5 whitespace-nowrap">{{ $entity }}</span>
                  <p class="text-sm text-tei-gray leading-relaxed">{{ $policy }}</p>
                </div>
              @endforeach

              <p class="text-sm text-tei-gray leading-relaxed pt-2">
                Disposal of physical data is done through shredding by the data owner. Electronic data is disposed
                automatically after the specified time per group.
              </p>
            </div>
          </div>


          {{-- ═══ 12. Additional Information ═══ --}}
          <div id="additional" class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

            <div class="px-6 sm:px-8 pt-6 pb-5 border-b border-tei-blue/6 bg-linear-to-r from-tei-blue/4 to-transparent">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                  <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <h2 class="text-sm font-bold text-tei-blue">Additional Information</h2>
              </div>
            </div>

            <div class="px-6 sm:px-8 py-6 space-y-4">
              <p class="text-sm text-tei-gray leading-relaxed">
                TEI may amend this Data Privacy Statement to ensure that it is consistent with industry trends and/or
                legal and regulatory requirements. Any update will be posted on TEI's Facebook Page
                <a href="https://www.facebook.com/tei.ph" target="_blank" rel="noopener"
                  class="font-semibold text-tei-orange hover:text-tei-orange-dark transition-colors duration-150">@tei.ph</a>
                and at its offices.
              </p>
              <p class="text-sm text-tei-gray leading-relaxed">
                For inquiries, clarifications, requests or complaints, you may contact TEI through our Data Protection Officer;
              </p>
              <div class="rounded-xl p-4 bg-tei-blue/4 border border-tei-blue/8 text-sm text-tei-gray leading-relaxed">
                Address: A. Mabini St., Tarlac City, Tarlac, Philippines &nbsp;·&nbsp;
                Email:
                <a href="mailto:tei-dpo@teiph.com"
                  class="font-semibold text-tei-orange hover:text-tei-orange-dark transition-colors duration-150">tei-dpo@teiph.com</a>
                &nbsp;·&nbsp;
                Telephone No.
                <a href="tel:+63456061834"
                  class="font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-150">(045) 606-1834</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</div>
