<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Contact Us',
      'badgeTitle' => 'Get in Touch',
      'subTitle' => 'We\'re here to help — reach out anytime through any of the channels below.',
  ])


  <x-guest-section>
    <x-guest-intro
      label="Get in Touch"
      title="Contact Us"
      text="Tarlac Electric Inc. (TEI) is always available to answer any questions you might have about your current or past utility statements, your application requests, and more. You can call the TEI hotline at (045) 606-1834 or via our mobile numbers 09171881834, 09171891834, 09989971834, 09399381834, any time of the day, seven days a week! Our customer service representatives are ready to assist you." />
  </x-guest-section>


  <x-guest-section-dark>

    {{-- Map + Contact Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 mb-10 scroll-reveal">

      {{-- Map --}}
      <div class="lg:col-span-3 rounded-2xl overflow-hidden border border-tei-blue/8 shadow-md min-h-80 lg:min-h-105">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3844.931359474584!2d120.58502987596059!3d15.488123885110276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396c63a57238ad3%3A0xafa18faa78fb4977!2sTarlac%20Electric%20Inc.%20(TEI)%20-%20Main%20Office!5e0!3m2!1sen!2sph!4v1782375844685!5m2!1sen!2sph"
          class="w-full h-full min-h-80 lg:min-h-105 border-0" allowfullscreen="" loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
      </div>

      {{-- Contact Info Cards --}}
      <div class="lg:col-span-2 flex flex-col gap-4">

        {{-- Address --}}
        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
          <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-2">Address</p>
          <p class="text-sm font-bold text-tei-blue">Mabini St., Tarlac City</p>
          <p class="text-xs text-tei-gray mt-0.5">Tarlac, Philippines</p>
        </div>

        {{-- Hotline --}}
        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
          <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-1.5">Hotline</p>
          <a href="tel:+63456061834"
            class="text-base font-black text-tei-blue transition-colors duration-150 hover:text-tei-orange">
            (045) 606-1834
          </a>
          <p class="text-[10px] font-bold uppercase tracking-wider text-tei-gray/60 mt-3 mb-1.5">Mobile Numbers</p>
          <div class="grid grid-cols-2 gap-x-3 gap-y-1">
            @foreach ([['0917-188-1834', '09171881834'], ['0917-189-1834', '09171891834'], ['0998-997-1834', '09989971834'], ['0939-938-1834', '09399381834']] as [$label, $raw])
              <a href="tel:+63{{ ltrim($raw, '0') }}"
                class="text-xs font-semibold text-tei-blue/70 transition-colors duration-150 hover:text-tei-orange">
                {{ $label }}
              </a>
            @endforeach
          </div>
        </div>

        {{-- Social Media --}}
        <div class="rounded-2xl p-5 bg-white border border-tei-blue/8 shadow-sm scroll-reveal">
          <p class="text-[10px] font-black uppercase tracking-widest text-tei-orange mb-2">Social Media</p>
          <p class="text-sm leading-relaxed text-tei-gray">
            Stay connected with Tarlac Electric Inc. (TEI) by liking and following our official Facebook account:
            <a href="https://www.facebook.com/tei.ph" target="_blank" rel="noopener"
              class="font-semibold text-tei-orange transition-colors duration-150 hover:text-tei-orange-dark">@tei.ph</a>.
            Turn on your notifications so that you can receive the latest TEI updates on your news feed.
          </p>
        </div>

      </div>
    </div>

    {{-- Report Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

      <x-custom-card icon="" title="Report an Outage"
        text="Did you witness an unscheduled power outage in your area? Inform Tarlac Electric Inc. about this power interruption by calling the hotline at (045) 606-1834.">
        <div class="pt-3 border-t border-tei-blue/8 mt-1">
          <a href="tel:+63456061834"
            class="inline-flex items-center gap-1.5 text-sm font-bold text-tei-orange transition-colors duration-150 hover:text-tei-orange-dark">
            Call (045) 606-1834
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </x-custom-card>

      <x-custom-card icon="" title="Report Pilferage" text="Want to report an illegal activity to TEI?">
        <div class="pt-3 border-t border-tei-blue/8 mt-1">
          <p class="text-sm leading-relaxed text-tei-gray">
            Please email us at
            <a href="mailto:cwd@teiph.com" class="font-semibold text-tei-orange">cwd@teiph.com</a>
            or call us at
            <a href="tel:+63456061834" class="font-semibold text-tei-orange">(045) 606-1834</a>
          </p>
        </div>
      </x-custom-card>

    </div>

  </x-guest-section-dark>

</div>
