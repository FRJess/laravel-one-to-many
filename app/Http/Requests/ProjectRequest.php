<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|min:5',
            'client_name' => 'required|max:80',
            'image' => 'nullable|image|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Project name is required',
            'name.min' => 'The minimum lenght for project name is :min characters',
            'client_name.required' => 'Client name is required',
            'client_name.max' => 'The maximum lenght for client name is :max characters',
            'image.image' => 'File type is not correct',
            'image.max' => 'The maximum size for image is :max mb',
        ];
    }
}
