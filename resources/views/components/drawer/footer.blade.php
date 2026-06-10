@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'flex items-center justify-end gap-3 px-6 py-5 shrink-0 ' . $class]) }}
  style="border-top: 1px solid #F3F4F6;">
  {{ $slot }}
</div>
