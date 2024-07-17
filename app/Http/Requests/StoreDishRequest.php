<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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

    // public function messages()
    // {
    //     return [
    //         // Nome
    //         'name.required' => 'Il nome del piatto è obbligatorio',
    //         'name.max' => 'Il nome del piatto non deve supperare 60 carratteri',
    //         'name.min' => 'Il nome del piatto deve avere minimo 4 carratteri',
    //         // Descrizione
    //         'description.required' => 'Descrizione mancante',
    //         'description.max' => 'La descrizione del piatto non deve supperare 5000 caratteri',
    //         'description.min' => 'La descrizione del piatto deve avere minimo 10 caratteri',
    //         // Prezzo
    //         'price.required' => 'Il prezzo del piatto è mancante',
    //     ];
    // }
}
