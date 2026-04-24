<?php

namespace App\Modules\Support\TicketEvent\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Support\TicketEvent\Models\TicketEvent;

interface TicketEventServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?TicketEvent;
    public function store(array $data): TicketEvent;
    public function update(array $data, int $id): TicketEvent;
    public function delete(int $id): bool;
}
