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
            'title' => 'required|max:50',
            'description' => 'max:500',
            'used_apps' => 'max:50',
            'img' => 'image|max:250',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di :max caratteri',
            'description.max' => 'La descrizione non può essere più lunga di :max caratteri',
            'used_apps.max' => 'le app utilizzate non può essere più lunghe di :max caratteri',
            'img.image' => 'Il file deve essere un immagine',
            'img.max' => 'Il file non può essere più lungo di :max caratteri',
            'category_id.required' => 'E necessario selezionare una categoria',
            'category_id.exists' => 'La categoria che hai selezionato non è valida'
        ];
    }
}