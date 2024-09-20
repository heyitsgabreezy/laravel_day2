<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MovieCategory extends Model
{
    use HasFactory;
    use HasUlid;

    protected $fillable = [
        'name',
        'description',
    ];

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class, 'id');
    }
}
