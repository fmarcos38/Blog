<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //acá voy a preguntar SI el id del user autentificado es igual al del user logueado
        if($this->user_id == 1){//EN ves de 1 va -----> auth()->user()->id
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        //estas reglas de validación SON para status == 1
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
        ];

        //estas reglas de validación SON para status == 2
        //se concatenan las anteriores + las del IF
        if($this->status == 2){
            //array_merge() --> metodo de php --> fuciona 2 arrays
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }
        return $rules;
    }
}
