<?php

namespace App\Modules\Document\Document\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;

class DocumentParentResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'parentId' => $this['parent_id'],
            'name' => $this['name'],
            'originalName' => $this['original_name'],
            'depth' => $this['depth'],
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