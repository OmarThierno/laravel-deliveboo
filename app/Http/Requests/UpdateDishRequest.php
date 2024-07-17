<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => ['required', 'max:60', 'min:4'],
            'description' => ['required', 'max:5000', 'min:10'],
            'allergens' => ['nullable'],
            'thumb' => ['nullable'],
            'price' => ['required', 'numeric', 'gt:0'],
        ];
    }
}
