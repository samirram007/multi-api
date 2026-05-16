<?php

namespace Modules\Base\FiscalYear\Services;

use Modules\Base\FiscalYear\Contracts\FiscalYearServiceInterface;
use Modules\Base\FiscalYear\Models\FiscalYear;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\FiscalYear\Facades\FiscalYearRepoFacade;

class FiscalYearService implements FiscalYearServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['company'];

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
        return FiscalYearRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?FiscalYear
    {
        return $this->query()->find($id);
    }

    public function store(array $data): FiscalYear
    {
        return FiscalYearRepoFacade::create($data);
    }

    public function update(array $data, int $id): FiscalYear
    {
        return FiscalYearRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return FiscalYearRepoFacade::delete($id);
    }
}
