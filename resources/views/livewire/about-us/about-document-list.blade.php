<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => $config['title'],
      'badgeTitle' => $config['badge'],
      'subTitle'   => $config['subtitle'],
  ])


  <x-guest-section>

    {{-- Back link --}}
    <div class="mb-8 scroll-reveal">
      <a href="{{ route('about-us') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-semibold text-tei-gray hover:text-tei-blue transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to About Us
      </a>
    </div>

    {{-- Search --}}
    <div class="relative mb-6">
      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
        <svg class="w-4 h-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
        </svg>
      </div>
      <input
        wire:model.live.debounce.300ms="search"
        type="search"
        placeholder="Search documents…"
        class="w-full rounded-xl border border-tei-blue/12 bg-white pl-10 pr-4 py-2.5 text-sm text-tei-blue placeholder-tei-gray-light focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/30 transition"
      />
    </div>

    {{-- Heading + count --}}
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-xl font-black text-tei-blue">{{ $config['title'] }}</h2>
      <span class="px-3 py-1 rounded-full text-xs font-bold bg-tei-blue/8 text-tei-blue">
        {{ $this->documents->total() }} {{ $this->documents->total() === 1 ? 'document' : 'documents' }}
      </span>
    </div>

    {{-- Document list --}}
    <x-document-list :items="collect($this->documents->items())->map(fn ($doc) => [
        'title'    => $doc->title,
        'subtitle' => $doc->document_date->format('F d, Y'),
        'url'      => ($doc->url && $doc->file_path) ? route('rate-and-advisories.view', $doc->url) : null,
    ])" />

    {{-- Pagination --}}
    @if ($this->documents->hasPages())
      <div class="mt-6">
        {{ $this->documents->links() }}
      </div>
    @endif

  </x-guest-section>

</div>
