<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'person_in_charge' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
             'title' => 'タイトル',
             'content' => 'コンテンツ',
             'person_in_charge' => '変更権者',
         ];
    }
    
    public function messages()
    {
         return [
            'title.required' => ':attributeは入力必須です。',
//            'title.integer' => ':attributeは数値にしてください。',
            'content.required' => ':attributeは入力必須です。',
            'person_in_charge.required' => ':attributeは入力必須です。',
        ];
    }
}
