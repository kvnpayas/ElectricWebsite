<?php

use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function slides(): array
    {
        return HomeBanner::where('is_published', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($b) => [
                'label'    => $b->label,
                'headline' => $b->headline,
                'sub'      => $b->sub,
                'cta_text' => $b->cta_text,
                'cta_href' => $b->cta_href,
                'cta_external' => $b->cta_external,
                'image'        => $b->image_path    ? Storage::url($b->image_path)    : null,
                'image_width'  => $b->image_width,
                'image_height' => $b->image_height,
                'bg_image'     => $b->bg_image_path ? Storage::url($b->bg_image_path) : null,
            ])
            ->all();
    }
};
?>

@php
// Fallback slides when database is empty (remove once banners are added via admin)
$slides = $this->slides ?: [
    [
        'label'    => 'Powering Tarlac Since 1949',
        'headline' => "Reliable Power,\nEvery Day.",
        'sub'      => 'TEI Tarlac Electric Inc. delivers electricity to over 100,000 customers in Tarlac City. Your power, our commitment.',
        'cta_text' => 'View Advisories',
        'cta_href' => route('rate-and-advisories'),
        'image'    => null,
        'bg_image' => null,
    ],
];
@endphp

@if (count($slides) === 0)
  {{-- No published banners — show nothing --}}
@else

<section
    x-data="{
        current: 0,
        total: {{ count($slides) }},
        progress: 0,
        _rafId: null,
        _startTime: null,
        duration: 5000,
        init() {
            this._advance();
        },
        destroy() {
            cancelAnimationFrame(this._rafId);
        },
        _advance() {
            cancelAnimationFrame(this._rafId);
            this.progress = 0;
            this._startTime = performance.now();
            const self = this;
            const tick = (now) => {
                const elapsed = now - self._startTime;
                self.progress = Math.min((elapsed / self.duration) * 100, 100);
                if (elapsed < self.duration) {
                    self._rafId = requestAnimationFrame(tick);
                } else {
                    self.next();
                }
            };
            this._rafId = requestAnimationFrame(tick);
        },
        next() {
            this.current = (this.current + 1) % this.total;
            this._advance();
        },
        prev() {
            this.current = (this.current - 1 + this.total) % this.total;
            this._advance();
        },
        goTo(i) {
            if (i !== this.current) {
                this.current = i;
                this._advance();
            }
        }
    }"
    class="relative overflow-hidden h-screen min-h-130"
>

    {{-- BASE GRADIENT ────────────────────────────────── --}}
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #082840 0%, #0F3D5C 55%, #1A5A85 100%);"></div>
    <div class="absolute inset-0 pointer-events-none opacity-[0.035]"
        style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 32px 32px;"></div>

    {{-- SLIDES ──────────────────────────────────────── --}}
    @foreach ($slides as $i => $slide)
        @php $hasBg = !empty($slide['bg_image']); @endphp

        <div
            class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            :class="{{ $i }} === current ? 'opacity-100 z-10' : 'opacity-0 z-0'"
        >
            {{-- Background image (optional) --}}
            @if ($hasBg)
                <img src="{{ $slide['bg_image'] }}" alt=""
                    class="absolute inset-0 w-full h-full object-cover"
                    loading="{{ $i === 0 ? 'eager' : 'lazy' }}" />
                <div class="absolute inset-0"
                    style="background: linear-gradient(105deg, rgba(8,40,64,0.85) 0%, rgba(8,40,64,0.55) 50%, rgba(8,40,64,0.28) 100%);"></div>
            @else
                {{-- Decorative orbs when no bg photo --}}
                <div class="absolute top-[10%] right-[5%] w-72 h-72 rounded-full blur-3xl pointer-events-none"
                    style="background: radial-gradient(circle, rgba(231,103,39,0.24) 0%, rgba(231,103,39,0.02) 70%);"></div>
                <div class="absolute bottom-[15%] left-[3%] w-52 h-52 rounded-full blur-2xl pointer-events-none"
                    style="background: radial-gradient(circle, rgba(65,182,230,0.16) 0%, transparent 70%);"></div>
            @endif

            {{-- TWO-COLUMN CONTENT ─────────────────── --}}
            <div class="relative z-10 h-full flex items-center">
                <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-14 w-full">
                    <div class="flex items-center gap-10 lg:gap-16">

                        {{-- LEFT: text ──────────────────────── --}}
                        <div class="flex-1 min-w-0">

                            {{-- Label — editorial thin line style --}}
                            @if (!empty($slide['label']))
                                <div class="flex items-center gap-3 mb-5">
                                    <span class="block w-8 h-px shrink-0"
                                        style="background-color: var(--color-tei-orange);"></span>
                                    <span class="text-xs font-medium tracking-[0.22em] uppercase"
                                        style="color: rgba(255,255,255,0.52);">{{ $slide['label'] }}</span>
                                </div>
                            @endif

                            {{-- Headline --}}
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black leading-[1.05] mb-5"
                                style="font-family: var(--font-display); color: white;">
                                {!! nl2br(e($slide['headline'])) !!}
                            </h1>

                            {{-- Subtitle --}}
                            @if (!empty($slide['sub']))
                                <p class="text-base sm:text-lg leading-relaxed mb-8 max-w-lg"
                                    style="color: rgba(255,255,255,0.68);">
                                    {{ $slide['sub'] }}
                                </p>
                            @endif

                            {{-- Single CTA button --}}
                            @if (!empty($slide['cta_text']) && !empty($slide['cta_href']))
                                <a href="{{ $slide['cta_href'] }}"
                                    @if (!empty($slide['cta_external'])) target="_blank" rel="noopener noreferrer" @endif
                                    class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl text-sm font-bold shadow-xl transition-all duration-200"
                                    style="background-color: var(--color-tei-orange); color: white;"
                                    onmouseover="this.style.backgroundColor='var(--color-tei-orange-dark)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 20px 44px rgba(231,103,39,0.4)'"
                                    onmouseout="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform=''; this.style.boxShadow=''">
                                    {{ $slide['cta_text'] }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @endif

                        </div>{{-- /LEFT --}}

                        {{-- RIGHT: image card or decorative (lg+) ── --}}
                        @php
                            $colW = $slide['image_width']  ? $slide['image_width'].'px'  : '420px';
                            $imgH = $slide['image_height'] ? $slide['image_height'].'px' : '660px';
                        @endphp
                        <div class="hidden lg:flex shrink-0 items-center justify-center"
                            style="width: {{ $colW }};">

                            @if (!empty($slide['image']))
                                {{-- Floating card --}}
                                <div class="relative w-full">
                                    <div class="absolute -inset-4 rounded-3xl blur-2xl opacity-20 pointer-events-none"
                                        style="background: var(--color-tei-orange);"></div>
                                    <div class="relative rounded-2xl overflow-hidden shadow-[0_32px_64px_rgba(0,0,0,0.55)]"
                                        style="border: 1px solid rgba(255,255,255,0.14);">
                                        <img src="{{ $slide['image'] }}" alt="" class="block w-full"
                                            style="max-height: {{ $imgH }}; object-fit: contain; background-color: white;"
                                            loading="{{ $i === 0 ? 'eager' : 'lazy' }}" />
                                        <div class="absolute bottom-0 left-0 right-0 h-10 pointer-events-none"
                                            style="background: linear-gradient(to bottom, transparent, rgba(8,40,64,0.2));"></div>
                                    </div>
                                </div>
                            @else
                                {{-- Abstract electric tower SVG --}}
                                {{-- <div class="w-64 h-64 opacity-[0.07] pointer-events-none select-none">
                                    <svg viewBox="0 0 300 420" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                        <path d="M150 20 L110 130 L160 130 L130 240 L180 240 L150 350" stroke="white" stroke-width="3" stroke-dasharray="10 6"/>
                                        <path d="M150 20 L190 130 L140 130 L170 240 L120 240 L150 350" stroke="white" stroke-width="3" stroke-dasharray="10 6"/>
                                        <circle cx="150" cy="20" r="6" fill="white"/>
                                        <circle cx="150" cy="130" r="4" fill="white"/>
                                        <circle cx="150" cy="240" r="4" fill="white"/>
                                        <line x1="80" y1="130" x2="220" y2="130" stroke="white" stroke-width="2"/>
                                        <line x1="100" y1="240" x2="200" y2="240" stroke="white" stroke-width="2"/>
                                        <line x1="80" y1="130" x2="80" y2="155" stroke="white" stroke-width="1.5"/>
                                        <line x1="220" y1="130" x2="220" y2="155" stroke="white" stroke-width="1.5"/>
                                        <line x1="125" y1="130" x2="125" y2="155" stroke="white" stroke-width="1.5"/>
                                        <line x1="175" y1="130" x2="175" y2="155" stroke="white" stroke-width="1.5"/>
                                        <line x1="100" y1="240" x2="100" y2="265" stroke="white" stroke-width="1.5"/>
                                        <line x1="200" y1="240" x2="200" y2="265" stroke="white" stroke-width="1.5"/>
                                        <line x1="135" y1="240" x2="135" y2="265" stroke="white" stroke-width="1.5"/>
                                        <line x1="165" y1="240" x2="165" y2="265" stroke="white" stroke-width="1.5"/>
                                    </svg>
                                </div> --}}
                            @endif

                        </div>{{-- /RIGHT --}}

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- PREV ARROW (desktop only) ────────────────────── --}}
    @if (count($slides) > 1)
        <button @click="prev()"
            class="hidden lg:flex absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full items-center justify-center border-2 transition-all duration-200"
            style="border-color: rgba(255,255,255,0.25); background: rgba(255,255,255,0.06); color: white;"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.16)'; this.style.borderColor='rgba(255,255,255,0.6)'"
            onmouseout="this.style.backgroundColor='rgba(255,255,255,0.06)'; this.style.borderColor='rgba(255,255,255,0.25)'"
            aria-label="Previous slide">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- NEXT ARROW (desktop only) --}}
        <button @click="next()"
            class="hidden lg:flex absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full items-center justify-center border-2 transition-all duration-200"
            style="border-color: rgba(255,255,255,0.25); background: rgba(255,255,255,0.06); color: white;"
            onmouseover="this.style.backgroundColor='rgba(255,255,255,0.16)'; this.style.borderColor='rgba(255,255,255,0.6)'"
            onmouseout="this.style.backgroundColor='rgba(255,255,255,0.06)'; this.style.borderColor='rgba(255,255,255,0.25)'"
            aria-label="Next slide">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    @endif

    {{-- BOTTOM CENTER: indicators stacked above scroll cue ─── --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-3">

        {{-- BAR INDICATORS --}}
        @if (count($slides) > 1)
            <div class="flex items-center gap-2.5">
                @foreach ($slides as $i => $slide)
                    <button @click="goTo({{ $i }})"
                        class="relative h-1.5 rounded-full overflow-hidden transition-[width] duration-300"
                        :class="{{ $i }} === current ? 'w-14' : 'w-8'"
                        style="background: rgba(255,255,255,0.22);"
                        aria-label="Go to slide {{ $i + 1 }}">
                        <span class="absolute inset-y-0 left-0 rounded-full"
                            style="background-color: var(--color-tei-orange); transition: width 0.05s linear;"
                            :style="{{ $i }} === current
                                ? 'width: ' + progress + '%'
                                : ({{ $i }} < current ? 'width: 100%' : 'width: 0%')"></span>
                    </button>
                @endforeach
            </div>
        @endif

        {{-- SCROLL DOWN --}}
        <button
            class="flex flex-col items-center gap-1 group cursor-pointer"
            onclick="window.scrollBy({ top: window.innerHeight, behavior: 'smooth' })"
            aria-label="Scroll down">
            <span class="text-[9px] font-semibold tracking-[0.28em] uppercase group-hover:opacity-60 transition-opacity duration-200"
                style="color: rgba(255,255,255,0.32);">Scroll</span>
            <svg class="w-4 h-4 animate-bounce group-hover:opacity-60 transition-opacity duration-200"
                style="color: rgba(255,255,255,0.32);"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

    </div>

    {{-- Top shimmer --}}
    <div class="absolute top-0 left-0 right-0 h-px z-20"
        style="background: linear-gradient(90deg, transparent 0%, rgba(231,103,39,0.65) 50%, transparent 100%);"></div>

</section>

@endif
