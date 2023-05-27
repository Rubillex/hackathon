<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'course_id' => ['required', 'exists:courses,id'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
