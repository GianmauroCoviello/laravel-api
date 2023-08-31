<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|max:50',
            'cover_image'=>'image|max:10000',
            'cover_image' => 'required',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'required',


        ];


    }


    // nuova funzione chiave valore per mettere il messaggio di errore in italiano
    public function messages()
    {
        return [

            'title.required'=>'il titolo e obbligatorio',
            'title.max'=>'ERRORE: il titolo supera il limite di caratteri consentito (50)',
            'cover_image.image'=>'ERRORE: assicurati che il file caricato sia in formato png, jpeg, jpg',
            'type_id.required'=>'Devi selezionare una tipologia',
            'type_id.exist'=>'tipologia selezionata non valida',
            'technology_id.exists' => 'inserisci una tecnologia',
            'technologies.required' => 'inserisci una tecnologia all interno del campo input'



        ];


    }

    
}
