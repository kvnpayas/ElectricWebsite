<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = [
        'label', 'headline', 'sub', 'cta_text', 'cta_href',
        'image_path', 'image_name', 'bg_image_path', 'bg_image_name',
        'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order'   => 'integer',
    ];
}
