<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resorces\Auth\AuthResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        /** @var User $user */
        $user =   User::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => Hash::make($request->getPassword())]);

        auth()->loginUsingId($user->id, true);

        return response()->json(new AuthResource(auth()->user()));
    }

    public function login(LoginRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = User::where('email', '=', $request->getEmail())->first();

        if (!$user) {
            return response()->json([], 404);
        }

        if (Hash::check($request->getPassword(), $user->password)) {
            auth()->loginUsingId($user->id, true);

            return response()->json(new AuthResource(auth()->user()));
        }

        return response()->json([], 404);
    }

    public function logout()
    {
        if (auth('sanctum')->check()) {
            /** @var User $user */
            $user = auth('sanctum')->user();
            $tokenId = explode('|', request()->bearerToken())[0];
            try {
                $user->tokens()->where('id', '=', $tokenId)->delete();
            } catch (e $ex) {
            }
        }

        return true;
    }
}
