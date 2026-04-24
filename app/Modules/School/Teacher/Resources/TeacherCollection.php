<?php

namespace App\Modules\School\Teacher\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class TeacherCollection extends SuccessCollection
{

         /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
