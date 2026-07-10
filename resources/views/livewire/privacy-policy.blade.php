<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Privacy Policy',
      'badgeTitle' => 'Legal',
      'subTitle' => 'How we collect, protect, use, and share your personal information.',
  ])


  <x-guest-section>
    @php
      $privacyIntro =
          'This Privacy Policy covers your personal information when transacting or doing business with Tarlac Electric, Inc. (individually and collectively known as "TEI", the "Company", "we", "us" or "our"). Maintaining your privacy is an important part of the products and services that we provide. This Privacy Statement, hereafter referred to as "Statement", explains how we collect, protect, use, and share information when you access our social media page and/or apply for and avail of our products and services.';
    @endphp
    <x-guest-intro label="Legal" title="TEI Privacy Policy Statement" :text="$privacyIntro" />
  </x-guest-section>


  <x-guest-section-dark>
    <div class="lg:grid lg:grid-cols-[240px_1fr] lg:gap-10">

      {{-- Sticky sidebar TOC (desktop only) --}}
      <aside class="hidden lg:block self-start sticky top-24">
        <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3 px-3">On This Page</p>
        <nav class="flex flex-col gap-0.5">
          @foreach ([['rights', 'Rights of Data Subjects'], ['customers', 'Customer Data'], ['employees', 'Employee Data'], ['vendors', 'Vendor & Supplier Data'], ['contractors', 'Contractor Data'], ['shareholders', 'Shareholder Data'], ['guests', 'Guest / Visitor Data'], ['updating', 'Updating Personal Data'], ['disclosure', 'Data Disclosure & Sharing'], ['protective', 'Protective Measures'], ['retention', 'Retention & Disposal'], ['additional', 'Additional Information']] as [$id, $label])
            <a href="#{{ $id }}"
              class="text-xs text-tei-gray/70 hover:text-tei-blue px-3 py-2 rounded-lg hover:bg-tei-blue/5 transition-colors duration-150">
              {{ $label }}
            </a>
          @endforeach
        </nav>
      </aside>

      {{-- Content cards --}}
      <div class="mt-0 flex flex-col gap-5">


        {{-- ═══ 1. Rights of Data Subjects ═══ --}}
        <div id="rights"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Rights Of Data Subjects</h2>
          </div>
          <div class="px-6 sm:px-8 py-6">
            <p class="text-sm text-tei-gray leading-relaxed mb-4">Data subjects have the following rights:</p>
            <ol class="space-y-2.5 mb-5">
              @foreach (['Right to be informed;', 'Right to object;', 'Right to access;', 'Right to rectify or correct erroneous data;', 'Right to erase or block;', 'Right to secure data portability;', 'Right to indemnified for damages; and', 'Right to file a complaint.'] as $i => $item)
                <li class="flex items-start gap-3 text-sm text-tei-gray">
                  <span
                    class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">{{ $i + 1 }}</span>
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
        <div id="customers"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue leading-snug">Data We Collect From Prospective And Existing
              Customers, Including Customers With Terminated Services</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-5">

            <div>
              <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you provide to us when you apply for
                service:</p>
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

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Manage your accounts', 'Respond to your inquiry, concern or complaint'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span
                    class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">3</span>
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
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 4 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>

          </div>
        </div>


        {{-- ═══ 3. Employee Data ═══ --}}
        <div id="employees"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue leading-snug">Data We Collect From Prospective, Active And
              Separated Employees</h2>
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

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12 mt-5!">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Evaluate your eligibility for initial employment, including the verification of your qualifications and character references (background checking)', 'Administer your pay, statutory deductions, entitlements, and benefits', 'Comply with applicable statutory and regulatory requirements and submissions', 'Conduct performance reviews and rewards', 'Establish appropriate training and/or developmental interventions', 'Administer disciplinary action and sanctions', 'Collect and maintain contact information', 'Maintain your employment records', 'Process employee work-related claims', 'Develop health and wellness programs'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>


        {{-- ═══ 4. Vendor & Supplier Data ═══ --}}
        <div id="vendors"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Vendors And Suppliers</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-5">
            <div>
              <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you submit to TEI for processing of
                payments:</p>
              <ul class="space-y-2 ml-3">
                @foreach (['Name', 'Tax Identification Number (TIN), copy of Certificate of Registration with the Bureau of Internal Revenue', 'Address', 'Contact details', 'Banking information'] as $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                    {{ $item }}
                  </li>
                @endforeach
              </ul>
            </div>
            <p class="text-sm text-tei-gray leading-relaxed">
              <span class="font-semibold text-tei-blue">2.</span>
              Any other information you voluntarily provide for any legitimate purpose declared at point of collection
              of such information.
            </p>

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Establish and manage business relationships with you', 'Facilitate the payment of your invoices for any goods delivered or services rendered', 'Comply with statutory, legal and regulatory requirements', 'Update or maintain your vendor account information', 'Establish details of your authorized contact persons and services you deliver and receiving of payment'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>


        {{-- ═══ 5. Contractor Data ═══ --}}
        <div id="contractors"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Contractors</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-4">
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                <span
                  class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">1</span>
                Audited Financial Statements
              </li>
              <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                <span
                  class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">2</span>
                DOLE Certificates
              </li>
              <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                <span
                  class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">3</span>
                <div>
                  Information you provide for processing of payments:
                  <ul class="mt-2 space-y-2 ml-2">
                    @foreach (['Name', 'Tax Identification Number (TIN), copy of Certificate of Registration with the Bureau of Internal Revenue', 'Address', 'Contact details', 'Banking Information'] as $sub)
                      <li class="flex items-start gap-2 text-sm text-tei-gray/80">
                        <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                        {{ $sub }}
                      </li>
                    @endforeach
                  </ul>
                </div>
              </li>
              <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                <span
                  class="inline-flex w-5 h-5 rounded-full items-center justify-center shrink-0 text-[10px] font-black bg-tei-blue/8 text-tei-blue mt-0.5">4</span>
                Any other information you voluntarily provide for any legitimate purpose declared at point of collection
                of such information.
              </li>
            </ul>

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12 mt-2">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Facilitate the payment of your invoices for any services rendered', 'Comply with statutory, legal and regulatory requirements', 'Update or maintain your account information', 'Establish details of your authorized contact persons for the services you render and receiving of payment'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>


        {{-- ═══ 6. Shareholder Data ═══ --}}
        <div id="shareholders"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Shareholders</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-5">
            <div>
              <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you submit to us when you become a
                shareholder of or in the course of being a shareholder of TEI:</p>
              <ul class="space-y-2 ml-3">
                @foreach (['Name', 'Address', 'Contact details', 'Marital status', 'Government issued identification', 'Details of your authorized representative if applicable'] as $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                    {{ $item }}
                  </li>
                @endforeach
              </ul>
            </div>
            <p class="text-sm text-tei-gray leading-relaxed">
              <span class="font-semibold text-tei-blue">2.</span>
              Any other information you voluntarily provide for any legitimate purpose declared at point of collection
              of such information.
            </p>

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Maintain our shareholder register', 'Manage your account', 'Comply with statutory, legal and regulatory requirements', 'Handle dividends or any other payments', 'Facilitate communications'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>


        {{-- ═══ 7. Guest / Visitor Data ═══ --}}
        <div id="guests"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Data We Collect From Guests / Visitors</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-5">
            <div>
              <p class="text-sm font-semibold text-tei-blue mb-3">1. Information you provide when you enter TEI's
                premises:</p>
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
              Any information you voluntarily provide for any legitimate purpose declared at point of collection of such
              information.
            </p>

            <div class="rounded-xl p-5 bg-tei-orange/5 border border-tei-orange/12">
              <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-3">Purpose</p>
              <p class="text-sm text-tei-gray mb-3">The information we gather from you enable us to:</p>
              <ol class="space-y-2.5">
                @foreach (['Establish your identity', 'Record the purpose of your visit', 'Monitor your activities inside the company premises'] as $i => $item)
                  <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                    <span
                      class="inline-flex w-4 h-4 rounded-full items-center justify-center shrink-0 text-[9px] font-black bg-tei-orange/15 text-tei-orange mt-0.5">{{ $i + 1 }}</span>
                    {{ $item }}
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
        </div>


        {{-- ═══ 8. Updating Personal Data ═══ --}}
        <div id="updating"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Updating Of Personal Data Submitted By Data Subjects</h2>
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
        <div id="disclosure"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Data Disclosure And Sharing</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-4">
            <p class="text-sm text-tei-gray leading-relaxed">
              Access to your personal information is restricted to TEI employees and/or contractors on a need to know
              basis to carry out their responsibilities with regard to the conduct of our business such as meter
              reading,
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
        <div id="protective"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Protective Measures Imposed On Your Personal Data</h2>
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
              @foreach (['Secured servers and firewalls, encryption on computing devices;', 'Restricted access only for qualified and authorized personnel; and', 'Strict implementation of information security policies'] as $item)
                <li class="flex items-start gap-2.5 text-sm text-tei-gray">
                  <span class="w-1.5 h-1.5 rounded-full bg-tei-blue/40 shrink-0 mt-2"></span>
                  {{ $item }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>


        {{-- ═══ 11. Retention & Disposal ═══ --}}
        <div id="retention"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Retention And Disposal</h2>
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
                <span
                  class="px-2.5 py-1 rounded-lg text-[10px] font-black bg-tei-blue/8 text-tei-blue shrink-0 mt-0.5 whitespace-nowrap">{{ $entity }}</span>
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
        @php
          $primaryEmail = $emails->firstWhere('label', 'DPO');
          $facebookUrl = $socials->firstWhere('platform', 'Facebook');
          $primaryPhone = $phones->firstWhere('is_primary', true) ?? $phones->first();
        @endphp
        <div id="additional"
          class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">
          <div class="px-6 sm:px-8 pt-5 pb-4 border-b border-tei-blue/6">
            <h2 class="text-sm font-bold text-tei-blue">Additional Information</h2>
          </div>
          <div class="px-6 sm:px-8 py-6 space-y-4">
            <p class="text-sm text-tei-gray leading-relaxed">
              TEI may amend this Data Privacy Statement to ensure that it is consistent with industry trends and/or
              legal and regulatory requirements. Any update will be posted on TEI's Facebook Page
              <a href="{{ $facebookUrl->url ?? '#' }}" target="_blank" rel="noopener"
                class="font-semibold text-tei-orange hover:text-tei-orange-dark transition-colors duration-150">@tei.ph</a>
              and at its offices.
            </p>
            <p class="text-sm text-tei-gray leading-relaxed">
              For inquiries, clarifications, requests or complaints, you may contact TEI through our Data Protection
              Officer;
            </p>
            <div class="rounded-xl p-4 bg-tei-blue/4 border border-tei-blue/8 text-sm text-tei-gray leading-relaxed">
              Address: {{ $address }} &nbsp;·&nbsp;
              Email:
              <a href="mailto:{{ $primaryEmail->address ?? '#' }}"
                class="font-semibold text-tei-orange hover:text-tei-orange-dark transition-colors duration-150">{{ $primaryEmail->address ?? '#' }}</a>
              &nbsp;·&nbsp;
              Telephone No.
              <a href="{{ $primaryPhone->tel ?? '#' }}"
                class="font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-150">{{ $primaryPhone->number ?? '#' }}</a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </x-guest-section-dark>

</div>
