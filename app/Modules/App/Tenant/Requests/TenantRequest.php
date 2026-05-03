<?php

namespace Modules\App\Tenant\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    //  'id' => $this->id,
    //         'name' => $this->name,
    //         'AppModule' => $this->app_module,
    //         'code' => $this->code,
    //         'description' => $this->description,
    //         'status' => $this->status,
    //         'dbHost' => $this->db_host,
    //         'dbPort' => $this->db_port,
    //         'dbName' => $this->db_name,
    //         'dbUsername' => $this->db_username,
    //         'dbPassword' => $this->db_password,

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:tenants,name'],
            'code' => ['required', 'string', 'max:50', 'unique:tenants,code'],
            'app_module' => ['sometimes', 'required', 'string'],
            'description' => ['sometimes', 'nullable', 'string', 'max:255'],
            'db_host' => ['sometimes', 'nullable', 'string', 'max:255'],
            'db_port' => ['sometimes', 'nullable', 'string', 'max:255'],
            'db_username' => ['sometimes', 'nullable', 'string', 'max:255'],
            'db_password' => ['sometimes', 'nullable', 'string'],
        ];

        // For update requests, make validation more flexible
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $this->route('tenant');
            $rules['name'] = ['sometimes', 'required', 'string', 'max:255', 'unique:tenants,name,' . $id];
            $rules['code'] = ['sometimes', 'required', 'string', 'max:50', 'unique:tenants,code,' . $id];
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
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'admin_name.required' => 'The admin name is required.',
            'admin_email.required' => 'The admin email is required.',
            'admin_email.email' => 'The admin email must be a valid email address.',
            'admin_password.required' => 'The admin password is required.',
            'admin_password.min' => 'The admin password must be at least 8 characters.',
        ];
    }
}
