<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    protected string $message;
    protected int $successCode;
    protected ?string $duration;


    public function __construct(
        $resource,
        string $message = null,
        int $successCode = 200,
        string $duration = null
    ) {
        parent::__construct($resource);
        $this->message = $message ?? 'Record processed successfully';
        $this->successCode = $successCode;
        $this->duration = $duration;
    }

    public function toArray(Request $request): array
    {
        return is_array($this->resource) ? $this->resource : $this->resource->toArray();
    }

    public function with(Request $request): array
    {
        return [
            'status' => true,
            'success' => true,
            'duration' => $this->duration ?? null,
            'code' => $this->successCode,
            'message' => $this->message,
        ];
    }
}
