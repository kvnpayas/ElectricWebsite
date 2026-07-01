<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'FAQs',
      'badgeTitle' => 'Help Center',
      'subTitle' => 'Find answers to commonly asked questions about TEI services, billing, connections, and more.',
  ])

  <x-guest-section>

    {{-- Intro card --}}
    <div
      class="rounded-2xl p-6 sm:p-8 scroll-reveal bg-linear-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-1 text-tei-blue">Frequently Asked Questions</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            Can't find what you're looking for? Contact us at <strong class="text-tei-blue">(045) 606-1834</strong> or
            visit our office at Mabini St., Tarlac City, Philippines.
          </p>
        </div>
      </div>
    </div>
  </x-guest-section>


  {{-- ── CATEGORY: New Connection Application ──────────────── --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="space-y-10">
        <div>
          {{-- Category heading --}}
          <x-accordion-label title='Category' text="New Connection Application" />

          {{-- Accordion items --}}
          <div class="flex flex-col gap-3">
            <x-accordion
              question="How can I apply for a new connection with Tarlac Electric Inc. (TEI) and how much will it cost me?">
              <p>
                Visit this <a href="{{ route('customer.service-application') }}" class="text-tei-orange">page</a> for
                details on how to apply for a TEI electric service. In it, you'll find the step-by-step procedure and
                corresponding costs for a new connection application.
              </p>
            </x-accordion>
          </div>
        </div>

        <div>
          {{-- Category heading --}}
          <x-accordion-label text="Bill Deposit"
            icon="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />

          {{-- Accordion items --}}
          <div class="flex flex-col">
            <x-accordion question="Why do i need to upgrade my bill deposit every year?">
              <p>
                Your bill deposits should correctly reflect the amount on you current monthly bill. If your average
                consumption is higher than the bill deposit by ten percent (10%) or more, you will need to upgrade your
                bill deposit. Customers have the option of paying the bill deposit adjustment on a one-time or staggered
                basis.
              </p>
            </x-accordion>
            <x-accordion question="What do I need to submit so I can claim my bill deposit refund?">
              <p>
                The account owner should present the original official receipt to TEI. If the official receipt is lost,
                the account owner should provide an affidavit of loss notarized by a registered attorney. If the account
                owner passed away, the representatives should provide a death certificate. For more information on you
                TEI bill deposit, <a href="{{ route('customer.bill-deposit-primer') }}" wire:navigate class="text-tei-orange">click here</a>
              </p>
            </x-accordion>
            <x-accordion question="How much is the bill deposit if I'm applying for a new connection?">
              <p>
                It should be equivalent to approximately one (1) month of your expected electric bill. The bill deposit
                will earn an interest that is set by the Energy Regulatory Commission.
              </p>
              <p class="mt-3">
                The amount will be based on the schedule of loads that you will submit to TEI and the result of the
                application site survey. TEI’s attending engineers will verify the load schedule for the value of your
                bill deposit. The customer must sign the TEI Metered Service Contract then pay the bill deposit.
              </p>
            </x-accordion>
          </div>
        </div>

        <div>
          {{-- Category heading --}}
          <x-accordion-label text="Billing & Payment"
            icon="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />

          {{-- Accordion items --}}
          <div class="flex flex-col">
            <x-accordion question="When is the posting and delivery of my billing statement?">
              <p>
                Tarlac Electric Inc. (TEI) will deliver the customer’s Statement of Account (SOA) to his service address
                within fifteen (15) days after the reading date.
                Customers should always pay on time to avoid surcharges and possible disconnection.
              </p>
            </x-accordion>
            <x-accordion question="Can I receive an electronic or paperless version of my bill?">
              <p>
                TEI offers its customers the convenience of receiving their SOA through electronic format via SMS
                message, email, or both. This option will enable you to receive your monthly bills and TEI advisories
                through SMS and/or email.
              </p>
              <p class="mt-3">
                To enroll your account in our Electronic Statement of Account (ESOA) service, visit your nearest TEI
                business center. Provide your account number, your relationship with the account holder (if the account
                is not under your name), and your contact details (your email address and/or mobile number). You will
                also be asked to sign the TEI ESOA Customer Enrollment Form.
              </p>
            </x-accordion>
            <x-accordion question="I did not receive my monthly billing. What should I do?">
              <p>
                Email us at <a href="mailto:cwd@teiph.com" class="text-tei-orange">cwd@teiph.com</a> or call us at
                606-1834. Make
                sure to provide us with your account name, your
                account number, and your nearest landmark so that we can endorse a report regarding the non-delivery of
                your SOA.
              </p>
              <p class="mt-3">
                Upon filing the report, your new SOA will be delivered to your service address within three (3) working
                days. If you are enrolled in ESOA, it will be immediately sent to your email and/or mobile number.
              </p>
            </x-accordion>
            <x-accordion question="How much is my bill?">
              <p>
                To know how much your current or past bill is, proceed to any of the TEI business centers and present
                your account name and account number to our attending customer representative. You may also call us at
                606-1834 or chat with us through our official
              </p>
              <p class="mt-3">
                Facebook account (<a href="https://www.facebook.com/tei.ph" target="_blank"
                  class="text-tei-orange">@tei.ph</a>) by providing the same details.
              </p>
            </x-accordion>
            <x-accordion question="What is an Electronic Statement of Account (ESOA)?">
              <p>
                The ESOA aims to make billing and TEI advisories more convenient for customers. Through this program,
                customers may enroll their email address and/or mobile number to receive emails and/or SMS messages
                about their billing statements and other TEI advisories such as power interruption schedules.
              </p>
            </x-accordion>
            <x-accordion question="How can I enroll my account in the ESOA program?">
              <p>
                Visit any of the TEI business centers to enroll your account in the ESOA program. You will be asked to
                provide your account number, your relationship with the account holder (if the account is not named
                after the enrollee), and your contact details (your email address and/or mobile number). You will also
                be required to sign the TEI ESOA Customer Enrollment Form.
              </p>
            </x-accordion>
            <x-accordion question="Where can I pay my TEI bills?">
              <p>
                You can pay your electric bills at any of the following business centers: TEI Main Office (Mabini
                Street), SM City Tarlac, Magic Star Mall, Magic Star Matatalaib, CityWalk, Metrotown Mall, and Market
                City Mall. <a href="{{ route('customer.business-centers') }}" wire:navigate class="text-tei-orange">Click here</a> to see each business center’s
                operating hours.
              </p>
            </x-accordion>
            <x-accordion question="If I don’t pay my bill on time, how much is the additional charge I’ll receive?">
              <p>
                For late payment of your TEI bill, a two percent (2%) surcharge will be added on top of the current
                bill.
              </p>
            </x-accordion>
          </div>
        </div>

        <div>
          {{-- Category heading --}}
          <x-accordion-label text="Complaints"
            icon="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0 6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
          {{-- Accordion items --}}
          <div class="flex flex-col gap-3">
            <x-accordion question="How do I file a complaint?">
              <p>
                Feel free to call us at 606-1834. While speaking with our customer care associate, please provide your
                account number, your account name, your contact number, your nearest landmark, and your complaint. You
                may also submit any customer-related complaints via TEI’s official Facebook account <a
                  href="https://www.facebook.com/tei.ph" target="_blank" class="text-tei-orange">@tei.ph</a> or email us
                at <a href="mailto:cwd@teiph.com" class="text-tei-orange">cwd@teiph.com</a>.
              </p>
            </x-accordion>
          </div>
        </div>

        <div>
          {{-- Category heading --}}
          <x-accordion-label text="Pilferage"
            icon="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
          {{-- Accordion items --}}
          <div class="flex flex-col">
            <x-accordion question="Where can I report illegal electric connections to Tarlac Electric Inc. (TEI)?">
              <p>
                You can report illegal connections by contacting us at 606-1834 or by visiting any of our business
                centers: TEI Main Office (Mabini Street), SM City Tarlac, Magic Star Mall, Magic Star Matatalaib,
                CityWalk, Metrotown Mall, and Market City Mall. Rest assured that all pilferage reports will be kept
                confidential.
              </p>
            </x-accordion>
            <x-accordion question="What happens if a TEI customer commits illegal use of electricity?">
              <p>
                If a customer is caught tampering with an electric meter or doing anything unlawful in relation to his
                TEI line, he will be subjected to a corresponding penalty from TEI. Depending on the degree of the
                crime, his line may be disconnected. TEI will also take legal action against the customer.
              </p>
            </x-accordion>
          </div>
        </div>

        <div>
          {{-- Category heading --}}
          <x-accordion-label text="Others"
            icon="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
          {{-- Accordion items --}}
          <div class="flex flex-col">
            <x-accordion question="How can I apply and work for Tarlac Electric Inc. (TEI)?">
              <p>
                We’re delighted to know that you’re interested in joining TEI’s workforce! Click here [insert link] for
                more information on our current job vacancies.
              </p>
            </x-accordion>
            <x-accordion question="What are your distribution service rates?">
              <p>
                To learn more about TEI’s unbundled rates, you may call us at 606-1834 for immediate assistance. You may
                also compute for your per kWh consumption rate by dividing the amount of your total bill by your total
                kWh consumption.
              </p>
            </x-accordion>
            <x-accordion question="Where can I find your business centers?">
              <p>
                <a href="{{ route('customer.business-centers') }}" wire:navigate class="text-tei-orange">Click here</a> to see TEI’s complete list of business centers.
              </p>
            </x-accordion>
            <x-accordion question="What other services are accepted at the TEI business centers?">
              <p>
                Customers may settle their bills, apply for new connection, endorse complaints, request for
                disconnection, and attend to other TEI-related matters at our business centers. However, please note
                that each business center follows the operating hours of the mall it is located in.
              </p>
            </x-accordion>
            <x-accordion question="How do I transfer an existing account to a new owner?">
              <p>
                First, you must submit all the necessary requirements at TEI business center for evaluation and survey.
                Requirements include proof of ownership or occupancy such as Transfer Certificate of Title, Deed of
                Sale, Waiver of Rights, Contract of Lease, and other related documents. Informal settlers must show
                proof of right to occupy the premises (issued by the authorized individual or local government unit or
                entity) and two (2) valid identification (ID)
                cards.
              </p>
              <p class="mt-3">
                Upon survey approval, the new owner must sign the metered service contract and pay the following fees:
              </p>
              <ul class="list-disc list-inside mt-3 ml-3">
                <li>Bill deposit (Minimum fee): Dependent on the customer’s load schedule</li>
                <li>Service fee (For residential property): P33.60</li>
                <li>Service fee (For commercial property): P84.00</li>
              </ul>
            </x-accordion>
            <x-accordion
              question="What are the requirements I need so that I can transfer or change the name of my TEI account?">
              <p>
                For customers interested in transferring or changing their account name, requirements include proof of
                ownership or occupancy such as:
              </p>
              <ul class="list-disc list-inside mt-3 ml-3">
                <li>Transfer Certificate of Title</li>
                <li>Deed of Sale</li>
                <li>Waiver of Rights</li>
                <li>Contract of Lease</li>
                <li>Other related documents</li>
              </ul>
              <p class="mt-3">
                Customers who are informal settlers will need to provide:
              </p>
              <ul class="list-disc list-inside mt-3 ml-3">
                <li>Proof of right to occupy the premises issued by the authorized individual or local government unit
                  or entity</li>
                <li>Two (2) valid identification (ID) cards, which can be any of the following: driver’s license,
                  Philippine passport, PRC license, new COMELEC voter’s ID, voter’s certification, SSS ID, GSIS ID,
                  senior citizen ID, TIN ID, postal ID, and original NBI clearance</li>
              </ul>
            </x-accordion>
            <x-accordion question="How can I avail of TEI’s senior citizen discount?">
              <p>
                <a href="{{ route('customer.senior-citizen-discount') }}" wire:navigate class="text-tei-orange">Click
                  here</a> for more information on how to avail of our senior citizen discount.
              </p>
            </x-accordion>
            <x-accordion question="What are the requirements needed so I can apply for the senior citizen discount?">
              <p>
                Senior citizens must fill out a Senior Citizen Discount Form available at any TEI business center. They
                must present the most recent TEI statement under their name, a barangay certification, their senior
                citizen ID, one (1) additional valid ID, and a photocopy of the two IDs. Valid IDs include the
                Philippine passport, driver’s license, voter’s ID, SSS ID, GSIS ID, PRC card, and postal ID.
              </p>
              <p class="mt-3">
                Senior citizens cannot apply for the discount if they do not have their senior citizen ID. To avail of
                the discount, their monthly average consumption should be less than 100 kWh.
              </p>
              <p class="mt-3">
                The senior citizen discount application must be filed on a yearly basis. It will not be automatically
                discounted in the customer’s billing statement.
              </p>
            </x-accordion>
          </div>
        </div>


      </div>
    </div>


  </section>

</div>
