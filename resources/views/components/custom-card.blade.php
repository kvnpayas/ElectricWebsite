@props([
    'number' => null,
    'title' => null,
    'text' => null,
    'href' => null,
    'cta' => null,
    'icon' => 'default',
])

<div
  class="card group relative bg-white rounded-2xl p-7 border cursor-pointer transition-[box-shadow,border-color,transform] duration-300"
  style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 12px rgba(15,61,92,0.06);"
  onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 48px rgba(15,61,92,0.13)'; this.style.borderColor='rgba(231,103,39,0.22)'"
  onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 12px rgba(15,61,92,0.06)'; this.style.borderColor='rgba(15,61,92,0.09)'">

  <div class="flex items-start justify-between mb-5">
    @if ($icon)
      @if ($icon === 'default')
        <div class="w-5 h-[3px] rounded-full bg-tei-orange mt-1.5"></div>
      @else
        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
          stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
        </svg>
      @endif
    @endif
    @if ($number)
      <span class="text-5xl font-black leading-none select-none text-tei-gray-light/30">{{ $number }}</span>
    @endif
  </div>

  @if ($title)
    <h3 class="text-base font-bold mb-2 text-tei-blue">
      @if ($href)
        <a href="{{ route($href) }}" wire:navigate class="hover:underline">{{ $title }}</a>
      @else
        {{ $title }}
      @endif
    </h3>
  @endif
  @if ($text)
    <p class="text-sm leading-relaxed mb-5 text-tei-gray">
      {{ $text }}
    </p>
  @endif

  {{ $slot }}

  @if ($cta)
    <span class="gap-1.5 text-sm font-bold transition-all duration-200 text-tei-orange">
      @if ($href)
        <a href="{{ route($href) }}" class="inline-flex items-center" wire:navigate>
          {{ $cta }}
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      @else
        {{ $cta }}
      @endif
    </span>
  @endif

  <div
    class="absolute bottom-0 left-6 right-6 h-0.5 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100 bg-gradient-to-r from-tei-orange to-transparent">
  </div>
</div>
