@props([
    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
    'title' => null,
    'text' => null,
])

<div class="flex items-center gap-3 mb-5 scroll-reveal">
  <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 bg-tei-orange/10">
    <svg class="w-4 h-4 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
    </svg>
  </div>
  <div>
    <p class="text-[10px] font-bold tracking-[0.15em] uppercase text-tei-orange mb-0.5">{{ $title }}</p>
    <h2 class="text-base font-bold text-tei-blue leading-none">{{ $text }}</h2>
  </div>
</div>
