<?php

namespace App\Http\Controllers;

use App\Models\User;

class PetController extends Controller
{
    public function getPet(User $user)
    {
        echo '<pre>';print_r();echo'</pre>';die();
        return view('admin.bad-habbit');
    }

    public function goToCooks()
    {
        return view('admin.cooks');
    }
}
