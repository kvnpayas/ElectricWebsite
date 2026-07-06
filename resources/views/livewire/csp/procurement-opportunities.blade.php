<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Procurement Opportunities',
      'badgeTitle' => 'Procurement',
      'subTitle'   => 'Current and upcoming procurement opportunities of TEI, published in compliance with ERC Resolution No. 08, Series of 2023.',
  ])


  {{-- INTRO SECTION --}}
  <x-guest-section>

    @php
      $introText = 'This page is created in compliance with ERC Resolution No. 08, Series of 2023, otherwise known as "A Resolution Adopting the Procurement Guidelines for the Regulated Transmission and Distribution Assets of Regulated Entities", to ensure that the Procurement Process of TEI is transparent and is in accordance with accepted industry Procurement Practices. We invite all interested Bidders to explore the current and upcoming procurement opportunities of TEI, listed below.';
    @endphp

    <x-guest-intro wire:ignore
      variant="secondary"
      label="Procurement"
      title="Procurement Opportunities"
      :text="$introText"
      promptTitle="BAC-Secretariat"
      promptText="For inquiries, kindly email the BAC-Secretariat of the Procurement Bids and Awards Committee at proc_bac-secretariat@teiph.com. Direct Line: +63 45 606 8347 | Phone: +63 45 606 1834 | Locals 8000 and 8101" />

    {{-- Contact quick-facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-10 scroll-reveal" wire:ignore>

      <x-card variant="primary">
        <div class="flex items-center gap-3 mb-3">
          <div class="size-8 rounded-xl bg-tei-blue/10 flex items-center justify-center shrink-0">
            <svg class="size-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-widest">Direct Line</p>
        </div>
        <a href="tel:+63456068347" class="text-base font-black text-tei-blue hover:text-tei-orange transition-colors leading-none">+63 45 606 8347</a>
      </x-card>

      <x-card variant="primary">
        <div class="flex items-center gap-3 mb-3">
          <div class="size-8 rounded-xl bg-tei-blue/10 flex items-center justify-center shrink-0">
            <svg class="size-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <p class="text-[10px] font-black text-tei-blue uppercase tracking-widest">Phone</p>
        </div>
        <a href="tel:+63456061834" class="text-base font-black text-tei-blue hover:text-tei-orange transition-colors leading-none">+63 45 606 1834</a>
        <p class="text-xs text-tei-gray mt-1.5">Locals 8000 and 8101</p>
      </x-card>

      <x-card variant="secondary">
        <div class="flex items-center gap-3 mb-3">
          <div class="size-8 rounded-xl bg-tei-orange/10 flex items-center justify-center shrink-0">
            <svg class="size-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <p class="text-[10px] font-black text-tei-orange uppercase tracking-widest">Email</p>
        </div>
        <a href="mailto:proc_bac-secretariat@teiph.com" class="text-xs font-bold text-tei-orange hover:underline break-all leading-relaxed">proc_bac-secretariat@teiph.com</a>
      </x-card>

    </div>

  </x-guest-section>


  {{-- PROCUREMENT LIST SECTION --}}
  <x-guest-section-dark>

    <x-section-heading wire:ignore
      title="Procurement Opportunities"
      heading="Active & Recent Bids"
      text="Search and filter all procurement opportunities. Download the relevant documents directly from each listing."
      align="center" />

    {{-- Search + Filter row --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-8">

      {{-- Status filter --}}
      <div class="flex flex-wrap gap-2 shrink-0">
        @php
          $statusTabs = [
            'all'         => 'All',
            'ongoing'     => 'Open',
            'awarded'     => 'Awarded',
            'bid_failure' => 'Bid Failure',
            'cancelled'   => 'Cancelled',
          ];
        @endphp
        @foreach ($statusTabs as $key => $label)
          @php $isActive = $statusFilter === $key; @endphp
          <button
            wire:click="$set('statusFilter', '{{ $key }}')"
            class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all duration-200 cursor-pointer
              {{ $isActive
                ? 'bg-tei-blue text-white shadow-sm'
                : 'bg-white border border-tei-blue/12 text-tei-gray hover:border-tei-blue/25 hover:text-tei-blue' }}"
          >
            {{ $label }}
          </button>
        @endforeach
      </div>

    </div>

    {{-- Main content + sidebar --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

      {{-- Bid cards --}}
      <div class="lg:col-span-2 space-y-4">

        @forelse ($this->opportunities as $opp)
          @php
            $statusConfig = match($opp->status) {
              'awarded'     => ['label' => 'Awarded',     'bg' => 'bg-info/10',    'text' => 'text-info',    'dot' => 'bg-info'],
              'bid_failure' => ['label' => 'Bid Failure', 'bg' => 'bg-danger/10',  'text' => 'text-danger',  'dot' => 'bg-danger'],
              'cancelled'   => ['label' => 'Cancelled',   'bg' => 'bg-gray-100',   'text' => 'text-tei-gray-light', 'dot' => 'bg-tei-gray-light'],
              default       => ['label' => 'Open',        'bg' => 'bg-tei-orange/10', 'text' => 'text-tei-orange', 'dot' => 'bg-tei-orange'],
            };
          @endphp

          <div class="rounded-2xl bg-white border border-tei-blue/8 shadow-sm overflow-hidden">

            {{-- Card header --}}
            <div class="flex items-center justify-between px-5 py-3.5 border-b border-tei-blue/6 bg-tei-blue/2">
              <div class="flex items-center gap-2.5 min-w-0">
                <span class="text-xs font-black text-tei-blue shrink-0">{{ $opp->code }}</span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }}">
                  <span class="size-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                  {{ $statusConfig['label'] }}
                </span>
              </div>
              <span class="text-[11px] text-tei-gray-light font-medium shrink-0 ml-3">
                Posted {{ $opp->posting_date->format('M j, Y') }}
              </span>
            </div>

            {{-- Card body --}}
            <div class="px-5 py-4">

              <h3 class="text-sm font-bold text-tei-blue leading-snug mb-4">{{ $opp->title }}</h3>

              {{-- Timeline --}}
              @if ($opp->pre_bid_conference || $opp->eoi_deadline || $opp->bid_submission_deadline)
                <div class="mb-4 space-y-1.5">
                  @if ($opp->pre_bid_conference)
                    <div class="flex items-start gap-2">
                      <svg class="size-3.5 shrink-0 mt-0.5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <p class="text-xs text-tei-gray leading-relaxed">
                        <span class="font-semibold text-tei-blue">Pre-bid Conference:</span> {{ $opp->pre_bid_conference }}
                      </p>
                    </div>
                  @endif
                  @if ($opp->eoi_deadline)
                    <div class="flex items-start gap-2">
                      <svg class="size-3.5 shrink-0 mt-0.5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                      </svg>
                      <p class="text-xs text-tei-gray leading-relaxed">
                        <span class="font-semibold text-tei-blue">EOI Deadline:</span> {{ $opp->eoi_deadline }}
                      </p>
                    </div>
                  @endif
                  @if ($opp->bid_submission_deadline)
                    <div class="flex items-start gap-2">
                      <svg class="size-3.5 shrink-0 mt-0.5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <p class="text-xs text-tei-gray leading-relaxed">
                        <span class="font-semibold text-tei-blue">Bid Submission Deadline:</span> {{ $opp->bid_submission_deadline }}
                      </p>
                    </div>
                  @endif
                </div>
              @endif

              {{-- Documents --}}
              @if ($opp->documents->isNotEmpty())
                <div class="flex flex-wrap gap-2">
                  @foreach ($opp->documents as $doc)
                    @if ($doc->file_path)
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($doc->file_path) }}"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-tei-blue/6 hover:bg-tei-blue/12 text-xs font-semibold text-tei-blue transition-colors duration-150">
                        <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        {{ $doc->label }}
                      </a>
                    @else
                      <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-100 text-xs font-semibold text-tei-gray-light cursor-default">
                        <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        {{ $doc->label }}
                      </span>
                    @endif
                  @endforeach
                </div>
              @endif

            </div>

          </div>

        @empty
          <div class="text-center py-16 rounded-2xl bg-white border border-tei-blue/8">
            <div class="size-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
              <svg class="size-7 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <p class="text-sm font-bold text-tei-blue mb-1">No procurement opportunities found</p>
            <p class="text-xs text-tei-gray-light">Try a different search term or filter.</p>
          </div>
        @endforelse

        {{-- Pagination --}}
        @if ($this->opportunities->hasPages())
          <div class="mt-6">
            {{ $this->opportunities->links() }}
          </div>
        @endif

      </div>

      {{-- Global Downloads Sidebar --}}
      <div class="rounded-2xl bg-white border border-tei-blue/8 shadow-sm overflow-hidden sticky top-24">
        <div class="px-5 py-4 border-b border-tei-blue/6 bg-tei-blue">
          <p class="text-[11px] font-bold uppercase tracking-widest text-white/70">Downloads</p>
          <p class="text-sm font-bold text-white mt-0.5">Procurement Forms</p>
        </div>
        <div class="divide-y divide-tei-blue/6">
          @forelse ($this->globalDownloads as $download)
            @if ($download->file_path)
              <a href="{{ \Illuminate\Support\Facades\Storage::url($download->file_path) }}"
                target="_blank"
                class="flex items-center gap-3 px-5 py-3.5 hover:bg-tei-blue/3 transition-colors duration-150 group">
                <div class="size-8 rounded-lg bg-tei-orange/10 flex items-center justify-center shrink-0">
                  <svg class="size-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </div>
                <span class="text-xs font-semibold text-tei-blue group-hover:text-tei-orange transition-colors duration-150 leading-snug">
                  {{ $download->label }}
                </span>
              </a>
            @else
              <div class="flex items-center gap-3 px-5 py-3.5 opacity-50 cursor-not-allowed">
                <div class="size-8 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                  <svg class="size-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </div>
                <span class="text-xs font-semibold text-tei-gray-light leading-snug">{{ $download->label }}</span>
              </div>
            @endif
          @empty
            <div class="px-5 py-6 text-center">
              <p class="text-xs text-tei-gray-light">No forms available yet.</p>
            </div>
          @endforelse
        </div>
      </div>

    </div>

  </x-guest-section-dark>

</div>
