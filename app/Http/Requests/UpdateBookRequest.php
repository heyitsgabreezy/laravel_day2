<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
            'country_id' => [
                'required',
                'numeric',
                'gt:0',
            ],
            'stocks' => [
                'required',
                'numeric',
                'gte:0',
            ],
            'amount' => [
                'required',
                'numeric',
                'gt:0',
            ],
            'photo' => [
                'required',
                'string',
            ],
        ];
    }
}
