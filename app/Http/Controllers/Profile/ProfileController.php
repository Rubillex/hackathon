<?php

namespace App\Http\Controllers\Profile;

class ProfileController
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
        ];

        return response()->json($user);
    }

}

