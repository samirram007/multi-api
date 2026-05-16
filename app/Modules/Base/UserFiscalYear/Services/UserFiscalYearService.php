<?php

namespace Modules\Base\UserFiscalYear\Services;

use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearServiceInterface;
use Modules\Base\UserFiscalYear\Models\UserFiscalYear;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\UserFiscalYear\Facades\UserFiscalYearRepoFacade;

class UserFiscalYearService implements UserFiscalYearServiceInterface
{
    protected bool $useCache = true;
    protected $resource = ['user', 'fiscal_year.company'];

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

        return UserFiscalYearRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?UserFiscalYear
    {
        return $this->query()->find($id);
    }

    public function store(array $data): UserFiscalYear
    {
        return UserFiscalYearRepoFacade::create($data);
    }

    public function update(array $data, int $id): UserFiscalYear
    {
        return UserFiscalYearRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return UserFiscalYearRepoFacade::delete($id);
    }

    public function saveReportingPeriod(array $data): UserFiscalYear
    {
        $userId = auth()->id();
        $record = UserFiscalYearRepoFacade::query()->where('user_id', $userId)->first();

        if (!$record) {
            throw new \Exception('Reporting period cannot be set. UserFiscalYear not found for the user.');
        }

        $record->update($data);
        return $record->fresh();
    }

    public function getByUserId(int $userId): ?UserFiscalYear
    {
        return $this->query()->where(['user_id' => $userId])->first();
    }
}
