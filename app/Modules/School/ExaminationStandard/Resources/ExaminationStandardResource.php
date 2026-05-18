<?php

namespace Modules\School\ExaminationStandard\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExaminationStandardResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
