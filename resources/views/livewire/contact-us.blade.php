<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Contact Us',
      'badgeTitle' => 'Get in Touch',
      'subTitle' => 'We\'re here to help — reach out anytime through any of the channels below.',
  ])


  <x-guest-section>

    {{-- Intro card --}}
    <div
      class="rounded-2xl p-6 sm:p-8 mb-12 scroll-reveal bg-linear-to-br from-tei-blue/4 to-tei-blue/2 border border-tei-blue/8">
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 mt-0.5 bg-tei-orange/10">
          <svg class="w-5 h-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Always Here to Help</h3>
          <p class="text-sm leading-relaxed text-tei-gray">
            Tarlac Electric Inc. (TEI) is always available to answer any questions about your current or past utility
            statements, application requests, and more. Our customer service representatives are ready to assist you any
            time of the day, seven days a week.
          </p>
        </div>
      </div>
    </div>
  </x-guest-section>

  {{-- ═══════════════════════════════════════════════
       MAP + CONTACT INFO
    ═══════════════════════════════════════════════ --}}
  <section class="py-20 bg-tei-surface">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-12 scroll-reveal">

        {{-- Map --}}
        <div class="lg:col-span-3 rounded-2xl overflow-hidden border border-tei-blue/8 shadow-md min-h-80 lg:min-h-105">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3844.931359474584!2d120.58502987596059!3d15.488123885110276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396c63a57238ad3%3A0xafa18faa78fb4977!2sTarlac%20Electric%20Inc.%20(TEI)%20-%20Main%20Office!5e0!3m2!1sen!2sph!4v1782375844685!5m2!1sen!2sph"
            class="w-full h-full min-h-80 lg:min-h-105 border-0" allowfullscreen="" loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin">
          </iframe>
        </div>

        {{-- Contact info cards --}}
        <div class="lg:col-span-2 flex flex-col gap-4">

          {{-- Address --}}
          <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
            <div class="flex gap-3 items-start">
              <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                <svg class="w-4 h-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-1">Address</p>
                <p class="text-sm font-bold text-tei-blue">Mabini St., Tarlac City</p>
                <p class="text-xs text-tei-gray mt-0.5">Tarlac, Philippines</p>
              </div>
            </div>
          </div>

          {{-- Hotline --}}
          <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
            <div class="flex gap-3 items-start">
              <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
                <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-1.5">Hotline</p>
                <a href="tel:+63456061834"
                  class="text-base font-black text-tei-blue transition-colors duration-150 hover:text-tei-orange">
                  (045) 606-1834
                </a>
                <p class="text-[10px] font-bold uppercase tracking-wider text-tei-gray/60 mt-3 mb-1.5">Mobile Numbers
                </p>
                <div class="grid grid-cols-2 gap-x-3 gap-y-1">
                  @foreach ([['0917-188-1834', '09171881834'], ['0917-189-1834', '09171891834'], ['0998-997-1834', '09989971834'], ['0939-338-1834', '09393381834']] as [$label, $raw])
                    <a href="tel:+63{{ ltrim($raw, '0') }}"
                      class="text-xs font-semibold text-tei-blue/70 transition-colors duration-150 hover:text-tei-orange">
                      {{ $label }}
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          {{-- Social Media --}}
          <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
            <div class="flex gap-3 items-start">
              <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 bg-tei-blue/8">
                <svg class="w-4 h-4 text-tei-blue" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
              </div>
              <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-1">Social Media</p>
                <p class="text-sm font-bold text-tei-blue">Facebook</p>
                <a href="https://www.facebook.com/tei.ph" target="_blank" rel="noopener"
                  class="text-xs font-semibold text-tei-orange transition-colors duration-150 hover:text-tei-orange-dark">
                  @tei.ph
                </a>
                <p class="text-xs text-tei-gray mt-1.5 leading-relaxed">
                  Follow and turn on notifications for the latest TEI updates on your news feed.
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

      {{-- ═══════════════════════════════════════════════
       REPORT CARDS
    ═══════════════════════════════════════════════ --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 scroll-reveal">

        {{-- Report an Outage --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-orange/10">
            <svg class="w-6 h-6 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Report an Outage</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Did you witness an unscheduled power outage in your area? Inform Tarlac Electric Inc. about this power
            interruption by calling our hotline any time of the day.
          </p>
          <a href="tel:+63456061834"
            class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
            Call (045) 606-1834
            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </x-custom-card>

        {{-- Report Pilferage --}}
        <x-custom-card>
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 bg-tei-blue/8">
            <svg class="w-6 h-6 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-base font-bold mb-2 text-tei-blue">Report Pilferage</h3>
          <p class="text-sm leading-relaxed mb-5 text-tei-gray">
            Want to report an illegal electricity activity to TEI? Reach out to us via email or call us directly — all
            reports are kept confidential.
          </p>
          <div class="flex flex-col gap-2">
            <a href="mailto:cwd@teiph.com"
              class="inline-flex items-center gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
              cwd@teiph.com
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <a href="tel:+63456061834"
              class="text-sm font-semibold text-tei-blue/60 transition-colors duration-150 hover:text-tei-orange">
              or call (045) 606-1834
            </a>
          </div>
        </x-custom-card>

      </div>
    </div>
  </section>

</div>
