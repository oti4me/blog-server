<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Firebase\JWT\JWT;

use App\Models\User;
use App\Helpers\AuthHelpers;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Create a new user.
     *
     * @return void
     */
    public function signup(Request $request) {

        $this->validate($request, User::$siginupRules);

        $userDetails = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'password' => app('hash')->make($request->input('password')),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];

        $existingUser = User::where('email', $request->input('email'))->first();

        if($existingUser) {
            return response()->json([
                'message' => 'User with this email \'' . $request->input('email') . '\' already exist'
            ], 409); 
        }
        
        $user = User::create($userDetails);
        $token = AuthHelpers::jwtEncode($user);

        return response()->json([
            'userToken' => $token,
            'user' => $user
        ], 201);
    }
}
