<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:30'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'author' => ['required', 'string'],
            'image' => ['sometimes', 'image', 'mimes:png,jpeg,jpg'],
            'description' => ['nullable', 'string', 'min:10', 'max:200']
        ];
    }
}
