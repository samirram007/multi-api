<?php

namespace App\Modules\Base\State\Services;

use App\Modules\Base\State\Contracts\StateServiceInterface;
use App\Modules\Base\State\Facades\StateRepoFacade;
use App\Modules\Base\State\Models\State;
use Illuminate\Database\Eloquent\Collection;

class StateService implements StateServiceInterface
{
    protected $resource = ['country'];

    public function getAll(): Collection
    {
        return StateRepoFacade::all($this->resource);
    }

    public function getById(int $id): ?State
    {
        return StateRepoFacade::find($id, $this->resource);
    }

    public function store(array $data): State
    {
        return StateRepoFacade::create($data);
    }

    public function update(array $data, int $id): State
    {
        $record = StateRepoFacade::find($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = StateRepoFacade::find($id);
        return $record->delete();
    }
}
