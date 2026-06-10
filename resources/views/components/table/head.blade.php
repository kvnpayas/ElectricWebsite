@props([
    'class' => '',
])

<thead>
  <tr {{ $attributes->merge(['class' => 'bg-[#FAFAFA]' . ' ' . $class]) }} style="border-bottom: 1px solid #F3F4F6;">
    {{ $slot }}
  </tr>
</thead>
