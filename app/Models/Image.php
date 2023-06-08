<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'hash_name',
        'post_id',
        ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
