<?php

namespace Modules\App\TenantUser\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantAuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->is('*/register')) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:tenant_users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }

        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}
