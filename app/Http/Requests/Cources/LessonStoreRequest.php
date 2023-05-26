<?php

namespace App\Http\Requests\Cources;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'cource_id' => ['required', 'exists:cources,id'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
