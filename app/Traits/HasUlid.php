<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUlid
{
    public static function bootHasUlid(): void
    {
        static::creating(function ($model) {
            $model->ulid = Str::of(Str::ulid())->lower()->toString();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'ulid';
    }
}
