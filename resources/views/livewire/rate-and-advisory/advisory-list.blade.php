<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => $config['title'],
      'badgeTitle' => 'Rates & Advisories',
      'subTitle'   => $config['subtitle'],
  ])


  <x-guest-section>

    {{-- Back link --}}
    <div class="mb-8 scroll-reveal">
      <a href="{{ route('rate-and-advisories') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-semibold text-tei-gray hover:text-tei-blue transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Rates &amp; Advisories
      </a>
    </div>

    {{-- Heading + count --}}
    <div class="flex items-center justify-between mb-5 scroll-reveal">
      <h2 class="text-xl font-black text-tei-blue">{{ $config['title'] }}</h2>
      @php $count = $this->documents->count(); @endphp
      <span class="px-3 py-1 rounded-full text-xs font-bold bg-tei-blue/8 text-tei-blue">
        {{ $count }} {{ $count === 1 ? 'document' : 'documents' }}
      </span>
    </div>

    {{-- Document list --}}
    @if ($this->documents->isEmpty())
      <div class="text-center py-20 scroll-reveal">
        <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
          <svg class="w-7 h-7 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <p class="text-sm font-bold text-tei-blue mb-1">No documents available</p>
        <p class="text-xs text-tei-gray">Check back soon for updates.</p>
      </div>
    @else
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm divide-y divide-tei-blue/5 stagger-cards">
        @foreach ($this->documents as $doc)
          <div class="flex items-center gap-4 px-6 py-5 transition-colors duration-150 hover:bg-tei-orange/3 group scroll-reveal">

            {{-- PDF icon --}}
            <div class="w-11 h-11 rounded-xl bg-red-50 flex items-center justify-center shrink-0">
              <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">
              <p class="text-sm font-bold text-tei-blue leading-snug">{{ $doc->title }}</p>
              <p class="text-xs text-tei-gray mt-0.5">{{ $doc->document_date->format('F d, Y') }}</p>
            </div>

            {{-- Action --}}
            @if ($doc->url && $doc->file_path)
              <a href="{{ route('rate-and-advisories.view', $doc->url) }}" wire:navigate
                class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-orange shrink-0 group-hover:gap-2.5 transition-all duration-200">
                View Document
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            @else
              <span class="text-xs text-tei-gray shrink-0 italic">Not yet available</span>
            @endif

          </div>
        @endforeach
      </div>
    @endif

  </x-guest-section>

</div>
