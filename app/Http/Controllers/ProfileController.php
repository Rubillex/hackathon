<?php

namespace App\Http\Controllers;

class ProfileController
{
    public function profile()
    {
        //TODO КОСТЫЛЬ ДЛЯ ДЕБАГА
        auth()->loginUsingId(1, true);

        return view('index');
    }
}
