<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class AuthController extends Controller
{
    public function store(Request $request) {

        // creating user 
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'api_token' => Str::random(10)
        ]);

        // also create officer and society data when creating an user
        // with condition if level id = 1 or 2 will automatically create 
        // officer and if level id = 3 will automatically create society 
        if ($request->level_id == 1 || $request->level_id == 2) {
            $officer = $user->officer()->create([
                'user_id' => $user->user_id,
                'officer_name' => $request->officer_name,
                'status' => $request->status
            ]);

            // message object
            $success['officer_name'] = $officer->officer_name;
            $success['level_id'] = $user->level_id;
            $success['token'] = $user->api_token;

            return response()->json([
                'message' => 'Berhasil menambah petugas baru',
                'user' => $success
            ]);
        } else if ($request->level_id == 3) {
            $society = $user->society()->create([
                'user_id' => $user->user_id,
                'society_name' => $request->society_name,
                'phone' => $request->phone,
                'status' => $request->status
            ]);

            $success['society_name'] = $society->society_name; 
            $success['level_id'] = $user->level_id;
            $success['token'] = $user->api_token;

            return response()->json([
                'message' => 'Berhasil Mendaftar',
                'user' => $success
            ]);
        }
        
    }

    public function signin(Request $request) {

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $levelId = Auth::user()->level_id;
            $userId = Auth::user()->user_id;
            $token = Auth::user()->api_token;

            // finding officer and society data based on 
            // user id from the model
            $officer = User::find($userId)->officer;
            $society = User::find($userId)->society;

            if ($levelId == 1 || $levelId == 2) {
                return response()->json([
                    'message' => 'Login berhasil',
                    'level_id' => $levelId,
                    'token' => $token,
                    'user' => $officer
                ], 200);
            } else if ($levelId == 3) {
                return response()->json([
                    'message' => 'Login berhasil',
                    'level_id' => $levelId,
                    'token' => $token,
                    'user' => $society
                ], 200);
            }

        } else {

            // get valid username and password
            $getUsername = User::where('username', $request->username)->first();
            $getPassword = User::where('password', $request->password)->first();
            // get username from request
            $usernameInput = $request->username;

            if (!$getUsername) {
                return response()->json([
                    'message' => 'Username tidak ditemukan'
                ]);
            } else if (!$getPassword) {
                return response()->json([
                    'message' => "Password tidak sesuai dengan $usernameInput"
                ]);
            } else {
                return response()->json([
                    'message' => 'Ada masalah saat login'
                ]);
            }
        }
    }

    /**
     * updating user data
     */
    public function update(Request $request, User $user) 
    {

        $user = User::findOrFail($user->user_id);
        
        $user->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id
        ]);

        if ($user->update()) {
            $successMessage = [
                'message' => 'Data berhasil di ubah',
                'data' => $user
            ];
            return response()->json(
                $successMessage, 201
            );
        } else {
            return response()->json([
                'message' => 'Gagal mengubah data'
            ], 404);
        } 
    }

}
