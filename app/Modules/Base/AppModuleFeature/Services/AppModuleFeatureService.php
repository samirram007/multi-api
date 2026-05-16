<?php

namespace Modules\Base\AppModuleFeature\Services;

use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureServiceInterface;
use Modules\Base\AppModuleFeature\Models\AppModuleFeature;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\AppModuleFeature\Facades\AppModuleFeatureRepoFacade;

class AppModuleFeatureService implements AppModuleFeatureServiceInterface
{
    protected bool $useCache = true;
    protected array $resource = ['app_module'];

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
        return AppModuleFeatureRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?AppModuleFeature
    {
        return $this->query()->find($id);
    }

    public function store(array $data): AppModuleFeature
    {
        return AppModuleFeatureRepoFacade::create($data);
    }

    public function update(array $data, int $id): AppModuleFeature
    {
        return AppModuleFeatureRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return AppModuleFeatureRepoFacade::delete($id);
    }

    public function getByModuleId(int $module_id): Collection
    {
        return $this->query()->where(['app_module_id' => $module_id]);
    }

    public function getByRoleAndModule(int $role_id, int $module_id): Collection
    {
        return $this->query()->where(['role_id' => $role_id, 'app_module_id' => $module_id]);
    }
}
