<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'menu_name'=>'required',
            'description'=>'required',
            'content'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required'=>'Please enter name of category',
            'description.required'=>'Please enter description',
            'content.required'=>'Please enter content'
        ];
    }
}