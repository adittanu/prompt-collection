<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    protected $fillable = [
        'title',
        'prompt_text',
        'result_content',
        'content_type',
        'image_url',
        'video_url',
        'tags',
        'category_id',
        'is_featured'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
