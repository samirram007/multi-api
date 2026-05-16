<?php

namespace Modules\Base\AppModule\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\AppModule\Models\AppModule;

interface AppModuleServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?AppModule;
    public function store(array $data): AppModule;
    public function update(array $data, int $id): AppModule;
    public function delete(int $id): bool;
}
