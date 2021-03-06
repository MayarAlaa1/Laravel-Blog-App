<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => [
                'required',
                Rule::unique('posts', 'title')->ignore($this->post),
                'min:3'
            ],
            
                    'description' =>'required|min:10',
                    'user_id'=>'exists:posts'
                
        ];
    }


    public function messages()
    {
        return [
                'title.min' => 'The title should be more than 3 characters !',
                'description.min' => 'The description should be more than 10 characters !',
                'user_id.exists' => 'Invalid User!',
            ];
    }
}


