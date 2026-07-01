@props([
    'variant' => 'danger',
    'show'    => 'deleteTarget',
    'cancel'  => 'cancelDelete',
    'title'   => 'Confirm Action',
    'message' => 'This action cannot be undone.',
    'icon'    => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
])

@php
  $variantStyles = [
      'danger'  => ['bg' => 'rgba(239,68,68,0.1)',  'stroke' => '#EF4444'],
      'warning' => ['bg' => 'rgba(245,158,11,0.1)', 'stroke' => '#F59E0B'],
      'success' => ['bg' => 'rgba(16,185,129,0.1)', 'stroke' => '#10B981'],
      'info'    => ['bg' => 'rgba(14,165,233,0.1)', 'stroke' => '#0EA5E9'],
  ];
  $v = $variantStyles[$variant] ?? $variantStyles['danger'];
@endphp

<div x-data="{
         _open: false,
         _unwatch: null,
         init() {
             if (this._unwatch) this._unwatch();
             this._open = Boolean(this.$wire['{{ $show }}']);
             this._unwatch = this.$wire.$watch('{{ $show }}', val => { this._open = Boolean(val); });
         }
     }"
     x-on:livewire:navigated.window="init()"
     x-show="_open"
     x-cloak
     style="z-index: 50;">

  {{-- Backdrop --}}
  <div class="fixed inset-0 bg-black/50 z-40"
       x-show="_open"
       x-transition:enter="transition ease-out duration-150"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in duration-100"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       @click="$wire.{{ $cancel }}()">
  </div>

  {{-- Panel --}}
  <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="w-full max-w-sm rounded-2xl p-6"
         style="background: white; box-shadow: 0 20px 60px rgba(15,61,92,0.18);"
         x-show="_open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="scale-95 opacity-0"
         x-transition:enter-end="scale-100 opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="scale-100 opacity-100"
         x-transition:leave-end="scale-95 opacity-0"
         role="alertdialog"
         aria-modal="true">

      <div class="flex items-start gap-4">
        <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
             style="background: {{ $v['bg'] }};">
          <svg class="w-5 h-5" fill="none" stroke="{{ $v['stroke'] }}" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
          </svg>
        </div>
        <div>
          <h3 class="text-base font-bold mb-1" style="color: #111827;">{{ $title }}</h3>
          <p class="text-sm leading-relaxed" style="color: #6B7280;">{{ $message }}</p>
        </div>
      </div>

      <div class="flex items-center justify-end gap-3 mt-6">
        {{ $slot }}
      </div>

    </div>
  </div>

</div>
