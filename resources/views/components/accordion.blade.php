@props(['question' => ''])

<div x-data="{ open: false }"
     class="rounded-2xl border bg-white overflow-hidden scroll-reveal"
     style="border-color: rgba(15,61,92,0.09); box-shadow: 0 2px 8px rgba(15,61,92,0.04);">

  {{-- Question row --}}
  <button
    @click="open = !open"
    class="w-full flex items-center justify-between gap-4 px-6 py-4 text-left cursor-pointer transition-colors duration-200"
    :style="open ? 'background: rgba(15,61,92,0.025)' : ''"
    @mouseenter="if (!open) $el.style.background = 'rgba(15,61,92,0.02)'"
    @mouseleave="if (!open) $el.style.background = ''"
  >
    <span class="text-sm font-semibold leading-snug text-tei-blue">{{ $question }}</span>

    <span class="shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-all duration-200"
          :style="open ? 'background: rgba(231,103,39,0.12)' : 'background: rgba(15,61,92,0.06)'">
      <svg class="w-3.5 h-3.5 transition-transform duration-300"
           :class="open ? 'rotate-45' : ''"
           fill="none"
           :stroke="open ? 'var(--color-tei-orange)' : 'var(--color-tei-blue)'"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
      </svg>
    </span>
  </button>

  {{-- Answer --}}
  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-1"
    class="border-t px-6 pt-4 pb-5 text-sm text-tei-gray leading-relaxed"
    style="border-color: rgba(15,61,92,0.07);"
  >
    {{ $slot }}
  </div>

</div>
