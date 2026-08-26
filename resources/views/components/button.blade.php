@props([
    'variant' => 'primary',
    'type' => 'button',
    'loading' => null,
    'size' => 'md',
    'icon' => null,
    'iconPos' => 'left',
])

@php
  $variants = [
      'secondary' => [
          'bg' => 'var(--color-tei-orange)',
          'hover' => 'var(--color-tei-orange-dark)',
          'shadow' => '0 4px 12px rgba(231,103,39,0.3)',
          'text' => '#FFFFFF',
      ],
      'primary' => [
          'bg' => 'var(--color-tei-blue)',
          'hover' => 'var(--color-tei-blue-dark)',
          'shadow' => '0 4px 12px rgba(15,61,92,0.3)',
          'text' => '#FFFFFF',
      ],
      'success' => [
          'bg' => 'var(--color-success)',
          'hover' => 'var(--color-success-dark)',
          'shadow' => '0 4px 12px rgba(16,185,129,0.3)',
          'text' => '#FFFFFF',
      ],
      'warning' => [
          'bg' => 'var(--color-warning)',
          'hover' => 'var(--color-warning-dark)',
          'shadow' => '0 4px 12px rgba(245,158,11,0.3)',
          'text' => '#FFFFFF',
      ],
      'danger' => [
          'bg' => 'var(--color-danger)',
          'hover' => 'var(--color-danger-dark)',
          'shadow' => '0 4px 12px rgba(239,68,68,0.3)',
          'text' => '#FFFFFF',
      ],
      'info' => [
          'bg' => 'var(--color-info)',
          'hover' => 'var(--color-info-dark)',
          'shadow' => '0 4px 12px rgba(14,165,233,0.3)',
          'text' => '#FFFFFF',
      ],
      'ghost' => [
          'bg' => 'var(--color-tei-surface)',
          'hover' => '#E5E7EB',
          'shadow' => 'none',
          'text' => 'var(--color-tei-gray-light)',
      ],
  ];

  $sizes = [
      'sm' => ['btn' => 'px-3.5 py-1.5 text-xs', 'icon' => 'w-3.5 h-3.5'],
      'md' => ['btn' => 'px-4 py-2 text-sm', 'icon' => 'w-4 h-4'],
      'lg' => ['btn' => 'px-6 py-3 text-base', 'icon' => 'w-5 h-5'],
  ];

  $v = $variants[$variant] ?? $variants['primary'];
  $s = $sizes[$size] ?? $sizes['md'];
  $iconEl = $icon
      ? '<svg class="' .
          $s['icon'] .
          ' shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="' .
          $icon .
          '" />
           </svg>'
      : '';
@endphp

<button type="{{ $type }}"
  {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 rounded-xl font-bold cursor-pointer transition-all duration-150 ' . $s['btn']]) }}
  wire:loading.attr="disabled" wire:loading.class="opacity-70 cursor-not-allowed"
  style="background-color: {{ $v['bg'] }}; color: {{ $v['text'] }}; box-shadow: {{ $v['shadow'] }};"
  onmouseover="this.style.backgroundColor='{{ $v['hover'] }}'; this.style.transform='translateY(-2px)'"
  onmouseout="this.style.backgroundColor='{{ $v['bg'] }}'; this.style.transform='translateY(0)'">

  @if ($loading)
    <span class="inline-flex items-center justify-center gap-2">
      <span wire:loading.remove class="inline-flex items-center gap-2">
        @if ($icon && $iconPos === 'left')
          {!! $iconEl !!}
        @endif
        {{ $slot }}
        @if ($icon && $iconPos === 'right')
          {!! $iconEl !!}
        @endif
      </span>

      <span wire:loading.flex class="items-center gap-2" style="display: none;">
        <svg class="animate-spin {{ $s['icon'] }}" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
        </svg>
        {{ $loading }}
      </span>
    </span>
  @else
    @if ($icon && $iconPos === 'left')
      {!! $iconEl !!}
    @endif
    {{ $slot }}
    @if ($icon && $iconPos === 'right')
      {!! $iconEl !!}
    @endif
  @endif

</button>