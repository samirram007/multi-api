<?php

namespace Modules\School\FeeReceipt\Services;

use Modules\School\FeeReceipt\Contracts\FeeReceiptServiceInterface;
use Modules\School\FeeReceipt\Models\FeeReceipt;
use Illuminate\Database\Eloquent\Collection;

class FeeReceiptService implements FeeReceiptServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeReceipt::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeReceipt
    {
        return FeeReceipt::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeReceipt
    {
        return FeeReceipt::create($data);
    }

    public function update(array $data, int $id): FeeReceipt
    {
        $record = FeeReceipt::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeReceipt::findOrFail($id);
        return $record->delete();
    }
}
