<?php

namespace App\Http\Requests\Source;

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
            'code' => ['required', 'string', 'min:3', 'max:30', 'regex:/^[a-z]+$/i'],
            'url' => ['required', 'string', 'min:10', 'max:255'],
        ];
    }
}
