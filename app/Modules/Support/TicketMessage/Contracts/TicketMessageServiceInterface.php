<?php

namespace Modules\Support\TicketMessage\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Support\TicketMessage\Models\TicketMessage;

interface TicketMessageServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?TicketMessage;
    public function store(array $data): TicketMessage;
    public function update(array $data, int $id): TicketMessage;
    public function delete(int $id): bool;
}
