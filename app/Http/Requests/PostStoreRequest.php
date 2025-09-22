<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'   => 'required|max:20',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'Please enter post title first.',
            'title.max'   => 'Post title length not greater then 20 characters.',
            'content.required' => 'Post content field is required.',
        ];
    }

}
