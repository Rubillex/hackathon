<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::create($request->validated());
        auth()->loginUsingId($user->id, true);

        return redirect()->route(route('cources.index'));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::where('email', '=', $request->getEmail())->first();

        if (!$user) {
            return redirect()->back();
        }

        if (Hash::check($request->getPassword(), $user->password)) {
            auth()->loginUsingId($user->id, true);

            return redirect()->route(route('cources.index'));
        }

        return redirect()->back();
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
