<?php

namespace Modules\Aipt\CostCategory\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class CostCategoryResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'is_revenue' => $this->is_revenue,
            'is_non_revenue' => $this->is_non_revenue,
            'is_system' => $this->is_system,
            'is_hidden' => $this->is_hidden,
            'status' => $this->status,
            'icon' => $this->icon,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
