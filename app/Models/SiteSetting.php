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
        'home_page_title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_description',
        'page_text',
        'blogs_page_title',
        'blogs_page_meta_keywords',
        'blogs_page_meta_description',
        'blogs_page_og_title',
        'blogs_page_og_description',
        'blogs_per_page',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
