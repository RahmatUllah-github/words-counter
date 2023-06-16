<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'blogs_per_page',
        'page_text'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
