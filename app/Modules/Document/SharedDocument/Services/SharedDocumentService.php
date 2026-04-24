<?php

namespace App\Modules\Document\SharedDocument\Services;

use App\Modules\Document\SharedDocument\Contracts\SharedDocumentServiceInterface;
use App\Modules\Document\SharedDocument\Models\SharedDocument;
use Illuminate\Database\Eloquent\Collection;

class SharedDocumentService implements SharedDocumentServiceInterface
{
    protected $resource = [];

    public function getAll(): Collection
    {
        return SharedDocument::with($this->resource)->get();
    }

    public function getById(int $id): ?SharedDocument
    {
        return SharedDocument::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): SharedDocument
    {
        return SharedDocument::create($data);
    }

    public function update(array $data, int $id): SharedDocument
    {
        $record = SharedDocument::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = SharedDocument::findOrFail($id);
        return $record->delete();
    }
}
