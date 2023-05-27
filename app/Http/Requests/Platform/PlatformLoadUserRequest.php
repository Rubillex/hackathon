<?php

namespace App\Http\Requests\Platform;

use Illuminate\Foundation\Http\FormRequest;

class PlatformLoadUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userID' => ['required', 'numeric'],
            'id' => ['required', 'numeric'],
        ];
    }
}
