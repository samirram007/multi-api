<?php

namespace Modules\School\Student\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class StudentResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'code' => $this->code,
            'email' => $this->email,
            'contactNo' => $this->contact_no,
            'password' => $this->password,
            'status' => $this->status,
            'emergencyContactName' => $this->emergency_contact_name,
            'emergencyContactNo' => $this->emergency_contact_no,
            'birthMark' => $this->birth_mark,
            'medicalConditions' => $this->medical_conditions,
            'allergies' => $this->allergies,
            'language' => $this->language,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'caste' => $this->caste,
            'guardianType' => $this->guardian_type,
            'addressId' => $this->address_id,
            'campusId' => $this->campus_id,
            'academicSessionId' => $this->academic_session_id,
            'academicClassId' => $this->academic_class_id,
            'gender' => $this->gender,
            'doj' => $this->doj?->toISOString(),
            'dob' => $this->dob?->toISOString(),
            'aadhaarNo' => $this->aadhaar_no,
            'admissionNo' => $this->admission_no,
            'admissionAge' => $this->admission_age,
            'aClass' => $this->a_class,
            'admissionDate' => $this->admission_date?->toISOString(),
            'profileDocumentId' => $this->profile_document_id,
            'bankName' => $this->bank_name,
            'accountHolderName' => $this->account_holder_name,
            'bankAccountNo' => $this->bank_account_no,
            'bankIfsc' => $this->bank_ifsc,
            'bankBranch' => $this->bank_branch,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
