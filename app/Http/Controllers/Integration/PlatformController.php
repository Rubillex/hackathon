<?php

namespace App\Http\Controllers\Integration;

use App\Models\Api\Stepik;
use Illuminate\Http\Request;

class PlatformController
{

    public function loadUserPlatformInfo(Request $request, Stepik $stepik)
    {
        $id = $request->get('id');

        $success = true;

        try {
            $result = $stepik->getUserById($id);
        } catch (\Exception $e) {
            $success = false;
        }

        return response()->json([
            'success'    => $success,
            'knowledge'  => $result->knowledge ?? 0,
            'reputation' => $result->reputation ?? 0,
        ]);
    }

}

