<?php

namespace App\Http\Requests\Cources;

use Illuminate\Foundation\Http\FormRequest;

class CourceStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'description' => ['required', 'string'],
//            'type' => ['required', 'string'],
            'creator_id' => ['required', 'exists:users,id'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
