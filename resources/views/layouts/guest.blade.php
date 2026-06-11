{{-- Public / guest layout — used by the marketing website (homepage, about, etc.) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  @include('layouts._head')
  {{-- Pre-hide animated elements before first paint so they never flash visible→invisible.
       The sync <script> adds the class before any body content renders.
       If JS is disabled or GSAP fails, the fallback in animations.blade.php removes the class. --}}
  <script>document.documentElement.classList.add('js-anim')</script>
  <style>.js-anim .scroll-reveal,.js-anim .stagger-cards .card{opacity:0}</style>
</head>

<body class="antialiased overflow-x-hidden"
  style="font-family: var(--font-sans); background-color: var(--color-tei-white);">

  @include('partials.nav')
  @isset($slot)
    {{ $slot }}
  @else
    @yield('content')
  @endisset
  @include('partials.contact-section')
  @include('partials.footer')

  
  @stack('scripts')
  @include('partials.animations')

</body>

</html>
