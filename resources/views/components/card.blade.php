@props([
    'variant' => 'primary',
    'badge' => null,
    'preText' => null,
])

@php
  $variantStyles = [
      'primary' => ['bg-tei-blue', 'text-tei-blue', 'bg-tei-blue/22', 'rgba(15,61,92,0.30)'],
      'secondary' => ['bg-tei-orange', 'text-tei-orange', 'bg-tei-orange/22', 'rgba(231,103,39,0.30)'],
      'accent' => ['bg-tei-gray', 'text-tei-gray', 'bg-tei-gray/22', 'rgba(107,114,128,0.30)'],
      'success' => ['bg-success', 'text-success', 'bg-success/22', 'rgba(16,185,129,0.35)'],
      'danger' => ['bg-danger', 'text-danger', 'bg-danger/22', 'rgba(239,68,68,0.35)'],
      'warning' => ['bg-warning', 'text-warning', 'bg-warning/22', 'rgba(245,158,11,0.35)'],
      'info' => ['bg-info', 'text-info', 'bg-info/22', 'rgba(59,130,246,0.35)'],
  ];
  [$barClass, $textColor, $badgeColor, $hoverBorder] = $variantStyles[(string) $variant] ?? $variantStyles['primary'];
@endphp

<div
  {{ $attributes->merge(['class' => 'card group relative bg-white rounded-2xl overflow-hidden border border-tei-blue/8 flex flex-col transition-[box-shadow,border-color,transform] duration-300 cursor-pointer']) }}
  style="box-shadow: 0 2px 8px rgba(15,61,92,0.05);"
  onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 16px 40px rgba(15,61,92,0.12)'; this.style.borderColor='{{ $hoverBorder }}'"
  onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 8px rgba(15,61,92,0.05)'; this.style.borderColor=''">

  <div class="h-1 shrink-0 {{ $barClass }}"></div>

  <div class="p-6 flex-1">
    <div class="flex items-center justify-between mb-4">
      <div>
        @if ($badge)
          <span class="px-3 py-1 rounded-full text-xs font-bold {{ $badgeColor }} {{ $textColor }}">
            {{ $badge }}
          </span>
        @endif
      </div>

      <div>
        @if ($preText)
          <span class="text-xs text-tei-gray-light">{{ $preText }}</span>
        @endif
      </div>
    </div>
    {{ $slot }}
  </div>

  @isset($footer)
    <div class="px-6 pb-5 pt-4 border-t border-tei-blue/6">
      {{ $footer }}
    </div>
  @endisset

</div>
