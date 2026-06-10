@props([
    'variant' => 'primary',
    'type' => 'button',
    'loading' => null,
    'size' => 'md',
    'icon' => null,
    'fillColor' => false,
    'title' => null,
])

@php
  $variants = [
      'primary' => [
          'bg' => 'var(--color-tei-blue)',
          'hover' => 'var(--color-tei-blue-dark)',
          'shadow' => '0 4px 12px rgba(15,61,92,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-tei-blue)',
      ],
      'secondary' => [
          'bg' => 'var(--color-tei-orange)',
          'hover' => 'var(--color-tei-orange-dark)',
          'shadow' => '0 4px 12px rgba(231,103,39,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-tei-orange)',
      ],
      'success' => [
          'bg' => 'var(--color-success)',
          'hover' => 'var(--color-success-dark)',
          'shadow' => '0 4px 12px rgba(16,185,129,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-success)',
      ],
      'warning' => [
          'bg' => 'var(--color-warning)',
          'hover' => 'var(--color-warning-dark)',
          'shadow' => '0 4px 12px rgba(245,158,11,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-warning)',
      ],
      'danger' => [
          'bg' => 'var(--color-danger)',
          'hover' => 'var(--color-danger-dark)',
          'shadow' => '0 4px 12px rgba(239,68,68,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-danger)',
      ],
      'info' => [
          'bg' => 'var(--color-info)',
          'hover' => 'var(--color-info-dark)',
          'shadow' => '0 4px 12px rgba(14,165,233,0.3)',
          'text' => '#FFFFFF',
          'color' => 'var(--color-info)',
      ],
      'ghost' => [
          'bg' => 'var(--color-tei-surface)',
          'hover' => 'var(--color-tei-gray)',
          'shadow' => 'none',
          'text' => 'var(--color-tei-gray-light)',
          'color' => 'var(--color-tei-gray-light)',
      ],
  ];

  $sizes = [
      'sm' => ['btn' => 'px-3.5 py-1.5 text-xs', 'icon' => 'w-3.5 h-3.5'],
      'md' => ['btn' => 'px-4 py-2 text-sm', 'icon' => 'w-4 h-4'],
      'lg' => ['btn' => 'px-6 py-3 text-base', 'icon' => 'w-5 h-5'],
  ];

  $v = $variants[$variant] ?? $variants['primary'];
  $s = $sizes[$size] ?? $sizes['md'];

  $defaultColor = $fillColor ? $v['color'] : 'var(--color-tei-gray-light)';
  $hoverColor = $v['color'];
  $hoverBg = 'color-mix(in srgb, ' . $v['bg'] . ' 10%, transparent)';
@endphp

<button type="{{ $type }}"
  {{ $attributes->merge(['class' => 'w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-all duration-150 min-h-[32px] min-w-[32px]']) }}
  wire:loading.attr="disabled" style="color: {{ $defaultColor }};" title="{{ $title ?? '' }}"
  onmouseover="this.style.color='{{ $hoverColor }}'; this.style.backgroundColor='{{ $hoverBg }}'; this.style.transform='translateY(-2px)';"
  onmouseout="this.style.color='{{ $defaultColor }}'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)'">

  @if ($loading)
    {{-- Normal state --}}
    <span wire:loading.remove wire:target="{{ $loading }}" style="display: inline-flex; align-items: center; justify-content: center;">
      @if ($icon)
        <svg class="{{ $s['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
        </svg>
      @endif
    </span>

    {{-- Loading state --}}
    <span wire:loading.flex wire:target="{{ $loading }}" class="items-center justify-center" style="display: none;">
      <svg class="animate-spin {{ $s['icon'] }}" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
      </svg>
    </span>
  @else
    @if ($icon)
      <svg class="{{ $s['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
      </svg>
    @endif
  @endif

</button>
