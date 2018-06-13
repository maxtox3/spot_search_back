<?php

namespace App\Api\V1\Controllers;

use Config;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $user = new User($request->all());
        $existingUser = User::where('email', '=', $request['email'])->first();
        if ($existingUser != null) {
            return response()->json([
                'error' => [
                    'message' => 'Пользователь с таким email уже существует!',
                    'errors' => [
                        'email' => 'Пользователь с таким email уже существует!'
                    ]
                ]
            ], 200);
        }
        if (!$user->save()) {
            throw new HttpException(500);
        }

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token,
            'user' => $user
        ], 201);
    }
}
