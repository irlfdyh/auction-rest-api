<?php

namespace App\Http\Controllers;

use App\Officier;
use Illuminate\Http\Request;

class OfficierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officier = Officier::all();

        $response = [
            'message' => 'All Officier Data',
            'officier' => $officier
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
            'officier_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            'status' => 'required'
        ]);

        $levelId = $request->level_id;
        $name = $request->officier_name;
        $username = $request->username;
        $password = $request->password;
        $status = $request->status;

        $officier = new Officier([
            'level_id' => $levelId,
            'officier_name' => $name,
            'username' => $username,
            'password' => $password,
            'status' => $status
        ]);

        if ($officier->save()) {
            $message = [
                'message' => 'Data Created',
                'officier' => $officier
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
     * @param  \App\Officier  $officier
     * @return \Illuminate\Http\Response
     */
    public function show(Officier $officier)
    {
        $officier = Officier::findOrFail($officier->officier_id);
        $level = Officier::with('level')->where('level_id', $officier->level_id)->firstOrFail();

        $response = [
            'message' => 'Detail Data',
            'officier' => $officier,
            'level_detail' => $level
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Officier  $officier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officier $officier)
    {
        $this->validate($request, [
            'officier_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            'status' => 'required'
        ]);

        $levelId = $request->level_id;
        $name = $request->officier_name;
        $username = $request->username;
        $password = $request->password;
        $status = $request->status;

        $officierID = Officier::findOrFail($officier->officier_id);

        if (!$officier->update()) {
            return response()->json([
                'message' => 'Error During Update Data'
            ], 404);
        }

        $officier->update([
            'level_id' => $levelId,
            'officier_name' => $name,
            'username' => $username,
            'password' => $password,
            'status' => $status
        ]);

        $successMessage = [
            'message' => 'Data Updated',
            'officier' => $officier
        ];

        return response()->json(
            $successMessage, 200
        );
    }

}
