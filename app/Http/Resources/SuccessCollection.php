<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SuccessCollection extends ResourceCollection
{
    protected string $message;
    protected int $successCode;
    protected ?string $duration;
    public function __construct(
        $resource,
        string $message = null,
        string $duration = null,
        int $successCode = 200
    ) {
        parent::__construct($resource);
        $this->message = $message ?? 'Records fetched successfully';
        $this->successCode = $successCode;
        $this->duration = $duration;
    }

    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }

    public function with(Request $request): array
    {
        return [
            'status' => true,
            'success' => true,
            'duration' => $this->duration ?? null,
            'code' => $this->successCode,
            'message' => $this->message . ' (' . $this->collection->count() . ' record(s))',
        ];
    }
}
