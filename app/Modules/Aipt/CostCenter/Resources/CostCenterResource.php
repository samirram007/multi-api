<?php

namespace Modules\Aipt\CostCenter\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class CostCenterResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'cost_category_id' => $this->cost_category_id,
            'cost_category' => new \Modules\Aipt\CostCategory\Resources\CostCategoryResource($this->whenLoaded('costCategory')),
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
