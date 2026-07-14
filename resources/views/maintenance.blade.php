@extends('layouts.minimal')

@section('title', 'Site Under Maintenance — TEI')

@section('content')
  <div class="min-h-screen flex flex-col items-center justify-center px-6 py-16 bg-[#F7F8FA]">

    {{-- Card --}}
    <div class="w-full max-w-md text-center">

      {{-- Logo --}}
      <div class="flex items-center justify-center gap-3 mb-10">
        <img src="{{ asset('assets/TEI-logo-no-name.png') }}" alt="Tarlac Electric Inc." class="h-12 w-auto">
        <span class="font-logo text-[0.94rem] text-tei-blue mt-[0.8rem]">TARLAC ELECTRIC</span>
      </div>

      {{-- Icon --}}
      <div class="w-20 h-20 rounded-2xl bg-tei-orange/10 flex items-center justify-center mx-auto mb-6">
        <svg class="w-10 h-10 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>

      {{-- Heading --}}
      <h1 class="text-2xl font-black text-tei-blue-dark font-display mb-3">
        Site Under Maintenance
      </h1>
      <p class="text-sm leading-relaxed text-tei-gray max-w-sm mx-auto mb-8">
        We're currently performing scheduled maintenance on the Tarlac Electric Inc. website.
        We'll be back online shortly. Thank you for your patience.
      </p>

      {{-- Divider --}}
      <div class="w-12 h-px bg-tei-orange/30 mx-auto mb-8"></div>

      {{-- Contact --}}
      @php $contactEmail = \App\Models\SettingEmail::orderBy('sort_order')->value('address'); @endphp
      @if ($contactEmail)
        <p class="text-xs text-tei-gray-light mb-3">For urgent concerns, please reach us at:</p>
        <a href="mailto:{{ $contactEmail }}"
          class="inline-flex items-center gap-2 text-sm font-semibold text-tei-orange hover:text-tei-blue transition-colors duration-150">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          {{ $contactEmail }}
        </a>
      @endif

    </div>

    {{-- Footer --}}
    <p class="mt-12 text-xs text-tei-gray-light">
      &copy; {{ date('Y') }} Tarlac Electric Inc. All rights reserved.
    </p>

  </div>
@endsection
