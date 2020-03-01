<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        $response = [
            'message' => 'All User Data',
            'user' => $user
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make sure the field is filled by user
        $this->validate($request, [
            'user_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        $userName = $request->user_name;
        $username = $request->username;
        $password = $request->password;
        $phone = $request->phone;
        $status = $request->status;

        // Create new object for gave response data
        $user = new User([
            'user_name' => $userName,
            'username' => $username,
            'password' => bcrypt($password),
            'phone' => $phone,
            'status' => $status
        ]);

        // Returning response when data success created
        if ($user->save()) {
            $message = [
                'message' => 'Data Created',
                'user' => $user
            ];
            return response()->json($message, 201);
        }

        // Set response message if data failed to create
        $errorMessage = [
            'message' => 'Error during creation'
        ];
        return response()->json($errorMessage, 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user->user_id);

        $response = [
            'message' => 'Detail Data',
            'user' => $user
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userId = User::findOrFail($user->user_id);

        $userName = $request->user_name;
        $username = $request->username;
        $password = $request->password;
        $phone = $request->phone;
        $status = $request->status;

        $user->update([
            'user_name' => $userName,
            'username' => $username,
            'password' => bcrypt($password),
            'phone' => $phone,
            'status' => $status
        ]);

        if (!$user->update()) {
            return response()->json([
                'message' => 'Error during update data'
            ], 404);
        }

        $succesResponse = [
            'message' => 'Data Updated',
            'user' => $user
        ];

        return response()->json([
            $succesResponse, 200
        ]);
    }
}
