<?php

namespace Modules\Base\UserRole\Services;

use Modules\Base\UserRole\Contracts\UserRoleServiceInterface;
use Modules\Base\UserRole\Models\UserRole;
use Illuminate\Database\Eloquent\Collection;
use Log;
use Modules\Base\UserRole\Facades\UserRoleRepoFacade;

class UserRoleService implements UserRoleServiceInterface
{
    protected bool $useCache = true;
    protected $resource = [];

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

        return UserRoleRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?UserRole
    {
        return $this->query()->find($id);
    }

    public function store(array $data): UserRole|bool|null
    {
        $exists = UserRoleRepoFacade::query()->where('user_id', $data['user_id'])
            ->where('role_id', $data['role_id'])->first();
        if ($exists) {
            $exists->delete();
            Log::info('UserRole unassigned:', ['data' => $exists->fresh()]);

            return $exists->fresh();

        }
        return UserRoleRepoFacade::create($data);
    }

    public function update(array $data, int $id): UserRole
    {
        return UserRoleRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return UserRoleRepoFacade::delete($id);
    }
}
