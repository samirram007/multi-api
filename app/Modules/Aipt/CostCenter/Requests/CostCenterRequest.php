<?php

namespace Modules\Aipt\CostCenter\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostCenterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:cost_centers,name'],
            'code' => ['nullable', 'string', 'max:255', 'unique:cost_centers,code'],
            'description' => ['nullable', 'string'],
            'cost_category_id' => ['nullable', 'exists:cost_categories,id'],
            'is_system' => ['sometimes', 'boolean'],
            'is_hidden' => ['sometimes', 'boolean'],
            'status' => ['sometimes', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $this->route('cost_center');
            $rules['name'] = ['sometimes', 'required', 'string', 'max:255', 'unique:cost_centers,name,' . $id];
            $rules['code'] = ['sometimes', 'nullable', 'string', 'max:255', 'unique:cost_centers,code,' . $id];
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
            'code.string' => 'The code must be a string.',
            'code.max' => 'The code may not be greater than 255 characters.',
            'code.unique' => 'The code has already been taken.',
            'description.string' => 'The description must be a string.',
            'cost_category_id.exists' => 'The selected cost category is invalid.',
            'status.string' => 'The status must be a string.',
        ];
    }
}
