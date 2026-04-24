<?php

namespace App\Modules\Document\Document\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class DocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'files.*' => 'required|file|mimes:jpg,jpeg,png,webp,pdf|max:8192',
            'parent_id' => 'sometimes|nullable|exists:documents,id',
            // 'file' => 'required|file', // Ensure it's a file
            // Add other validation rules for additional fields if needed
        ];
    }
    public function validatedWithFiles()
    {
        return array_merge(parent::validated(), [
            'file' => $this->file('file'), // Include the file in validated data
        ]);
    }

    public function messages(): array
    {
        return [
            'files.required' => 'Please upload at least one file.',
            'files.array' => 'The files must be an array.',
            'files.*.file' => 'Each item must be a valid file.',
            'files.*.max' => 'Each file must not exceed 4MB in size.',
            'files.*.mimes' => 'Allowed file types are: jpeg, png, avif, gif, pdf, doc, docx, xls, xlsx, ppt, pptx, txt.',
        ];

    }
}
