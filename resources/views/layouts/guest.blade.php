{{-- Public / guest layout — used by the marketing website (homepage, about, etc.) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  @include('layouts._head')
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

</body>

</html>
