<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            
            //vat non dovrebbe essere unique?
            //il $this permette a Laravel di controllare l'unicità della vat_number tra tutti i ristoranti, eccetto il ristorante corrente che stiamo aggiornando o potrebbe darcelo come errore
            'vat_number' => ['required', 'min:11', 'max:11'] . $this->restaurant->id,
            'typology_id' => ['required', 'exists:typologies,id']
        ];
    }


    // public function messages()
    // {
    //     return [
    //         'business_name.required' => 'Il nome del ristorante è obbligatorio',
    //         'business_name.max' => 'Il nome del ristorante non deve superare i 255 caratteri',
    //         'business_name.min' => 'Il nome del ristorante deve essere di almeno 4 caratteri',
    //         'address.required' => 'Indirizzo mancante',
    //         'address.max' => 'L\'indirizzo non deve superare i 255 caratteri',
    //         'vat_number.required' => 'La partita IVA è mancante',
    //         'vat_number.digits' => 'La partita IVA deve avere esattamente 11 cifre',
    //         'vat_number.unique' => 'La partita IVA è già in uso',
    //         'typology_id.required' => 'Tipologia mancante: Inserire la tipologia',
    //         'typology_id.exists' => 'La tipologia inserita non esiste',
    //     ];
    // }
}
