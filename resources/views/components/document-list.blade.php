{{--
  A reusable document list component.

  Props:
    $items        — iterable of items. Each item must expose (via array key or property):
                      title     : string   (required)
                      subtitle  : string   (optional) — shown below the title in gray
                      url       : string   (optional) — if null shows "Not yet available"
    $emptyMessage    — heading shown when $items is empty
    $emptySubMessage — sub-text shown when $items is empty
    $actionLabel     — text on the link button  (default: "View Document")
--}}
@props([
    'items'          => [],
    'emptyMessage'   => 'No documents available',
    'emptySubMessage'=> 'Check back soon for updates.',
    'actionLabel'    => 'View Document',
])

@php $items = collect($items); @endphp

@if ($items->isEmpty())
  <div class="text-center py-20">
    <div class="w-14 h-14 rounded-2xl bg-tei-blue/6 flex items-center justify-center mx-auto mb-4">
      <svg class="w-7 h-7 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
    </div>
    <p class="text-sm font-bold text-tei-blue mb-1">{{ $emptyMessage }}</p>
    <p class="text-xs text-tei-gray">{{ $emptySubMessage }}</p>
  </div>
@else
  <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm divide-y divide-tei-blue/5">
    @foreach ($items as $item)
      @php
        $title    = data_get($item, 'title', '');
        $subtitle = data_get($item, 'subtitle');
        $url      = data_get($item, 'url');
      @endphp
      <div class="flex items-center gap-4 px-6 py-5 transition-colors duration-150 hover:bg-tei-orange/3 group">

        {{-- PDF icon --}}
        <div class="w-11 h-11 rounded-xl bg-red-50 flex items-center justify-center shrink-0">
          <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>

        {{-- Content --}}
        <div class="flex-1 min-w-0">
          <p class="text-sm font-bold text-tei-blue leading-snug">{{ $title }}</p>
          @if ($subtitle)
            <p class="text-xs text-tei-gray mt-0.5">{{ $subtitle }}</p>
          @endif
        </div>

        {{-- Action --}}
        @if ($url)
          <a href="{{ $url }}" wire:navigate
            class="inline-flex items-center gap-1.5 text-xs font-bold text-tei-orange shrink-0 group-hover:gap-2.5 transition-all duration-200">
            {{ $actionLabel }}
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
