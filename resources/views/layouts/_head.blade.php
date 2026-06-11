{{--
    Shared HTML <head> partial — included by every layout.
    Pages override:
      @section('title', '...')          — full <title> string
      @section('description', '...')    — meta description
      @stack('head')                    — extra <link> / <meta> tags
--}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
  @if (isset($title))
    {{ $title }}
  @else
    @yield('title', config('app.name', 'Tarlac Electric Inc.'))
  @endif
</title>
<meta name="description" content="@yield('description', 'TEI Tarlac Electric Inc. — Your trusted power distribution company serving Tarlac City.')">

{{-- Prevent Alpine.js flash-of-unstyled-content --}}
<style>
  [x-cloak] {
    display: none !important;
  }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])

@stack('head')
