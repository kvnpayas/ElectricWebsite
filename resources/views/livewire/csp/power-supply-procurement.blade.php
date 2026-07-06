<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title' => 'Power Supply Procurement',
      'badgeTitle' => 'Competitive Selection Process',
      'subTitle' => 'Latest Power Supply Procurement Plan (PSPP) of TEI and information on ongoing and completed bids.',
  ])


  {{-- ═══════════════════════════════════════════════
     MAIN CONTENT
  ═══════════════════════════════════════════════ --}}
  <x-guest-section>

    <x-guest-intro variant="secondary" label="Competitive Selection Process" title="Power Supply Procurement"
      text="The conduct of CSP is governed by DOE Department Circular No. DC2023-06-0021 and ERC Resolution No. 16, Series of 2023 which took effect on 19 July 2023 and 23 October 2023. This site contains the latest Power Supply Procurement Plan (PSPP) of TEI and information on ongoing bids."
      promptTitle="For Inquiries"
      promptText="Kindly email the BAC-Secretariat of TEI's Bids and Awards Committee for power supply agreements at bac-secretariat@teiph.com" />

    {{-- Quick facts --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-10 stagger-cards">

      <x-card variant="secondary">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-[0.18em] mb-3">DOE Circular</p>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">DC2023-06-0021</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Prescribing the Policy of the Mandatory Conduct of the
          Competitive Selection Process by Distribution Utilities for the Procurement of Power Supply for their Captive
          Market.</p>
        <x-slot:footer>
          <div class="border-l-2 border-tei-orange pl-3">
            <p class="text-xs font-semibold text-tei-orange mb-0.5">Effectivity</p>
            <p class="text-xs text-tei-gray">Took effect on 19 July 2023</p>
          </div>
        </x-slot:footer>
      </x-card>

      <x-card variant="primary">
        <p class="text-[10px] font-black text-tei-blue uppercase tracking-[0.18em] mb-3">ERC Resolution</p>
        <h4 class="text-sm font-bold mb-2 text-tei-blue">Resolution No. 16, Series of 2023</h4>
        <p class="text-xs leading-relaxed text-tei-gray">Implementing Guidelines for the Procurement, Execution, and
          Evaluation of Power Supply Agreements Entered into by Distribution Utilities for the Supply of Electricity to
          their Captive Market.</p>
        <x-slot:footer>
          <div class="border-l-2 border-tei-blue pl-3">
            <p class="text-xs font-semibold text-tei-blue mb-0.5">Effectivity</p>
            <p class="text-xs text-tei-gray">Took effect on 23 October 2023</p>
          </div>
        </x-slot:footer>
      </x-card>

    </div>

  </x-guest-section>

  <x-guest-section-dark>

    <x-section-heading title="Procurement Plan" heading="Power Supply Procurement Bids"
      text="Current and completed bids under TEI's Competitive Selection Process for power supply agreements."
      variant="secondary" align="center" />

    <div class="space-y-8">

      @foreach ($this->bids as $bid)
        @php
          [$statusBg, $statusDot, $statusLabel] = match ($bid->status) {
              'ongoing' => ['bg-success/10 text-success', 'bg-success', 'Ongoing'],
              'failed' => ['bg-danger/10 text-danger', 'bg-danger', 'Failed'],
              'completed' => ['bg-tei-blue/10 text-tei-blue', 'bg-tei-blue', 'Completed'],
              default => ['bg-gray-100 text-gray-500', 'bg-gray-400', ucfirst($bid->status)],
          };
        @endphp

        <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden scroll-reveal">

          {{-- Card header --}}
          <div class="px-6 pt-6 pb-5 border-b border-tei-blue/6">
            <div class="flex flex-wrap items-center gap-2 mb-3">
              <span class="font-mono text-xs font-bold text-tei-blue tracking-wide">{{ $bid->code }}</span>
              <span
                class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-full {{ $statusBg }}">
                <span class="size-1.5 rounded-full {{ $statusDot }}"></span>
                {{ $statusLabel }}
              </span>
              <span class="text-xs text-tei-gray-light sm:ml-auto">Posted:
                {{ $bid->posted_date->format('d M Y') }}</span>
            </div>
            <h2 class="text-lg sm:text-xl font-black text-tei-blue leading-snug">
              {{ $bid->title }}
            </h2>
          </div>

          {{-- Card body --}}
          <div class="px-6 py-6 space-y-8">

            {{-- Contract details --}}
            <div class="rounded-xl overflow-hidden border border-tei-blue/8">

              {{-- Contract Capacity with escalation table (only when capacity rows exist) --}}
              @if ($bid->contract_description && $bid->capacityRows->isNotEmpty())
                <div class="flex gap-4 px-4 py-4 border-b border-tei-blue/6 bg-white">
                  <span class="text-xs font-bold text-tei-blue-dark shrink-0 w-52 pt-0.5">Contract Capacity</span>
                  <div class="flex-1">
                    <p class="text-xs text-tei-gray mb-3">{{ $bid->contract_description }}</p>
                    <div class="rounded-xl overflow-hidden border border-tei-blue/8">
                      <div class="grid grid-cols-3 px-4 py-2.5 bg-tei-blue/6">
                        <p class="text-xs font-bold text-tei-blue">Period From</p>
                        <p class="text-xs font-bold text-tei-blue">Period To</p>
                        <p class="text-xs font-bold text-tei-blue text-center">Contracted Capacity (MW)</p>
                      </div>
                      @foreach ($bid->capacityRows as $row)
                        <div
                          class="grid grid-cols-3 px-4 py-2.5 border-t border-tei-blue/6 {{ $loop->even ? 'bg-tei-surface' : 'bg-white' }}">
                          <p class="text-xs font-semibold text-tei-blue-dark">{{ $row->period_from }}</p>
                          <p class="text-xs text-tei-gray">{{ $row->period_to }}</p>
                          <p class="text-xs font-bold text-tei-blue text-center">{{ $row->capacity_mw }}</p>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif

              {{-- Timeline rows --}}
              @foreach ($bid->timelineRows as $row)
                <div
                  class="flex gap-4 px-4 py-3 border-b border-tei-blue/6 last:border-0 {{ $loop->odd ? 'bg-tei-surface' : 'bg-white' }}">
                  <span class="text-xs font-bold text-tei-blue-dark shrink-0 w-52">{{ $row->label }}</span>
                  @if ($row->file_path || $row->link_url)
                    <a href="{{ $row->link_url ?: Storage::url($row->file_path) }}" target="_blank"
                      class="text-xs font-semibold text-tei-orange hover:underline">{{ $row->value }}</a>
                  @else
                    <span class="text-xs text-tei-gray">{{ $row->value }}</span>
                  @endif
                </div>
              @endforeach

            </div>

            {{-- Updates --}}
            @if ($bid->updates->isNotEmpty())
              <div>
                <p class="text-[10px] font-black text-tei-blue uppercase tracking-widest mb-3">Updates</p>
                <div class="rounded-xl overflow-hidden border border-tei-blue/8">
                  @foreach ($bid->updates as $upd)
                    <div
                      class="flex items-center gap-4 px-4 py-3 border-b border-tei-blue/6 last:border-0 {{ $loop->odd ? 'bg-white' : 'bg-tei-surface' }}">
                      <span
                        class="text-xs text-tei-gray-light shrink-0 w-24">{{ $upd->update_date->format('d M Y') }}</span>
                      @if ($upd->file_path)
                        <a href="{{ Storage::url($upd->file_path) }}" target="_blank"
                          class="text-xs font-semibold text-tei-orange hover:underline flex-1">{{ $upd->label }}</a>
                        <svg class="w-3.5 h-3.5 text-tei-gray-light shrink-0" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                      @else
                        <span class="text-xs font-semibold text-tei-blue flex-1">{{ $upd->label }}</span>
                      @endif
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            {{-- Documents --}}
            @if ($bid->documents->isNotEmpty())
              <div>
                <p class="text-[10px] font-black text-tei-blue uppercase tracking-widest mb-3">Documents</p>
                <div class="rounded-xl overflow-hidden border border-tei-blue/8">
                  @foreach ($bid->documents as $doc)
                    <a href="{{ $doc->file_path ? Storage::url($doc->file_path) : '#' }}"
                      {{ $doc->file_path ? 'target="_blank"' : '' }}
                      class="flex items-center gap-3 px-4 py-3 border-b border-tei-blue/6 last:border-0 bg-white hover:bg-tei-orange/5 transition-colors duration-150 group">
                      <svg class="w-4 h-4 text-tei-orange shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                      <span
                        class="text-xs font-medium text-tei-blue flex-1 group-hover:text-tei-orange transition-colors duration-150">{{ $doc->label }}</span>
                      <svg
                        class="w-3.5 h-3.5 text-tei-gray-light shrink-0 group-hover:text-tei-orange transition-colors duration-150"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </a>
                  @endforeach
                </div>
              </div>
            @endif

            {{-- Bid Bulletins --}}
            @if ($bid->bidBulletins->isNotEmpty())
              <div>
                <p class="text-[10px] font-black text-tei-blue uppercase tracking-widest mb-3">Bid Bulletins</p>
                <div class="rounded-xl overflow-hidden border border-tei-blue/8">
                  @foreach ($bid->bidBulletins as $doc)
                    <a href="{{ $doc->file_path ? Storage::url($doc->file_path) : '#' }}"
                      {{ $doc->file_path ? 'target="_blank"' : '' }}
                      class="flex items-center gap-3 px-4 py-3 border-b border-tei-blue/6 last:border-0 bg-white hover:bg-tei-orange/5 transition-colors duration-150 group">
                      <svg class="w-4 h-4 text-tei-orange shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                      <span
                        class="text-xs font-medium text-tei-blue flex-1 group-hover:text-tei-orange transition-colors duration-150">{{ $doc->label }}</span>
                      <svg
                        class="w-3.5 h-3.5 text-tei-gray-light shrink-0 group-hover:text-tei-orange transition-colors duration-150"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </a>
                  @endforeach
                </div>
              </div>
            @endif

          </div>
        </div>
      @endforeach

    </div>
  </x-guest-section-dark>

</div>
