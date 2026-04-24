<?php

namespace App\Modules\School\Student\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100', 'unique:students,username'],
            'code' => ['nullable', 'string', 'max:50', 'unique:students,code'],
            'email' => ['nullable', 'email', 'max:100'],
            'contactNo' => ['nullable', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:6'],
            'status' => ['nullable', 'in:active,inactive,deleted,blocked,suspended'],
            'emergencyContactName' => ['nullable', 'string', 'max:100'],
            'emergencyContactNo' => ['nullable', 'string', 'max:20'],
            'birthMark' => ['nullable', 'string', 'max:100'],
            'medicalConditions' => ['nullable', 'string'],
            'allergies' => ['nullable', 'string'],
            'language' => ['nullable', 'string', 'max:50'],
            'nationality' => ['nullable', 'string', 'max:50'],
            'religion' => ['nullable', 'string', 'max:50'],
            'caste' => ['nullable', 'string', 'max:50'],
            'guardianType' => ['nullable', 'string', 'max:50'],
            'addressId' => ['nullable', 'integer'],
            'campusId' => ['nullable', 'integer'],
            'academicSessionId' => ['nullable', 'integer'],
            'academicClassId' => ['nullable', 'integer'],
            'gender' => ['nullable', 'in:male,female,other'],
            'doj' => ['nullable', 'date'],
            'dob' => ['nullable', 'date'],
            'aadhaarNo' => ['nullable', 'string', 'max:20'],
            'admissionNo' => ['nullable', 'string', 'max:100'],
            'admissionAge' => ['nullable', 'string', 'max:100'],
            'admissionClass' => ['nullable', 'string', 'max:100'],
            'admissionDate' => ['nullable', 'date'],
            'profileDocumentId' => ['nullable', 'integer'],
            'bankName' => ['nullable', 'string', 'max:100'],
            'accountHolderName' => ['nullable', 'string', 'max:100'],
            'bankAccountNumber' => ['nullable', 'string', 'max:20'],
            'bankIfsc' => ['nullable', 'string', 'max:20'],
            'bankBranch' => ['nullable', 'string', 'max:100'],
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $this->route('student');
            $rules['username'] = ['sometimes', 'required', 'string', 'max:100', 'unique:students,username,' . $id];
            $rules['code'] = ['sometimes', 'nullable', 'string', 'max:50', 'unique:students,code,' . $id];
            $rules['password'] = ['sometimes', 'nullable', 'string', 'min:6'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'The name has already been taken.',
            'code.required' => 'The code field is required.',
            'code.string' => 'The code must be a string.',
            'code.max' => 'The code may not be greater than 255 characters.',
            'code.unique' => 'The code has already been taken.',
            'description.required   ' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
        ];
    }
}
