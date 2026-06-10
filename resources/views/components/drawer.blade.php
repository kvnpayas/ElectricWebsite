@props([
    'show'  => '$wire.showModal',
    'close' => '$wire.closeModal()',
    'width' => 'max-w-md',
])

<div x-show="{{ $show }}" x-cloak style="z-index: 50;">

    <div class="fixed inset-0 bg-black/40 z-40"
        x-show="{{ $show }}"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="{{ $close }}">
    </div>

    <div class="fixed top-0 right-0 bottom-0 z-50 w-full {{ $width }} flex flex-col"
        style="background: white; box-shadow: -8px 0 40px rgba(15,61,92,0.12);"
        x-show="{{ $show }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-full opacity-0"
        role="dialog" aria-modal="true">

        {{ $slot }}

    </div>
</div>