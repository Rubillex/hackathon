<?php

namespace App\Http\Controllers\Integration;

use App\Http\Requests\Platform\PlatformLoadUserRequest;
use App\Models\Api\Stepik;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController
{

    public function loadUserPlatformInfo(PlatformLoadUserRequest $request, Stepik $stepik, Platform $platform)
    {
        $data = $request->validated();

        $id = $data['id'];
        $userID = $data['userID']; // todo получать с бэка это

        $success = true;

        try {
            $result = $stepik->getUserById($id);
        } catch (\Exception $e) {
            $success = false;
        }

        if (!$success) {
            return response()->json([
                'success' => false,
            ]);
        }

        $data = [
            'user_id' => $userID,
            'external_id' => $result->id,
            'knowledge' => $result->knowledge ?? 0,
            'reputation' => $result->reputation ?? 0,
        ];


        Platform::firstOrCreate([
            'user_id' => $userID,
            'external_id' => $result->id
        ], $data);

        return response()->json([
            'success'    => $success,
            'knowledge'  => $result->knowledge ?? 0,
            'reputation' => $result->reputation ?? 0,
        ]);
    }

}

