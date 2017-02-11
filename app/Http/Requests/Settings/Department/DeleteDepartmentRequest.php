<?php

namespace App\Http\Requests\Settings\Department;

use Illuminate\Foundation\Http\FormRequest;

class DeleteDepartmentRequest extends FormRequest
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
            'id' => 'required|exists:departments',
            '_department' => 'required',
        ];
    }
}
