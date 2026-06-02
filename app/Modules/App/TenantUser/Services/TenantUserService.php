<?php

namespace Modules\App\TenantUser\Services;

use Illuminate\Support\Facades\Log;
use Modules\App\TenantUser\Contracts\TenantUserServiceInterface;
use Modules\App\TenantUser\Facades\TenantUserRepoFacade;
use Modules\App\TenantUser\Models\TenantUser;
use Illuminate\Database\Eloquent\Collection;

class TenantUserService implements TenantUserServiceInterface
{
    protected array $resource = [];

    public function getAll(): Collection
    {
        return TenantUserRepoFacade::with($this->resource)->get();
    }

    public function getById(int $id): ?TenantUser
    {
        // Log::info("Fetching tenant user with ID: $id");
        return TenantUserRepoFacade::with($this->resource)->find($id);
    }

    public function store(array $data): TenantUser
    {
        return TenantUserRepoFacade::create($data);
    }

    public function update(array $data, int $id): TenantUser
    {
        return TenantUserRepoFacade::with($this->resource)->find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return TenantUserRepoFacade::delete($id);
    }
}
