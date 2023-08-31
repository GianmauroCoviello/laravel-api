<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
             'title'=>'required|max:50'
 
         ];
 
 
     }
 
 
     // nuova funzione chiave valore per mettere il messaggio di errore in italiano
     public function messages()
     {
         return [
 
             'title.required'=>'il titolo e obbligatorio',
             'title.max'=>'ERRORE: il titolo supera il limite di caratteri consentito (50)'
 
         ];
 
 
     }
      
}
