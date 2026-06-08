{{-- Minimal layout — auth pages only (login, register, forgot password). No nav or footer. --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    @include('layouts._head')
</head>
<body class="h-full antialiased" style="font-family: var(--font-sans);">

    @yield('content')

    @stack('scripts')

</body>
</html>
