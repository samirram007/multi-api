<?php

namespace Modules\Base\State\Contracts;

use App\Support\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\State\Models\State;

interface StateServiceInterface extends BaseServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?State;
    public function store(array $data): State;
    public function update(array $data, int $id): State;
    public function delete(int $id): bool;
}
