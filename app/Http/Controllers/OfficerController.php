<?php

namespace App\Http\Controllers;

use App\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officer = Officer::all();

        $response = [
            'message' => 'All Officer Data',
            'officier' => $officer
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
        $this->validate($request, [
            'officer_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            'status' => 'required'
        ]);

        $levelId = $request->level_id;
        $name = $request->officer_name;
        $username = $request->username;
        $password = $request->password;
        $status = $request->status;

        $officer = new Officer([
            'level_id' => $levelId,
            'officier_name' => $name,
            'username' => $username,
            'password' => $password,
            'status' => $status
        ]);

        if ($officer->save()) {
            $message = [
                'message' => 'Data Created',
                'officier' => $officer
            ];
            return response()->json(
                $message, 201
            );
        }

        $errorMessage = [
            'message' => 'Error During Creation'
        ];
        return response()->json(
            $errorMessage, 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        $officer = Officer::findOrFail($officer->officer_id);
        $level = Officer::find(1);

        $response = [
            'message' => 'Detail Data',
            'officer' => $officer,
            'level_detail' => [
                'level_id' => $level->level_id,
                'level_name' => $level->level
            ]
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'officer_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            'status' => 'required'
        ]);

        $levelId = $request->level_id;
        $name = $request->officer_name;
        $username = $request->username;
        $password = $request->password;
        $status = $request->status;

        $officerID = Officer::findOrFail($officer->officer_id);

        if (!$officer->update()) {
            return response()->json([
                'message' => 'Error During Update Data'
            ], 404);
        }

        $officer->update([
            'level_id' => $levelId,
            'officier_name' => $name,
            'username' => $username,
            'password' => $password,
            'status' => $status
        ]);

        $successMessage = [
            'message' => 'Data Updated',
            'officier' => $officer
        ];

        return response()->json(
            $successMessage, 200
        );
    }

}
