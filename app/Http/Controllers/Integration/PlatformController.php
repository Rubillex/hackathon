<?php

namespace App\Http\Controllers\Integration;

use App\Models\Api\Stepik;

class PlatformController
{
    public function __construct()
    {
//        todo получить юзера
    }

    public function loadUserPlatformInfo(Stepik $stepik)
    {
        $user = [
            'id'    => 76221823,
            'email' => 'kirillmk_kmk@mail.ru',
        ];

        $success = true;

        try {
            $result = $stepik->getUserById($user['id']);
        } catch (\Exception $e) {
            $success = false;
        }

        return response()->json([
            'success'    => $success,
            'knowledge'  => $result['knowledge'] ?? 0,
            'reputation' => $result['reputation'] ?? 0,
        ]);
    }

}

