<?php

namespace App\Modules\School\FeeRule\Services;

use App\Modules\School\FeeRule\Contracts\FeeRuleServiceInterface;
use App\Modules\School\FeeRule\Models\FeeRule;
use Illuminate\Database\Eloquent\Collection;

class FeeRuleService implements FeeRuleServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeRule::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeRule
    {
        return FeeRule::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeRule
    {
        return FeeRule::create($data);
    }

    public function update(array $data, int $id): FeeRule
    {
        $record = FeeRule::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeRule::findOrFail($id);
        return $record->delete();
    }
}
