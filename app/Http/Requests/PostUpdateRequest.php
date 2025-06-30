<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // We'll handle author check in controller
    }

    public function rules(): array
    {
        return [
            'title'       => 'sometimes|string|max:255',
            'body'        => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}

