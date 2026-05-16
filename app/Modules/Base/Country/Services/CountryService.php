<?php

namespace Modules\Base\Country\Services;

use Modules\Base\Country\Contracts\CountryServiceInterface;
use Modules\Base\Country\Facades\CountryRepoFacade;
use Modules\Base\Country\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryService implements CountryServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['states'];

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
        return CountryRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?Country
    {
        return $this->query()->find($id);
    }

    public function store(array $data): Country
    {
        return CountryRepoFacade::create($data);
    }

    public function update(array $data, int $id): Country
    {
        return CountryRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return CountryRepoFacade::delete($id);
    }
}
