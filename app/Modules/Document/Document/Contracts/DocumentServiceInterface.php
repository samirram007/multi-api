<?php

namespace App\Modules\Document\Document\Contracts;


use App\Modules\Document\Document\Models\Document;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;


interface DocumentServiceInterface
{
    /*
    |--------------------------------------------------------------------------
    | Basic CRUD
    |--------------------------------------------------------------------------
    */

    public function getAll(): Collection;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function find(int $id): ?Document;

    public function store(array $data): SupportCollection;

    public function update(int $id, array $data): Document;

    public function delete(int $id): bool;

    public function bulkDelete(array $ids): int;

    /*
    |--------------------------------------------------------------------------
    | Tree / Navigation
    |--------------------------------------------------------------------------
    */

    public function getRoot(): Collection;

    public function getChildren(int $parentId): Collection;

    public function getTree(int $rootId = null): Collection;

    public function getPath(int $id): Collection; // breadcrumb chain

    /*
    |--------------------------------------------------------------------------
    | File / Folder Operations
    |--------------------------------------------------------------------------
    */

    public function createFolder(array $data): Document;

    public function uploadFile(array $data): Document;

    public function move(int $id, ?int $newParentId): bool;

    public function copy(int $id, ?int $targetParentId): Document;

    public function rename(int $id, string $name): bool;

    /*
    |--------------------------------------------------------------------------
    | Query / Filtering
    |--------------------------------------------------------------------------
    */

    public function search(string $query): Collection;

    public function filter(array $filters): Collection;

    public function getByType(string $type): Collection; // file | folder

    public function getByUser(int $userId): Collection;

    /*
    |--------------------------------------------------------------------------
    | Metadata & Attributes
    |--------------------------------------------------------------------------
    */

    public function updateMeta(int $id, array $meta): bool;

    public function updateTags(int $id, array $tags): bool;

    /*
    |--------------------------------------------------------------------------
    | Permissions (basic placeholder)
    |--------------------------------------------------------------------------
    */

    public function canView(int $id, int $userId): bool;

    public function canEdit(int $id, int $userId): bool;

    public function canDelete(int $id, int $userId): bool;
}
