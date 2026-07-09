<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property string $title
 * @property \Illuminate\Support\Carbon $document_date
 * @property string $status
 * @property string|null $file_path
 * @property string|null $file_name
 * @property string|null $url  URL slug for customer-facing routing (e.g. erc-sample-document)
 * @property bool $is_downloadable
 * @property int $sort_order
 * @property int|null $ctrd_user
 * @property int|null $upd_user
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read string|null $public_url
 */
class AdvisoryDocument extends Model
{
    use LogsActivity;
    protected $fillable = [
        'category',
        'title',
        'document_date',
        'status',
        'file_path',
        'file_name',
        'url',
        'is_downloadable',
        'sort_order',
        'ctrd_user',
        'upd_user',
    ];

    protected $casts = [
        'document_date'   => 'date',
        'is_downloadable' => 'boolean',
    ];

    // ── Scopes ────────────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    // ── Accessors ─────────────────────────────────────────────

    /** Returns the in-app serve URL for the file (requires auth), or null if no file is stored. */
    public function getPublicUrlAttribute(): ?string
    {
        return $this->file_path ? route('admin.documents.serve', $this->id) : null;
    }

    // ── Relations ─────────────────────────────────────────────

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'ctrd_user');
    }

    public function updater(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'upd_user');
    }
}



