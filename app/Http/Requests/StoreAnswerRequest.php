<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'description' => 'required|max:256',
            'is_valid' => 'boolean',
            'question_id' => 'required|exists:questions,id'
        ];
    }
}
