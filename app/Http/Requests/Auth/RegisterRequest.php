<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
            'is_teacher' => ['required', 'boolean'],
            'is_student' => ['required', 'boolean'],
        ];
    }
}
