<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (auth()->attempt($loginData)) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => auth()->user(), 'userToken' => $accessToken]);
        } else {
            return response(['message' => 'Invalid Credentials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|max:10',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json(['error' => $validated->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }
}
