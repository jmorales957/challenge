<?php

namespace App\Http\Request\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => 'required|string',
            'email'     => 'required|email',
            'position'  => 'required|string',
            'dateBirth' => 'required|date_format:d/m/Y',
            'address'   => 'required|string',
            'skills'    => [
                'required',
                'array',
            ],
            'skills.*.skills'   => 'required|string',
            'skills.*.quantity' => 'required|integer|min:1|max:5',
        ];
    }
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
