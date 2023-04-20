<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function fetch(Request $request)
    {
        return ResponseFormatter::success(
            $request->user(),
            'User success fetch data'
        );
    }

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function updateProfile (Request $request)
    {
        try {
            $user   = Auth::user();

            $rules = [
                'name'          => ['required', 'string', 'max:255'],
                'email'         => 'required|string|max:255|unique:users,email,'.$user->id,
                'password'      => ['string', new Password],
                'address'       => ['nullable', 'string'],
                'houseNumber'   => ['nullable', 'string', 'max:255'],
                'phoneNumber'   => ['nullable', 'string', 'max:255'],
                'city'          => ['nullable', 'string', 'max:255'],
            ];

            $request->validate($rules);

            $user->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'address'       => $request->address,
                'phone_num'     => $request->phoneNumber,
                'house_num'     => $request->houseNumber,
                'city'          => $request->city,
            ]);

            return ResponseFormatter::success(
                $user,
                'Profile updated'
            );

        } catch (Exception $error)
        {
            return ResponseFormatter::error([
                'message'       => "Something went wrong",
                'error'         => $error
            ], 'Email has exist', 404);
        }
    }

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function updateProfilePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'      => 'required|image|max:2048'
        ]);

        if($validator->fails())
        {
            return ResponseFormatter::error([
                'error'     => $validator->errors()
            ], 'update photo profile fails', 401);
        }

        if($request->file('file'))
        {
            $file = $request->file->store('assets/user', 'public');

            // Save image in url
            $user = Auth::user();
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([
                $file
            ], 'File successfully upload');
        }
    }
}
