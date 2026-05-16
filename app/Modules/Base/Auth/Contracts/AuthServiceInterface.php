<?php

namespace Modules\Base\Auth\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Modules\Base\User\Models\User;


interface AuthServiceInterface extends BaseServiceInterface
{
    public function login(array $data): string|array;
    public function loginWithUser(User $user): string;

    public function logout(): void;

    public function register(array $data): string|array;

    public function refresh(): string;

    public function profile(): User; // or array
    public function changePassword(array $data): void;

}
