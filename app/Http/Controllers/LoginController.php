<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request)
    {

        try {

            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                // ma AuthUser ki jaga pay variable $user b use kar sakta ho lakin us kay liyay mujy agay object lagana ho ga object matlb  -> ya sign
                $token = $user->createToken('app')->plainTextToken;

                return response([
                    'message' => "Successfully Login",
                    'token' => $token,
                    'user' => $user
                ], 200); // state code
            }
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
        return response([
            'message' => 'Invalid Email or Password'
        ], 401);
    } // end login method 




    // {/* ---------------------------------------------------
    // ---------------------------------------------------------- */}



    public function Register(RegisterRequest $request)
    {

        try {
            $emailcheck = DB::table('users')->where('email', $request->email)->first();
            if ($emailcheck) {
                return response([
                    'message' => 'This ' . $request->email . ' E-Mail is already registered...!'
                ], 200);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // $token = $user->createToken('app')->accessToken;

            // Create a new token for the user
            $token = $user->createToken('app')->plainTextToken;

            return response([
                'message' => "Registation Successfull",
                'token' => $token,
                'user' => $user
            ], 200);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    } // end Register method

}
