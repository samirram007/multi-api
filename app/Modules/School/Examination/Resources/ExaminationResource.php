<?php

namespace Modules\School\Examination\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExaminationResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'examinationStartDate' => $this->examination_start_date?->toISOString(),
            'examinationEndDate' => $this->examination_end_date?->toISOString(),
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
