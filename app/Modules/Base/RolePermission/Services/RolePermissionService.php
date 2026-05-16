<?php

namespace Modules\Base\RolePermission\Services;

use Modules\Base\RolePermission\Contracts\RolePermissionServiceInterface;
use Modules\Base\RolePermission\Models\RolePermission;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\RolePermission\Facades\RolePermissionRepoFacade;

class RolePermissionService implements RolePermissionServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['role', 'feature.module'];

    /**
     * Set the service to bypass cache for the next operation.
     */
    public function withoutCache(): static
    {
        $this->useCache = false;
        return $this;
    }

    /**
     * Set the service to use cache for the next operation.
     */
    public function cache(bool $enabled = true): static
    {
        $this->useCache = $enabled;
        return $this;
    }

    /**
     * Get a prepared repository instance with cache and relations.
     */
    protected function query()
    {
        $cache = $this->useCache;
        $this->useCache = true; // Reset service state for next call

        return RolePermissionRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?RolePermission
    {
        return $this->query()->find($id);
    }

    public function store(array $data): RolePermission
    {
        return RolePermissionRepoFacade::create($data);
    }

    public function update(array $data, int $id): RolePermission
    {
        return RolePermissionRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return RolePermissionRepoFacade::delete($id);
    }
}
