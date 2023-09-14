<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'categories' => 'nullable|array|exists:categories,id',

        ];
        if (request()->method('put')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048';
        }
        return $rules;
    }
    // public function messages()
    // {
    // $messages=[
    //     'title.required'=>'العنوان مطلوب',
    // ];
    // return $messages;
    // }
}
