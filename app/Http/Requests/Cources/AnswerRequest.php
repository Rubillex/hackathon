<?php

namespace App\Http\Requests\Cources;

use App\Enum\QuestionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnswerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'value' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'question_id' => ['required', 'exists:questions,id'],
        ];
    }
}
