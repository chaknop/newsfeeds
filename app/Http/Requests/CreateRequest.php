<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title'=>'required|min:5|max:190|unique:post_Models,title',
            'slug'=>'required|unique:post_Models,slug',
            'redirect'=>'url|nullable',
            'body'=>'required|min:10',
            'status'=>'integer'
        ];
    }
}
