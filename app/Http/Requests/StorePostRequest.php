<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            
                    'title'=>'required|min:3|unique:posts',
                    'description' =>'required|min:10'
                
        ];
    }


    public function messages()
    {
        return [
                'title.min' => 'The title should be more than 3 characters !',
                'description.min' => 'The description should be more than 10 characters !'
            ];
    }
}


