<?php

namespace Modules\Base\State\Services;

use Modules\Base\State\Contracts\StateServiceInterface;
use Modules\Base\State\Facades\StateRepoFacade;
use Modules\Base\State\Models\State;
use Illuminate\Database\Eloquent\Collection;

class StateService implements StateServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['country'];

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

        return StateRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?State
    {
        return $this->query()->find($id);
    }

    public function store(array $data): State
    {
        return StateRepoFacade::create($data);
    }

    public function update(array $data, int $id): State
    {
        return StateRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return StateRepoFacade::delete($id);
    }
}
