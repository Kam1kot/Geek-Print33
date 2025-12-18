<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'integer|exists:tags,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072|',
        ];
    }
}
