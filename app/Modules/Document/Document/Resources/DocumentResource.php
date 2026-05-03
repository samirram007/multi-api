<?php

namespace Modules\Document\Document\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class DocumentResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'userId' => $this->user_id,
            'documentType' => $this->document_type,
            'path' => $this->document_type != 'folder' ? '/storage/' . $this->path : $this->path,
            'mimeType' => $this->mime_type,
            'size' => $this->size,
            'originalName' => $this->original_name,
            'caption' => $this->caption,
            'description' => $this->description,
            'extension' => $this->extension,
            'privacyLevel' => $this->privacy_level,
            'tags' => $this->tags,
            'meta' => $this->meta,
            'storageType' => $this->storage_type,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'link' => $this->link ?? config('app.url') . '/storage/' . $this->path,
            'isRoot' => $this->is_root,
            'documents' => $this->document_type === 'folder' ? new DocumentCollection($this->whenLoaded('document')) : null,
            'folders' => $this->document_type !== 'folder' ? new DocumentCollection($this->whenLoaded('folder')) : null,
            'fullPath' => $this->full_path,
            'parents' => DocumentParentResource::collection($this->parents),
        ];
    }
}

// 'name',
//         'user_id',
//         'document_type',
//         'path',
//         'mime_type',
//         'size',
//         'original_name',
//         'caption',
//         'description',
//         'extension',
//         'privacy_level',
//         'tags',
//         'storage_type',
//         'link',
//         'is_root',
