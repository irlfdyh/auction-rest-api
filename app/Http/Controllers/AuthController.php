<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request) {

        // creating user 
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'api_token' => Str::random(11)
        ]);

        // also create officer and society data when creating an user
        if ($request->level_id == 1 || $request->level_id == 2) {
            $officer = $user->officer()->create([
                'user_id' => $user->user_id,
                'officer_name' => $request->officer_name,
                'status' => $request->status
            ]);
            $success['officer_name'] = $officer->officer_name;
        } else if ($request->level_id == 3) {
            $society = $user->society()->create([
                'user_id' => $user->user_id,
                'society_name' => $request->society_name,
                'phone' => $request->phone,
                'status' => $request->status
            ]);
            $success['society_name'] = $society->society_name; 
        }

        $success['level_id'] = $user->level_id;
        $success['token'] = $user->api_token;

        return response()->json([
            'message' => 'Data Created',
            'user' => $success
        ]);

    }

    public function signin(Request $request) {

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $success['token'] = Auth::user()->api_token;
            $success['level_id'] = Auth::user()->level_id;

            return response()->json([
                'message' => 'Logged In',
                'user' => $success
            ],201);
        } else {
            return response()->json([
                'message' => 'Invalid Login'
            ]);
        }
    }

}
