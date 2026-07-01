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
    <x-document-list :items="$this->documents->map(fn ($doc) => [
        'title'    => $doc->title,
        'subtitle' => $doc->document_date->format('F d, Y'),
        'url'      => ($doc->url && $doc->file_path) ? route('rate-and-advisories.view', $doc->url) : null,
    ])" />

  </x-guest-section>

</div>
