<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'key';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = ['key', 'value'];

  public const THEME_PRESETS = [
    'primary' => [
      '--color-brand-header' => '#082840',
      '--color-brand-hero-start' => '#082840',
      '--color-brand-hero-mid' => '#0F3D5C',
      '--color-brand-hero-end' => '#1A5A85',
    ],
    'light' => [
      // light blue
      // '--color-brand-header'     => '#1A5A85',
      // '--color-brand-hero-start' => '#1A5A85',
      // '--color-brand-hero-mid'   => '#41B6E6',
      // '--color-brand-hero-end'   => '#7ACCEE',

      // light dark blue
      '--color-brand-header' => '#0F3D5C',
      '--color-brand-hero-start' => '#0F3D5C',
      '--color-brand-hero-mid' => '#1A5A85',
      '--color-brand-hero-end' => '#41B6E6',
    ],
  ];

  public static function get(string $key, mixed $default = null): mixed
  {
    return static::where('key', $key)->value('value') ?? $default;
  }

  public static function set(string $key, mixed $value): void
  {
    static::updateOrCreate(['key' => $key], ['value' => $value]);
  }
}
