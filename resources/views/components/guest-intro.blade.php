@props([
    'label'       => '',
    'title'       => '',
    'text'        => '',
    'promptTitle' => '',
    'promptText'  => '',
    'variant'     => 'secondary',
])

@php
  $variantStyles = [
      'primary'   => ['text-tei-blue',    'border-tei-blue'],
      'secondary' => ['text-tei-orange',  'border-tei-orange'],
      'accent'    => ['text-tei-gray',    'border-tei-gray'],
      'success'   => ['text-success',     'border-success'],
      'danger'    => ['text-danger',      'border-danger'],
      'warning'   => ['text-warning',     'border-warning'],
      'info'      => ['text-info',        'border-info'],
  ];
  [$labelColor, $borderColor] = $variantStyles[$variant] ?? $variantStyles['secondary'];
@endphp

<div {{ $attributes->merge(['class' => 'scroll-reveal mb-5' ]) }}>
  @if ($label)
    <p class="text-[11px] font-bold {{ $labelColor }} uppercase tracking-[0.2em] mb-3">{{ $label }}</p>
  @endif
  <div class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-start">

    <div class="flex-1">
      <h3 class="text-xl font-black text-tei-blue mb-3" style="font-family: var(--font-display);">
        {{ $title }}
      </h3>
      <p class="text-sm leading-relaxed text-tei-gray">{{ $text }}</p>
    </div>

    @if ($promptTitle || $promptText)
      <div class="w-full lg:w-80 shrink-0 border-l-[3px] {{ $borderColor }} pl-6 self-stretch">
        <p class="text-[10px] font-black {{ $labelColor }} uppercase tracking-widest mb-2">Good to know</p>
        @if ($promptTitle)
          <p class="text-sm font-bold text-tei-blue mb-1.5">{{ $promptTitle }}</p>
        @endif
        @if ($promptText)
          <p class="text-xs leading-relaxed text-tei-gray">{{ $promptText }}</p>
        @endif
      </div>
    @endif

  </div>
</div>
