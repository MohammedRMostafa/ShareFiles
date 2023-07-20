<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareFileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'file' => 'required|file|max:20480'
        ];
    }

    public function messages(): array
    {
        return [
            'upload.required' => "You must use the 'Choose file' button to select which file you wish to upload",
            'upload.max' => "Maximum file size to upload is 20MB (20480 KB)."
        ];
    }
}
