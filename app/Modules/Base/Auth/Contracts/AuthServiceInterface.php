<?php

namespace App\Modules\Base\Auth\Contracts;

use App\Modules\Base\User\Models\User;


interface AuthServiceInterface
{
    public function login(array $data): string|array;
    public function loginWithUser(User $user): string;

    public function logout(): void;

    public function register(array $data): string|array;

    public function refresh(): string;

    public function profile(): User; // or array
    public function changePassword(array $data): void;
}
