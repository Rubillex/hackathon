<?php

namespace App\Http\Requests\Courses;

use App\Enum\QuestionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class QuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => ['required', 'string'],
            'type' => ['required', Rule::in(QuestionTypeEnum::TYPES)],
            'lesson_id' => ['required', 'exists:lessons,id'],
        ];
    }
}
