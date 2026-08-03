
<meta charset="utf-8">
<link rel="icon" type="image/png" href="{{ asset('assets/TEI-logo-no-name.png') }}">
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
<!-- Developed and Design by KJSP -->
<style>
  [x-cloak] {
    display: none !important;
  }
</style>

<script>window.livewireScriptConfig = {"uri": "{{ url(app('livewire')->getUpdateUri()) }}"};</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])

@stack('head')
