<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use HasUlid;

    protected $fillable = [
        'title',
        'description',
        'country_id',
        'stocks',
        'amount',
        'photo',
    ];
}
