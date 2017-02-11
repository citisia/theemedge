<?php

namespace App\Http\Requests\User;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'bail|required|regex:/^[\pL\s]+$/u|max:40',
            'username' => 'bail|required|unique:users',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:8|max:16',
            'contactNo' =>  'bail|required|regex:/[7-9]{1}[0-9]{9}/|unique:users',
            'dateOfBirth' => 'bail|required|date,before:'.Carbon::now()->subYear(22),
            'departmentId' => 'bail|required|integer|exists:departments,id',
        ];
    }
}
