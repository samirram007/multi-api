<?php

namespace Modules\Base\User\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\User\Models\User;

interface UserServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): User;
    public function store(array $data): User;

    public function findOrCreateSocialUser($socialUser, string $provider): User;

    public function update(array $data, int $id): User;
    public function delete(int $id): bool;
}
