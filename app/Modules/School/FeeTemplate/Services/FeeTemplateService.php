<?php

namespace App\Modules\School\FeeTemplate\Services;

use App\Modules\School\FeeTemplate\Contracts\FeeTemplateServiceInterface;
use App\Modules\School\FeeTemplate\Models\FeeTemplate;
use Illuminate\Database\Eloquent\Collection;

class FeeTemplateService implements FeeTemplateServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return FeeTemplate::with($this->resource)->get();
    }

    public function getById(int $id): ?FeeTemplate
    {
        return FeeTemplate::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): FeeTemplate
    {
        return FeeTemplate::create($data);
    }

    public function update(array $data, int $id): FeeTemplate
    {
        $record = FeeTemplate::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = FeeTemplate::findOrFail($id);
        return $record->delete();
    }
}
