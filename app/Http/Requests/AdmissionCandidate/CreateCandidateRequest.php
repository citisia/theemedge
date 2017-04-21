<?php

namespace App\Http\Requests\AdmissionCandidate;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
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
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'fatherName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'appliedForYear' => 'required|numeric|in:1,2',
            'sscPercentage' => 'required|numeric|between:35, 99.99',
            'residentialArea' => 'max:255|required',
            'hscPercentage' => 'sometimes|required_if:appliedForYear,1|numeric|between:30, 99.99',
            'cetPhysics' => 'sometimes|required_if:appliedForYear,1|integer|between:0, 50',
            'cetChemistry' => 'sometimes|required_if:appliedForYear,1|integer|between:0, 50',
            'cetMaths' => 'sometimes|required_if:appliedForYear,1|integer|between:0, 100',
            'diplomaPercentage' => 'sometimes|required_if:appliedForYear,2|numeric|between:50, 99.99'
        ];
    }
}
