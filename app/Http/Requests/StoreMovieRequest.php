<?php

namespace App\Http\Requests;

use App\Models\MovieCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'movie_category_id' => [
                'required',
                Rule::exists(MovieCategory::class, 'id'),
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
            'director' => [
                'required',
                'string',
                'max:255',
            ],
            'rating' => [
                'required',
                'numeric',
                'gt:0',
                'lte:5',
            ],
            'published_at' => [
                'required',
                'date',
            ],
            'image' => [
                'nullable',
                'image',
            ],
        ];
    }
}
