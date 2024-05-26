<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'=>'required | min:3',
            'subtitle'=>'required',
            'body'=>'required',
            'category_id'=>'required | numeric',
            'tags'=>'required'
            
        ];
    }

    public function messages(){
        return [
            'title.required'=>'Il titolo è obbligatorio.',
            'subtitle.required'=>'Il sottotitolo è obbligatorio.',
            'body.required'=>"Il corpo dell'articolo è obbligatorio.",
            'category_id.required'=>'La categoria è obbligatoria.',
            'category_id.numeric'=>'La categoria è obbligatoria.',
            'tags.required'=>'Inserisci almeno un tag'
            
        ];
    }
}

