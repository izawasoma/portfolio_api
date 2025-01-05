<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'filename' => [
                'required',
                'string',
                'max:30',
                'unique:files,filename'
            ],
            'file' => [
                'required', 
                'file', 
                'max:512000', // 最大500MB (KB単位で指定)
                'mimetypes:video/mp4,audio/mpeg,image/jpeg,image/png,image/gif,image/svg+xml',
            ],
        ];
    }
}
