@props([
    'title',
    'subtitle' => '',
])

<div {{ $attributes->merge(['class' => 'admin-page-header mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3']) }}>
    <div>
        <h1 class="text-2xl font-black text-tei-blue-dark font-display">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-sm mt-0.5 text-tei-gray">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($slot->isNotEmpty())
        <div class="shrink-0">{{ $slot }}</div>
    @endif
</div>
