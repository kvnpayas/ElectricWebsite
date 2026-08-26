@props([
    'title' => '',
    'subtitle' => null,
    'icon' => null,
    'close' => '$wire.closeModal()',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'flex items-center justify-between px-6 py-5 shrink-0 ' . $class]) }}
  style="border-bottom: 1px solid #F3F4F6;">

  <div class="flex items-center gap-3">

    {{-- Icon --}}
    @if ($icon)
      <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: rgba(231,103,39,0.1);">
        <svg class="w-5 h-5" fill="none" stroke="var(--color-tei-orange)" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
        </svg>
      </div>
    @endif

    <div>
      <h2 class="text-base font-bold" style="color: var(--color-tei-blue);">{{ $title }}</h2>
      @if ($subtitle)
        <p class="text-xs" style="color: #9CA3AF;">{{ $subtitle }}</p>
      @endif
    </div>

  </div>

  {{-- Close --}}
  <button type="button" wire:click="{{ $close }}"
    class="w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-colors duration-150"
    style="color: #9CA3AF;" onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.color='#374151'"
    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#9CA3AF'" aria-label="Close drawer">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>

</div>
