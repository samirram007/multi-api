<?php

namespace Modules\App\Agent\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\App\Agent\Models\Agent;

interface AgentServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Agent;
    public function store(array $data): Agent;
    public function update(array $data, int $id): Agent;
    public function delete(int $id): bool;
}
