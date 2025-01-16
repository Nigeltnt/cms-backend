<?php

namespace App\Http\Requests\Feature;

use Illuminate\Foundation\Http\FormRequest;

class FeatureCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !auth()->check();
    }
    
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'html' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'max:1024'],
        ];
    }
}
