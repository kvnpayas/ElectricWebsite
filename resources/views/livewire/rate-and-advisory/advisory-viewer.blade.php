<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'       => $this->document->title,
      'badgeTitle'  => $this->categoryLabel,
      'subTitle'    => $this->document->document_date->format('F d, Y'),
      'breadcrumbs' => $this->breadcrumbs,
  ])


  <x-guest-section>

    {{-- Top bar: back link + download button --}}
    <div class="flex items-center justify-between mb-6 scroll-reveal">
      <a href="{{ $this->backUrl }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-semibold text-tei-gray hover:text-tei-blue transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to {{ $this->categoryLabel }}
      </a>

      @if ($this->pdfRoute && $this->document->is_downloadable)
        <a href="{{ $this->pdfRoute }}"
          download="{{ $this->document->file_name }}"
          class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-tei-blue text-white hover:bg-tei-blue/90 transition-colors duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
          </svg>
          Download PDF
        </a>
      @endif
    </div>

    {{-- Metadata chips --}}
    <div class="flex flex-wrap items-center gap-2.5 mb-6 scroll-reveal">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-tei-blue/10 text-tei-blue">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        {{ $this->categoryLabel }}
      </span>
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-tei-gray/10 text-tei-gray">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        {{ $this->document->document_date->format('F d, Y') }}
      </span>
      @if ($this->document->file_name)
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-600">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
          </svg>
          {{ $this->document->file_name }}
        </span>
      @endif
    </div>

    {{-- PDF embed --}}
    @if ($this->pdfRoute)
      <div class="rounded-2xl overflow-hidden border border-tei-blue/10 shadow-sm scroll-reveal">
        <iframe
          src="{{ $this->pdfRoute }}{{ $this->document->is_downloadable ? '' : '#toolbar=0' }}"
          class="w-full"
          style="height: 80vh; min-height: 500px;"
          title="{{ $this->document->title }}"
        ></iframe>
      </div>
    @else
      <div class="text-center py-20 rounded-2xl border border-tei-blue/8 bg-tei-blue/2 scroll-reveal">
        <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
          <svg class="w-7 h-7 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <p class="text-sm font-bold text-tei-blue mb-1">Document file not yet available</p>
        <p class="text-xs text-tei-gray">Please check back later or contact TEI for a copy.</p>
      </div>
    @endif

  </x-guest-section>

</div>
