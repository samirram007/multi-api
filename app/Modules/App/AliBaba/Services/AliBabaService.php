<?php

namespace Modules\App\AliBaba\Services;

use Modules\App\AliBaba\Contracts\AliBabaServiceInterface;
use Modules\App\AliBaba\Facades\AliBabaRepoFacade;
use Modules\App\AliBaba\Models\AliBaba;
use Illuminate\Database\Eloquent\Collection;

class AliBabaService implements AliBabaServiceInterface
{
    public function getAll(): Collection
    {
        return AliBabaRepoFacade::all();
    }

    public function getById(int $id): ?AliBaba
    {
        return AliBabaRepoFacade::find($id);
    }

    public function store(array $data): AliBaba
    {
        return AliBabaRepoFacade::create($data);
    }

    public function update(array $data, int $id): AliBaba
    {
        return AliBabaRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return AliBabaRepoFacade::delete($id);
    }
}
