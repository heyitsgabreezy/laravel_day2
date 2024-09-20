<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;
    use HasUlid;

    protected $fillable = [
        'movie_category_id',
        'title',
        'description',
        'director',
        'rating',
        'published_at',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(MovieCategory::class, 'movie_category_id');
    }
}
