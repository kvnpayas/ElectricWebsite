<?php

use Livewire\Component;

new class extends Component {
    public string $title = '';
    public string $subTitle = '';
    public string $badgeTitle = '';
    public array $breadcrumbs = [];

    public function mount($title = '', $subTitle = '', $badgeTitle = '', $breadcrumbs = [])
    {
        $routeName = Route::currentRouteName() ?? '';

        if (!empty($routeName)) {
            $segments = explode('.', $routeName);
            $routes = $segments;
            $lastSegment = array_pop($segments);
            $formattedTitle = ucwords(str_replace('-', ' ', $lastSegment));

            $this->title = $title ?: $formattedTitle;

            $autoBreadcrumbs = [];
            $currentPath = '';

            foreach ($routes as $route) {
                $currentPath = $currentPath ? $currentPath . '.' . $route : $route;

                $autoBreadcrumbs[] = [
                    'name' => ucwords(str_replace('-', ' ', $route)),
                    'route_name' => Route::has($currentPath) ? $currentPath : '',
                ];
            }
            $this->breadcrumbs = !empty($breadcrumbs) ? $breadcrumbs : $autoBreadcrumbs;
        }

        $this->subTitle = $subTitle;
        $this->badgeTitle = $badgeTitle ? $badgeTitle : $this->title;
    }
};
?>

<section class="relative pt-28 pb-16 overflow-hidden"
  style="background: linear-gradient(135deg, #082840 0%, #0F3D5C 100%);">
  <div class="absolute inset-0 pointer-events-none opacity-[0.03]"
    style="background-image: radial-gradient(rgba(255,255,255,0.9) 1px, transparent 1px); background-size: 32px 32px;">
  </div>
  <div class="absolute top-0 left-0 right-0 h-px"
    style="background: linear-gradient(90deg, transparent, rgba(231,103,39,0.7) 50%, transparent);"></div>
  <div class="absolute top-8 right-[8%] w-64 h-64 rounded-full blur-3xl pointer-events-none"
    style="background: radial-gradient(circle, rgba(231,103,39,0.18) 0%, transparent 70%);"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center gap-2 text-xs mb-5 select-none" style="color: rgba(255,255,255,0.4);">
      <a href="/" wire:navigate onmouseover="this.style.color='rgba(255,255,255,0.75)'"
        onmouseout="this.style.color='rgba(255,255,255,0.4)'">Home</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
      @foreach ($breadcrumbs as $index => $breadcrumb)
        @if (count($breadcrumbs) != $index + 1)
          <a href="{{ route( $breadcrumb['route_name']) }}" wire:navigate onmouseover="this.style.color='rgba(255,255,255,0.75)'"
            onmouseout="this.style.color='rgba(255,255,255,0.4)'">{{ $breadcrumb['name'] }}</a>
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        @else
          <span style="color: rgba(255,255,255,0.75);">{{ $breadcrumb['name'] }}</span>
        @endif
      @endforeach

    </nav>

    @if ($badgeTitle)
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border mb-5"
        style="background: rgba(231,103,39,0.12); border-color: rgba(231,103,39,0.3);">
        <span class="w-1.5 h-1.5 rounded-full"
          style="background: var(--color-tei-orange); animation: pulse-glow 2.5s ease-in-out infinite;"></span>
        <span class="text-xs font-bold tracking-[0.15em] uppercase" style="color: var(--color-tei-orange);">
          {{ $badgeTitle }}
        </span>
      </div>
    @endif

    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-3" style="font-family: var(--font-display);">
      {{ $title }}
    </h1>
    <p class="text-sm sm:text-base max-w-2xl" style="color: rgba(255,255,255,0.58);">
      {{ $subTitle }}
    </p>
  </div>

  <div class="absolute bottom-0 left-0 right-0 h-8">
    <svg class="w-full h-8" preserveAspectRatio="none" viewBox="0 0 1440 32" fill="none">
      <path d="M0 32 C480 0 960 0 1440 32 L1440 32 L0 32Z" fill="var(--color-tei-white)" />
    </svg>
  </div>
</section>
