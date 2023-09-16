<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // use response;
    public function register(Request $request)
    {
        // dd($this->hello());

        //200 success
        //404 not found
        //422 validation failed
        $Validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
        ]);
        if ($Validator->fails()) {
            return responseJson('error', 'Validation Errors', $Validator->errors());

        }

        $user = User::create(
            ['name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
            ]
        );
        $token = $user->createToken('MY APP')->accessToken;
        return responseJson('success', 'User Created Successfully', ['token' => $token, 'user' => $user]);
    }
    public function login(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
            'password' => 'required|string|min:8',
        ]);
        if ($Validator->fails()) {
            return responseJson('error', 'Validation Errors', $Validator->errors());

        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MY APP')->accessToken;
            return responseJson('success', 'User Logged in  Successfully', ['token' => $token]);

        } else {
            return responseJson('error', 'Email or Password is incorrect');

        }

    }
}
