<?php

namespace App\Modules\Base\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\User\Models\User;

interface UserServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): User;
    public function store(array $data): User;

    public function findOrCreateSocialUser($socialUser, string $provider): User;
    public function update(array $data, int $id): User;
    public function delete(int $id): bool;
}
