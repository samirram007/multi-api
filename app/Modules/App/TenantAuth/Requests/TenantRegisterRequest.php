<?php

namespace Modules\App\TenantAuth\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\App\TenantUser\Models\TenantUser;

class TenantRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(TenantUser::class, 'email')
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
