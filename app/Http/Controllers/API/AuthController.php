<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            // Validation Email & Password
            $request->validate([
                'email'     => ['email', 'required'],
                'password' => ['required']
            ]);

            // Check credentials (login)
            $credentials = request([
                'email',
                'password'
            ]);

            if(!Auth::attempt($credentials))
            {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            // Invalid credentials
            $user = User::firstWhere('email', $request->email);
            if(!Hash::check($request->password, $user->password, []))
            {
                throw new Exception('Invalid Credentials');
            }

            // Valid Credentials
            $tokenResults = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token'      => $tokenResults,
                'token_type'        => 'Bearer',
                'user'              => $user
            ], 'Authenticated');
        } catch (Exception $error)
        {   dd($error);
            // return ResponseFormatter::error([
            //     'message'           => 'Something went wrong',
            //     'error'             => $error
            // ], 'Authentication Failed', 500 );
        }
    }

    public function register(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'name'          => ['required', 'string', 'max:255'],
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'      => ['required', 'confirmed', Rules\Password::defaults()]
            ]);

            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'address'   => $request->address,
                'house_num' => $request->houseNumber,
                'phone_num' => $request->phoneNumber,
                'city'      => $request->city,
                'password'  => Hash::make($request->password)
            ]);

            $user = User::firstWhere('email', $request->email);

            $tokenResults = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token'      => $tokenResults,
                'token_type'        => 'Bearer',
                'user'              => $user
            ], 'Authenticated');

        } catch (Exception $error){
            return ResponseFormatter::error([
                'message'           => 'Something went wrong',
                'error'             => $error
            ], 'Authentication Failed', 500 );
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success(
            $token, 'Token Revoked'
        );
    }
}
