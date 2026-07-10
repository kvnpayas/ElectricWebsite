<div>

  {{-- PAGE HEADER --}}
  @livewire('guest.page-header', [
      'title'      => 'Live Stream',
      'badgeTitle' => $enabled ? 'Live Now' : 'Stream',
      'subTitle'   => $enabled
          ? ($description ?: 'Watch our official livestream below.')
          : 'There is no active stream at the moment. Please check back later or follow us on our social media channels for updates.',
  ])


  <x-guest-section>
    @if ($enabled && $embedUrl)

      {{-- Live badge + title --}}
      <div class="flex items-center gap-3 mb-5">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold text-white"
              style="background-color:#dc2626;">
          <span class="size-1.5 rounded-full bg-white animate-pulse"></span>
          LIVE
        </span>
        @if ($title)
          <h2 class="text-base font-bold text-tei-blue">{{ $title }}</h2>
        @endif
      </div>

      {{-- YouTube embed --}}
      <div class="w-full rounded-2xl overflow-hidden shadow-lg border border-tei-blue/8"
           style="aspect-ratio:16/9;">
        <iframe src="{{ $embedUrl }}"
                class="w-full h-full"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
        </iframe>
      </div>

      @if ($description)
        <p class="mt-5 text-sm text-tei-gray leading-relaxed max-w-3xl">{{ $description }}</p>
      @endif

    @else

      {{-- Offline state --}}
      <div class="flex flex-col items-center justify-center py-24 text-center">
        <div class="size-20 rounded-3xl flex items-center justify-center mb-5"
             style="background: rgba(15,61,92,0.06);">
          <svg class="size-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"
               style="color: rgba(15,61,92,0.25);">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-tei-blue mb-2">No Active Stream</h3>
        <p class="text-sm text-tei-gray max-w-md leading-relaxed">
          There is no livestream currently active. Follow our official social media channels to get notified when we go live.
        </p>
        @if ($socials->isNotEmpty())
          <div class="flex items-center gap-3 mt-6">
            @foreach ($socials as $social)
              <a href="{{ $social->url }}" target="_blank" rel="noopener"
                 class="px-4 py-2 rounded-xl text-sm font-semibold border transition-colors duration-150"
                 style="border-color: rgba(15,61,92,0.15); color: #082840;"
                 onmouseover="this.style.borderColor='var(--color-tei-orange)'; this.style.color='var(--color-tei-orange)'"
                 onmouseout="this.style.borderColor='rgba(15,61,92,0.15)'; this.style.color='#082840'">
                {{ $social->platform }}
              </a>
            @endforeach
          </div>
        @endif
      </div>

    @endif
  </x-guest-section>

</div>
