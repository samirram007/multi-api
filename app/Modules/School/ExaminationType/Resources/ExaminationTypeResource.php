<?php

namespace Modules\School\ExaminationType\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExaminationTypeResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'isPromotionalExam' => $this->is_promotional_exam,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
