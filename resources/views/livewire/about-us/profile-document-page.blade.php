<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => $config['title'],
      'badgeTitle' => $config['badge'],
      'subTitle'   => $config['subtitle'],
      'breadcrumbs' => [
          ['name' => 'About Us',       'route_name' => 'about-us'],
          ['name' => 'Profile',        'route_name' => 'about-us.profile'],
          ['name' => $config['title'], 'route_name' => ''],
      ],
  ])


  <x-guest-section>

    {{-- Back link --}}
    <div class="mb-8 scroll-reveal">
      <a href="{{ route('about-us.profile') }}" wire:navigate
        class="inline-flex items-center gap-2 text-sm font-semibold text-tei-gray hover:text-tei-blue transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Profile
      </a>
    </div>

    @if ($this->grouped->isEmpty())

      {{-- Empty state --}}
      <div class="text-center py-20">
        <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
          <svg class="w-7 h-7 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <p class="text-sm font-bold text-tei-blue mb-1">No documents available</p>
        <p class="text-xs text-tei-gray">Please check back soon for updates.</p>
      </div>

    @else

      {{-- Accordion groups --}}
      <div class="space-y-3">
        @foreach ($this->grouped as $category => $docs)
          <x-accordion :question="$category">
            <ul class="space-y-2">
              @foreach ($docs as $doc)
                @php $url = ($doc->url && $doc->file_path) ? route('rate-and-advisories.view', $doc->url) : null; @endphp
                <li class="flex items-center justify-between gap-4 py-2 border-b border-tei-blue/5 last:border-0">
                  <div class="flex items-center gap-3 min-w-0">
                    <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                      <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                    </div>
                    <div class="min-w-0">
                      @if ($url)
                        <a href="{{ $url }}" wire:navigate
                          class="text-sm font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-150 leading-snug">
                          {{ $doc->title }}
                        </a>
                      @else
                        <p class="text-sm font-semibold text-tei-blue leading-snug">{{ $doc->title }}</p>
                      @endif
                      <p class="text-xs text-tei-gray-light mt-0.5">{{ $doc->document_date->format('F d, Y') }}</p>
                    </div>
                  </div>
                  @if ($url)
                    <a href="{{ $url }}" wire:navigate
                      class="inline-flex items-center gap-1 text-xs font-bold text-tei-orange shrink-0 hover:gap-2 transition-all duration-200">
                      View
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </a>
                  @else
                    <span class="text-xs text-tei-gray-light italic shrink-0">Not yet available</span>
                  @endif
                </li>
              @endforeach
            </ul>
          </x-accordion>
        @endforeach
      </div>

    @endif

  </x-guest-section>

</div>
