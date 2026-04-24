<?php

namespace App\Modules\Document\Document\Services;


use App\Modules\Document\Document\Contracts\DocumentServiceInterface;
use App\Modules\Document\Document\Models\Document;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Response;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DocumentService implements DocumentServiceInterface
{
    /*
    |--------------------------------------------------------------------------
    | Get All (User Scoped)
    |--------------------------------------------------------------------------
    */

    public function getAll(): Collection
    {
        return Document::where('user_id', Auth::id())
            ->with('children')
            ->orderByRaw("document_type = 'folder' DESC, original_name ASC, updated_at DESC")
            ->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Document::where('user_id', Auth::id())
            ->with('children')
            ->orderByRaw("document_type = 'folder' DESC, original_name ASC, updated_at DESC")
            ->paginate($perPage);
    }

    public function find(int $id): ?Document
    {
        return Document::where('user_id', Auth::id())->find($id);
    }

    /*
    |--------------------------------------------------------------------------
    | Store (Multiple File Upload)
    |--------------------------------------------------------------------------
    */

    public function store(array $data): SupportCollection
    {
        $userId = Auth::id();

        if (!$userId) {
            throw new \Exception('Unauthenticated');
        }

        $files = $data['files'] ?? [];
        $parentId = $data['parent_id'] == "" ? null : $data['parent_id'];

        return DB::transaction(function () use ($files, $userId, $parentId) {

            $documents = collect();

            foreach ($files as $file) {

                $mimeType = $file->getMimeType();

                $documentType = $this->resolveDocumentType($mimeType);

                $uuid = (string) Str::uuid();
                $extension = $file->getClientOriginalExtension();

                $name = $uuid . '.' . $extension;

                $path = $file->storeAs(
                    "documents/{$userId}/{$extension}",
                    $name,
                    'public'
                );

                $document = Document::create([
                    'user_id' => $userId,
                    'parent_id' => $parentId,
                    'document_type' => $documentType,
                    'path' => $path,
                    'name' => $name,
                    'original_name' => $file->getClientOriginalName(),
                    'extension' => $extension,
                    'mime_type' => $mimeType,
                    'size' => $file->getSize(),
                ]);

                $documents->push($document);
            }

            return $documents;
        });
    }

    public function update(int $id, array $data): Document
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        $document->update($data);

        return $document;
    }

    /*
    |--------------------------------------------------------------------------
    | Delete (Safe + Recursive)
    |--------------------------------------------------------------------------
    */

    public function delete(int $id): bool
    {
        $document = Document::where('user_id', Auth::id())->find($id);

        if (!$document) {
            return false;
        }

        DB::transaction(function () use ($document) {
            $this->deleteRecursive($document);
        });

        return true;
    }

    public function bulkDelete(array $ids): int
    {
        return DB::transaction(function () use ($ids) {

            $documents = Document::query()
                ->where('user_id', Auth::id())
                ->whereIn('id', $ids)
                ->get();

            foreach ($documents as $document) {
                $this->deleteRecursive($document);
            }

            return $documents->count();
        });
    }

    protected function deleteRecursive(Document $document): void
    {
        // Delete children first (already eager loaded)
        foreach ($document->children as $child) {
            $this->deleteRecursive($child);
        }

        // Delete file (skip folders)
        if ($document->isFile() && $document->path) {
            Storage::disk('public')->delete($document->path);
        }

        $document->delete();
    }

    /*
    |--------------------------------------------------------------------------
    | Get File (Download)
    |--------------------------------------------------------------------------
    */

    public function getFile(int $id): Response
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        $path = 'public/' . $document->path;

        if (!Storage::exists($path)) {
            abort(404, 'File not found');
        }

        return response()->file(storage_path('app/' . $path), [
            'Content-Type' => $document->mime_type,
            'Content-Disposition' => 'attachment; filename="' . $document->original_name . '"',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Tree Navigation
    |--------------------------------------------------------------------------
    */
    public function getRoot(): Collection
    {
        return Document::where('user_id', Auth::id())
            ->whereNull('parent_id')
            ->orderByRaw("document_type = 'folder' DESC, original_name ASC, updated_at DESC")
            ->get();
    }
    public function getChildren(int $parentId): Collection
    {
        return Document::where('user_id', Auth::id())
            ->where('parent_id', $parentId)
            ->orderByRaw("document_type = 'folder' DESC, original_name ASC, updated_at DESC")
            ->get();
    }
    public function getTree(int $rootId = null): Collection
    {
        $query = Document::where('user_id', Auth::id());

        if ($rootId) {
            $query->where('id', $rootId);
        } else {
            $query->whereNull('parent_id');
        }

        return $query->with('children')->get();
    }

    public function getPath(int $id): Collection
    {
        $path = collect();
        $current = Document::find($id);

        while ($current) {
            $path->prepend($current);
            $current = $current->parent;
        }

        return $path;
    }

    /*
    |--------------------------------------------------------------------------
    | Folder / File Ops
    |--------------------------------------------------------------------------
    */

    public function createFolder(array $data): Document
    {
        return Document::create([
            'user_id' => Auth::id(),
            'parent_id' => $data['parent_id'] ?? null,
            'original_name' => $data['name'],
            'name' => Str::slug($data['name']) . '-' . Str::random(6),
            'document_type' => 'folder',
        ]);
    }



    protected function isDescendant(?int $parentId, int $childId): bool
    {
        while ($parentId) {
            if ($parentId == $childId) {
                return true;
            }
            $parent = Document::find($parentId);
            $parentId = $parent?->parent_id;
        }

        return false;
    }

    public function rename(int $id, string $name): bool
    {
        $document = Document::findOrFail($id);
        return $document->update(['original_name' => $name]);
    }

    /*
    |--------------------------------------------------------------------------
    | Search / Filter
    |--------------------------------------------------------------------------
    */

    public function search(string $query): Collection
    {
        return Document::where('user_id', Auth::id())
            ->where('original_name', 'like', "%{$query}%")
            ->get();
    }

    public function filter(array $filters): Collection
    {
        $query = Document::where('user_id', Auth::id());

        if (!empty($filters['type'])) {
            $query->where('document_type', $filters['type']);
        }

        if (!empty($filters['tags'])) {
            $query->whereJsonContains('tags', $filters['tags']);
        }

        return $query->get();
    }

    public function getByType(string $type): Collection
    {
        return Document::where('user_id', Auth::id())
            ->where('document_type', $type)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    protected function resolveDocumentType(string $mime): string
    {
        return match (true) {
            str_starts_with($mime, 'image/') => 'image',
            $mime === 'application/pdf' => 'pdf',
            default => 'doc',
        };
    }





    public function uploadFile(array $data): Document
    {
        $userId = Auth::id();
        if (!$userId) {
            throw new \Exception('Unauthenticated');
        }
        $files = $data['files'] ?? [];
        $parentId = $data['parent_id'] ?? null;
        $file = $files[0] ?? null; // Only handle first file for single upload
        if (!$file) {
            throw new \Exception('No file provided');
        }

        $mimeType = $file->getMimeType();

        $documentType = $this->resolveDocumentType($mimeType);

        $uuid = (string) Str::uuid();

        $extension = $file->getClientOriginalExtension();

        $name = $uuid . '.' . $extension;

        $path = $file->storeAs(
            "documents/{$userId}/{$extension}",
            $name,
            'public'
        );

        return Document::create([
            'user_id' => $userId,
            'parent_id' => $parentId,
            'document_type' => $documentType,
            'path' => $path,
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size' => $file->getSize(),
        ]);
    }

    public function copy(int $id, ?int $targetParentId): Document
    {
        $document = Document::findOrFail($id);

        $newDocument = $document->replicate();
        $newDocument->parent_id = $targetParentId;
        $newDocument->name = $this->generateCopyName($document->name);
        $newDocument->save();

        if ($document->isFile() && $document->path) {
            $newPath = str_replace($document->id, $newDocument->id, $document->path);
            Storage::copy('public/' . $document->path, 'public/' . $newPath);
            $newDocument->update(['path' => $newPath]);
        }

        return $newDocument;
    }
    public function generateCopyName(string $originalName): string
    {
        $copyCount = Document::where('name', 'like', "{$originalName} (copy%)")->count();
        return "{$originalName} (copy" . ($copyCount > 0 ? " {$copyCount}" : "") . ")";
    }

    public function move(int $id, ?int $newParentId): bool
    {
        $document = Document::findOrFail($id);

        // Prevent circular move
        if ($this->isDescendant($newParentId, $id)) {
            throw new \Exception('Invalid move: circular hierarchy');
        }

        $document->update([
            'parent_id' => $newParentId,
        ]);

        return true;
    }

    public function getByUser(int $userId): Collection
    {
        return Document::where('user_id', $userId)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Metadata & Attributes
    |--------------------------------------------------------------------------
    */

    public function updateMeta(int $id, array $meta): bool
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);
        return $document->update(['meta' => $meta]);
    }

    public function updateTags(int $id, array $tags): bool
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);
        return $document->update(['tags' => $tags]);
    }

    /*
    |--------------------------------------------------------------------------
    | Permissions (basic placeholder)
    |--------------------------------------------------------------------------
    */

    public function canView(int $id, int $userId): bool
    {
        $document = Document::find($id);
        return $document && $document->user_id === $userId;
    }

    public function canEdit(int $id, int $userId): bool
    {
        $document = Document::find($id);
        return $document && $document->user_id === $userId;
    }

    public function canDelete(int $id, int $userId): bool
    {
        $document = Document::find($id);
        return $document && $document->user_id === $userId;
    }



    /*

    |--------------------------------------------------------------------------
    | Folder Path Generation (for breadcrumbs)
    |--------------------------------------------------------------------------    
    */
    private function generateFolderPath(Document $document): string
    {
        $path = [];
        
    }
}
