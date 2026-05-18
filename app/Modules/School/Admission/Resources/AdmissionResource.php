<?php

namespace Modules\School\Admission\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class AdmissionResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'admissionNo' => $this->admission_no,
            'admissionDate' => $this->admission_date?->toISOString(),
            'studentId' => $this->student_id,
            'campusId' => $this->campus_id,
            'academicSessionId' => $this->academic_session_id,
            'academicClassId' => $this->academic_class_id,
            'isActive' => $this->is_active,
            'isDeleted' => $this->is_deleted,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
