<?php

namespace Modules\Base\CompanyType\Services;

use Modules\Base\CompanyType\Contracts\CompanyTypeServiceInterface;
use Modules\Base\CompanyType\Facades\CompanyTypeRepoFacade;
use Modules\Base\CompanyType\Models\CompanyType;
use Illuminate\Database\Eloquent\Collection;

class CompanyTypeService implements CompanyTypeServiceInterface
{
    protected bool $useCache = true;
    protected $resource = [];

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
        return CompanyTypeRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): CompanyType
    {
        return $this->query()->find($id);
    }

    public function store(array $data): CompanyType
    {
        return CompanyTypeRepoFacade::create($data);
    }

    public function update(array $data, int $id): CompanyType
    {
        return CompanyTypeRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return CompanyTypeRepoFacade::delete($id);
    }
}
