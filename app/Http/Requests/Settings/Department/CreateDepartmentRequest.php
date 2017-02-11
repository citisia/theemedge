<?php

namespace App\Http\Requests\Settings\Department;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'present',
            'displayFormat' => 'bail|present|integer|in:0,1',
            'founded' => 'bail|required|date|before:today',
            'level'=>'bail|required|integer|in:1,2',
            'name' => 'bail|required|string',
        ];
    }
}
