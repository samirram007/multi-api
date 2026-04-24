<?php

namespace App\Modules\Maintenance\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'tables' => 'array',
            'tables.*' => 'string',
            'structure' => 'boolean',
            'data' => 'boolean',
            'format' => 'string',
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {


        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'tables.array' => 'The tables field must be an array.',
            'tables.*.string' => 'Each table name must be a string.',
            'structure.boolean' => 'The structure field must be a boolean.',
            'data.boolean' => 'The data field must be a boolean.',
            'format.string' => 'The format field must be a string.',
        ];
    }
}
