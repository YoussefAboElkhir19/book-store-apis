<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    function login(LoginRequest $request)
    {
        $login_data = $request->validated();


        // compare data email , password exist or no in Data Base
        if (Auth::attempt($login_data)) {
            // Authorized can See Db and give you a token

            // return 'Yes';
            $user = Auth::user();

            // return $user;
            /**
             * @var /App/Models/User $user
             *
             *   */
            // to create a token to authorized user expired after 30 sec
            $token = $user->createToken('desktop-login', $user->roles, now()->addHours(30))->plainTextToken;

            return ['user' => $user, 'token' => $token];
        } else {
            return 'No';
        }
    } // end function login


    // function to deleted a current token
    function logout()
    {
        return auth()->user()->currentAccessToken()->delete();
    }

    // function to seleted a all tokenes
    function logout_all()
    {
        return auth()->user()->tokens()->delete();
    }

    // function to change password

    function change_password(Request $request)
    {
        $validated = $request->validate(
            [
                'current_password' => 'required|min:8|max:20',
                'password' => 'required|min:8|max:20|confirmed',
            ]
        );
        // get userlogin
        $user = Auth()->user();
        // compare current password with password in DB
        $matched = Hash::check($validated['current_password'], $user->password);
        if ($matched) {
            //  replaced to current password to new password in DB
            $user->password = Hash::make($validated['password']);

            if ($user->save()) {
                self::logout_all();
            }
        } else {
            return " current passord to matced in cureent  password in DB ";
        }
    }

    // function Register
    function register(RegisterUserRequest $request)
    {

        $data = $request->validated();
        $user = User::create($data);
        if ($user) {
            $user->token = $user->createToken('register', ['guest'])->plainTextToken;


            // return $user;
            return $this->http_response($user, 201);
        } else {

            return $this->http_response('Cannot register at the moment, please reload the page and try again!!!', 400);
        }
    }
}
