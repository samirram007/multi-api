<?php

namespace Modules\Aipt\AccountGroup\Services;

use Modules\Aipt\AccountGroup\Contracts\AccountGroupServiceInterface;
use Modules\Aipt\AccountGroup\Models\AccountGroup;
use Modules\Aipt\AccountGroup\Facades\AccountGroupRepoFacade;
use Illuminate\Database\Eloquent\Collection;

class AccountGroupService implements AccountGroupServiceInterface
{
    protected array $resource = ['account_nature'];

    public function getAll(): Collection
    {
        return AccountGroupRepoFacade::with($this->resource)->all();
    }

    public function getById(int $id): ?AccountGroup
    {
        return AccountGroupRepoFacade::with($this->resource)->find($id);
    }

    public function store(array $data): AccountGroup
    {
        return AccountGroupRepoFacade::create($data);
    }

    public function update(array $data, int $id): AccountGroup
    {
        return AccountGroupRepoFacade::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return AccountGroupRepoFacade::delete($id);
    }

    public function getCurrentLiabilityGroups(): Collection
    {
        return AccountGroupRepoFacade::with($this->resource)
            ->query()
            ->where('id', 20002)
            ->orWhere('parent_id', 20002)
            ->orderBy('name')
            ->get();
    }
}
