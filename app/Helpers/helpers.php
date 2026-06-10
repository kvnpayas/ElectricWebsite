<?php

if (!function_exists('get_initials')) {
  function get_initials(string $name, int $limit = 2): string
  {
    return collect(explode(' ', trim($name)))
      ->filter()
      ->take($limit)
      ->map(fn($word) => strtoupper($word[0]))
      ->implode('');
  }
}