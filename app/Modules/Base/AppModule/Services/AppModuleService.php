<?php

namespace Modules\Base\AppModule\Services;

use Modules\Base\AppModule\Contracts\AppModuleServiceInterface;
use Modules\Base\AppModule\Models\AppModule;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\AppModule\Facades\AppModuleRepoFacade;

class AppModuleService implements AppModuleServiceInterface
{
    protected bool $useCache = true;
    protected array $resource = ['app_module_features'];

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
        return AppModuleRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?AppModule
    {
        return $this->query()->find($id);
    }

    public function store(array $data): AppModule
    {
        return AppModuleRepoFacade::create($data);
    }

    public function update(array $data, int $id): AppModule
    {
        return AppModuleRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return AppModuleRepoFacade::delete($id);
    }
}
