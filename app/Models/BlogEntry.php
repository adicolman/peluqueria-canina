<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Modelo que representa una entrada del blog. */
class BlogEntry extends Model
{
    /** Primary key personalizada (no usa "id"). */
    protected $primaryKey = 'blog_entry_id';

    /** Campos aceptados en mass assignment. */
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category',
        'image',
        'published_at',
        'is_published',
    ];
}
