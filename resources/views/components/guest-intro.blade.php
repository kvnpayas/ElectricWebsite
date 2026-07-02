@props([
    'label' => '',
    'title' => '',
    'text' => '',
    'promptTitle' => '',
    'promptText' => '',
])

<div class="scroll-reveal mb-5">
  @if ($label)
    <p class="text-[11px] font-bold text-tei-orange uppercase tracking-[0.2em] mb-3">{{ $label }}</p>
  @endif
  <div class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-start">

    <div class="flex-1">

      <h3 class="text-xl font-black text-tei-blue mb-3" style="font-family: var(--font-display);">
        {{ $title }}
      </h3>
      <p class="text-sm leading-relaxed text-tei-gray">{{ $text }}</p>
    </div>

    @if ($promptTitle || $promptText)
      <div class="w-full lg:w-80 shrink-0 border-l-[3px] border-tei-orange pl-6">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-widest mb-2">Good to know</p>
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
