<?php

namespace App\Http\Controllers\LK;

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
        ];

        return response()->json($user);
    }

}

