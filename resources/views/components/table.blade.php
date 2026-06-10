@props([
'scrollable' => true,
'class' => '',
'tableClass' => '',
])

<div @class(['overflow-x-auto'=> $scrollable, $class => $class])>
  <table @class(['w-full text-sm', $tableClass=> $tableClass])>
    {{ $slot }}
  </table>
</div>