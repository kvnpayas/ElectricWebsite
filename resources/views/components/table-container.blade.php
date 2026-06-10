@props([
    'title' => null,
    'count' => null,
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl overflow-hidden ' . $class]) }}
  style="border: 1px solid rgba(15,61,92,0.07); box-shadow: 0 2px 16px rgba(15,61,92,0.06);">

  @if ($title || $count !== null || isset($toolbar))
    <div class="px-5 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4"
      style="border-bottom: 1px solid #F3F4F6;">

      @if ($title || $count !== null)
        <div class="flex items-center gap-3 shrink-0">
          @if ($title)
            <h2 class="text-base font-bold" style="color: var(--color-tei-blue);">{{ $title }}</h2>
          @endif
          @if ($count !== null)
            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold text-tei-orange bg-tei-orange/10">
              {{ $count }}
            </span>
          @endif
        </div>

      @endif

      @isset($toolbar)
        <div class="flex flex-wrap items-center gap-2.5">
          {{ $toolbar }}
        </div>
      @endisset

    </div>
  @endif

  {{ $slot }}

  @isset($pagination)
    <div class="px-4 py-3 border-t" style="border-color: #E5E7EB;">
      {{ $pagination }}
    </div>
  @endisset

</div>
