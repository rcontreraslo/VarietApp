<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VarietatRequest extends FormRequest
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
            'especie_id' => ['required'],
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
           
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
            'especie_id.required' => 'Selecciona una espècie.',
            //'image.image' => 'El codi de barres no és una pppp.',
            'image.mimes' => 'El codi de barres és un format acceptat.',
            'image.max' => 'El codi de barres no pot pesar més de 2MB.',
        ];
    }
}
