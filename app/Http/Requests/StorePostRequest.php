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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        //creo variable para recuperar el post q modificaré
        $post = $this->route()->parameter('post');

        //estas reglas de validación SON para status == 1
        //estas reglas son para la creacion
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];

        //esta regla de validación es para el slug de editar post
        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

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
