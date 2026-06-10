@props([
    'color' => 'tei-blue',
    'icon' => null,
    'value' => null,
    'label' => null,
    'trend' => null,
    'delta' => null,
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'stat-card bg-white rounded-2xl p-5 flex items-start gap-4 ' . $class]) }}
  x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false" style="transform: translateY(0);"
  :style="{
      border: '1px solid rgba(15,61,92,0.07)',
      boxShadow: hovered ? '0 8px 24px rgba(8,40,64,0.10)' : '0 2px 12px rgba(15,61,92,0.05)',
      transform: hovered ? 'translateY(-5px)' : 'translateY(0)',
      transition: 'box-shadow 0.2s ease, transform 0.2s ease'
  }">
  <div class="flex gap-5 w-full">

    {{-- Icon --}}
    @if ($icon)
      <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 bg-{{ $color }}/10">
        <svg class="w-5 h-5" fill="none" stroke="var(--color-{{ $color }})" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
        </svg>
      </div>
    @endif

    {{-- Body --}}
    <div class="min-w-0">
      @if ($value !== null)
        <div class="text-2xl font-black text-tei-blue">{{ $value }}</div>
      @endif

      @if ($label)
        <div class="text-sm font-semibold truncate text-tei-gray-dark">{{ $label }}</div>
      @endif

      @if ($trend)
        <div class="text-xs mt-0.5 truncate text-tei-gray-light">{{ $trend }}</div>
      @endif
    </div>

    {{-- Delta badge --}}
    @if ($delta)
      <div class="ms-auto">
        <span class="text-xs font-semibold px-2 py-0.5 rounded-full shrink-0 bg-success/10 text-success">
          {{ $delta }}
        </span>
      </div>
    @endif

  </div>
</div>
