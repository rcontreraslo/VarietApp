<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepersoneRequest extends FormRequest
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
       /*
        $rule_varcodi_unique = Rule::unique('varietats', 'varCodi');
        if ($this->method() !== 'POST') {
            $rule_varcodi_unique->ignore($this->varietat->id);
        } 
        */

        return [
           // 'varCodi' => ['required','integer', $rule_varcodi_unique],
            'name' => ['required','string','max:255'],
            'municipi_id' => ['required'],
            
        ];
    }

    public function messages()
    {
        return [
          /*  
            'varCodi.required' => 'El codi de varietat és obligatori.',
            'varCodi.integer' => 'El codi ha de ser un numero.',
          */
            'name.required' => 'El nom és obligatori.',
            'name.string' => 'El nom ha de ser un text.',
            'name.max' => 'El nom no pot ser mes llarg de 255 caracters.',
            'municipi_id.required' => 'Selecciona una espècie.',
            
        ];
    }
}
