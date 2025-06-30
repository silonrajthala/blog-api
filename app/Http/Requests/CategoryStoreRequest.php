<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('category-manage');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories,name|max:255',
        ];
    }
}

