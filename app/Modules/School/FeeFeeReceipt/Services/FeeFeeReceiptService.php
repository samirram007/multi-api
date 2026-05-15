<?php

namespace Modules\School\FeeFeeReceipt\Services;

use Modules\School\FeeFeeReceipt\Contracts\FeeFeeReceiptServiceInterface;
use Modules\School\FeeFeeReceipt\Models\FeeFeeReceipt;
use Illuminate\Database\Eloquent\Collection;

class FeeFeeReceiptService implements FeeFeeReceiptServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeFeeReceipt::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeFeeReceipt
    {
        return FeeFeeReceipt::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeFeeReceipt
    {
        return FeeFeeReceipt::create($data);
    }

    public function update(array $data, int $id): FeeFeeReceipt
    {
        $record = FeeFeeReceipt::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeFeeReceipt::findOrFail($id);
        return $record->delete();
    }
}
