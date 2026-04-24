<?php

namespace App\Modules\Support\SLAPolicyRule\Services;

use App\Modules\Support\SLAPolicyRule\Contracts\SLAPolicyRuleServiceInterface;
use App\Modules\Support\SLAPolicyRule\Models\SLAPolicyRule;
use Illuminate\Database\Eloquent\Collection;

class SLAPolicyRuleService implements SLAPolicyRuleServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return SLAPolicyRule::with($this->resource)->get();
    }

    public function getById(int $id): ?SLAPolicyRule
    {
        return SLAPolicyRule::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): SLAPolicyRule
    {
        return SLAPolicyRule::create($data);
    }

    public function update(array $data, int $id): SLAPolicyRule
    {
        $record = SLAPolicyRule::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = SLAPolicyRule::findOrFail($id);
        return $record->delete();
    }
}
