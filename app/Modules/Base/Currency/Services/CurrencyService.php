<?php

namespace Modules\Base\Currency\Services;

use Modules\Base\Currency\Contracts\CurrencyServiceInterface;
use Modules\Base\Currency\Facades\CurrencyRepoFacade;
use Modules\Base\Currency\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyService implements CurrencyServiceInterface
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
        return CurrencyRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): Currency
    {
        return $this->query()->find($id);
    }

    public function store(array $data): Currency
    {
        return CurrencyRepoFacade::create($data);
    }

    public function update(array $data, int $id): Currency
    {
        return CurrencyRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return CurrencyRepoFacade::delete($id);
    }
}
