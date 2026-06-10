@props([
    'hidden' => null,
    'class' => '',
    'align' => 'left',
])

@php
  $hiddenClass = match ($hidden) {
      'sm' => 'hidden sm:table-cell',
      'md' => 'hidden md:table-cell',
      'lg' => 'hidden lg:table-cell',
      default => '',
  };

  $alignClass = match ($align) {
      'center' => 'text-center',
      'right' => 'text-right',
      default => 'text-left',
  };
@endphp

<th
  {{ $attributes->merge(['class' => 'px-4 py-3 text-xs font-bold uppercase tracking-wider text-tei-gray-light ' . $alignClass . ' ' . $hiddenClass . ' ' . $class]) }}>
  {{ $slot }}
</th>
