<?php

namespace App\Http\Controllers\LK;

use App\Models\User;

class LKController
{
    public function __construct(
    )
    {
//        todo получить юзера
    }

    public function index()
    {

        $user = [
            'id'    => 76221823,
            'email' => 'kirillmk_kmk@mail.ru',
            'token' => request()->bearerToken(),
        ];

        return response()->json($user);
    }

}

