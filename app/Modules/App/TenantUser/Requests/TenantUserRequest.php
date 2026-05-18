<?php

namespace Modules\App\TenantUser\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\UserTypeEnum;
use App\Enums\ActiveInactive;

class TenantUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('tenant_user');

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(TenantUser::class, 'email')->ignore($id)
            ],
            'user_type' => ['sometimes', Rule::in(UserTypeEnum::getValues())],
            'status' => ['sometimes', Rule::in(ActiveInactive::getValues())],
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        } else {
            $rules['password'] = ['sometimes', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
    }
}
