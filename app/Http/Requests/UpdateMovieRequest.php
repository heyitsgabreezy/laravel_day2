<?php

namespace App\Http\Requests;

use App\Models\MovieCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
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
                'string',
                'required',
                'max:255',
            ],
            'description' => [
                'string',
                'required',
            ],
            'director' => [
                'string',
                'required',
                'max:255',
            ],
            'rating' => [
                'numeric',
                'required',
                'gt:0',
                'lte:5',
            ],
            'published_at' => [
                'date',
                'required',
            ],
            'image' => [
                'nullable',
                'image',
            ],
        ];
    }
}
