@props([
    'title'   => '',
    'heading' => '',
    'text'    => '',
    'variant' => 'secondary',
    'align'   => 'center',
])

@php
  $variantColors = [
      'primary'   => 'text-tei-blue',
      'secondary' => 'text-tei-orange',
      'accent'    => 'text-tei-gray',
      'success'   => 'text-success',
      'danger'    => 'text-danger',
      'warning'   => 'text-warning',
      'info'      => 'text-info',
  ];
  $labelColor = $variantColors[$variant] ?? $variantColors['secondary'];

  $textAlign = match($align) {
      'center' => 'text-center',
      'right'  => 'text-right',
      default  => '',
  };
@endphp

<div {{ $attributes->merge(['class' => 'scroll-reveal ' . ($heading ? 'mb-12' : 'mb-10')]) }}>
  <div class="flex items-center gap-6 {{ $heading ? 'mb-6' : '' }}">
    @if ($align === 'center' || $align === 'right')
      <div class="h-px flex-1 bg-tei-blue/8"></div>
    @endif
    <p class="text-[11px] font-bold {{ $labelColor }} uppercase tracking-[0.2em] shrink-0">{{ $title }}</p>
    @if ($align === 'left' || $align === 'center')
      <div class="h-px flex-1 bg-tei-blue/8"></div>
    @endif
  </div>
  @if ($heading)
    <h2 class="text-2xl sm:text-3xl font-black mb-2 text-tei-blue {{ $textAlign }}">{{ $heading }}</h2>
  @endif
  @if ($text)
    <p class="text-sm max-w-2xl text-tei-gray {{ $textAlign }} {{ $align === 'center' ? 'mx-auto' : '' }}">{{ $text }}</p>
  @endif
</div>
