<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\User;
use function view;

class PetController extends Controller
{
    public function getUserPet(User $user)
    {
        $pet = $user->pet;

        if (empty($pet)) {
            $pet = new Pet();
            $pet->happiness = 100;
            $pet->health = 100;
            $pet->user_id = $user->id;

            $pet->save();
        }

        return $pet;
    }

    public function goToCooks()
    {
        return view('admin.cooks');
    }
}
