<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
       
        $rule_varcodi_unique = Rule::unique('varietats', 'varCodi');
        if ($this->method() !== 'POST') {
            $rule_varcodi_unique->ignore($this->varietat->id);
        } 
        

        return [
            'varCodi' => ['required','string', $rule_varcodi_unique],
            'name' => ['required','string','max:255'],
            'especie_id' => ['required'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'varOriAny'=>'integer|min:' . (date("Y") - 100) . '|max:' . (date("Y")+1) . '',
            'persone_id' => ['required'],

           
        ];
    }

    public function messages()
    {
        return [
           
            'varCodi.required' => 'El codi de varietat és obligatori.',
            'varCodi.unique' => 'Aquest codi de varietat ja existeix.',
            'varOriAny.integer' => 'Any d\'entrada no és numero.',
            'varOriAny.min' => 'Any d\'entrada no és vàlid.',
            'varOriAny.max' => 'Any d\'entrada no és vàlid.',
            'name.required' => 'El nom és obligatori.',
            'name.string' => 'El nom ha de ser un text.',
            'name.max' => 'El nom no pot ser mes llarg de 255 caracters.',
            'especie_id.required' => 'Selecciona una espècie.',
            'persone_id.required' => 'Selecciona un informant.',
            'image.mimes' => 'El codi de barres no és un format acceptat.',
            'image.max' => 'El codi de barres no pot pesar més de 2MB.',
        ];
    }
}
