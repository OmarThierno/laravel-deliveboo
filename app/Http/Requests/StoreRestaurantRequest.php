<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'business_name' => ['required', 'max:255', 'min:4'],
            'address' => ['required'],
            'image' => ['nullable'],
            'vat_number' => ['required', 'min:11', 'max:11'],
            'typology_id' => ['required', 'exists:typologies,id'],
        ];
    }

    public function messages()
    {
        return [
            'business_name.required' => 'Il nome del ristorante è obblicatoria',
            'business_name.max' => 'Il nome del ristotanre non deve supperare i 255 carratteri',
            'business_name.min' => 'Il nome del ristotanre deve essere minimo di 4 carratteri',
            'address.required' => 'Indirizzo mancante',
            'vat_number.required' => 'La partita IVA è mancante',
            'vat_number.max' => 'La partita IVA non deve supperare 11 carratteri',
            'typology_id.required' => 'Tipologia mancante: Inserire la tipologia',
            'typology_id.exists' => 'La tipologia inserita non è presente/esiste',
        ];
    }
}
