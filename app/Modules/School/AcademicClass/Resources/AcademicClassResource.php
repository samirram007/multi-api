<?php

namespace Modules\School\AcademicClass\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class AcademicClassResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'campus_id' => $this->campus_id,
            'academic_standard_id' => $this->academic_standard_id,
            'section_id' => $this->section_id,
            'capacity' => $this->capacity,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
