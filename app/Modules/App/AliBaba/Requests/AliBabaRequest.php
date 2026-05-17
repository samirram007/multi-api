<?php

namespace Modules\App\AliBaba\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AliBabaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:ali_babas,name'],
            'code' => ['sometimes', 'required', 'string', 'max:255', 'unique:ali_babas,code'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
            'status' => ['sometimes', 'required', 'string', 'max:255'],
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $this->route('ali_baba');
            $rules['name'] = ['sometimes', 'required', 'string', 'max:255', 'unique:ali_babas,name,' . $id];
            $rules['code'] = ['sometimes', 'required', 'string', 'max:255', 'unique:ali_babas,code,' . $id];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'The name has already been taken.',
            'code.unique' => 'The code has already been taken.',
        ];
    }
}
