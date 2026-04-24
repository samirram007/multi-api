<?php

namespace App\Modules\Document\Document\Resources;

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
            'path' => $this->document_type == 'folder' ? $this->path : env('APP_URL') . '/storage/' . $this->path,
            'mimeType' => $this->mime_type,
            'size' => $this->size,
            'originalName' => $this->original_name,
            'caption' => $this->caption,
            'description' => $this->description,
            'extension' => $this->extension,
            'privacyLevel' => $this->privacy_level,
            'tags' => $this->tags,
            'storageType' => $this->storage_type,
            'link' => $this->link,
            'isRoot' => $this->is_root,
            'documents' => $this->document_type === 'folder' ? new DocumentCollection($this->whenLoaded('documents')) : null,
            'folders' => $this->document_type !== 'folder' ? new DocumentCollection($this->whenLoaded('folders')) : null,
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
