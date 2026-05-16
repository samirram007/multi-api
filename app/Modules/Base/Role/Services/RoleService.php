<?php

namespace Modules\Base\Role\Services;

use Modules\Base\Role\Contracts\RoleServiceInterface;
use Modules\Base\Role\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Role\Facades\RoleRepoFacade;

class RoleService implements RoleServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['permissions.feature.module'];

    public function withoutCache(): static
    {
        $this->useCache = false;
        return $this;
    }

    public function cache(bool $enabled = true): static
    {
        $this->useCache = $enabled;
        return $this;
    }

    protected function query()
    {
        $cache = $this->useCache;
        $this->useCache = true;
        return RoleRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?Role
    {
        return $this->query()->find($id);
    }

    public function store(array $data): Role
    {
        return RoleRepoFacade::create($data);
    }

    public function update(array $data, int $id): Role
    {
        return RoleRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return RoleRepoFacade::delete($id);
    }
}
