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
     * Display the specified resource.
     *
     * @param  \App\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        // to get level_id
        $officer = Officer::with(['user'])
            ->findOrFail($officer->officer_id);

        $response = [
            'message' => 'Detail Data',
            'officer' => $officer
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
        // update officer data here
        $this->validate($request, [
            'officer_name' => 'required',
            'status' => 'required'
        ]);

        $name = $request->officer_name;
        $status = $request->status;

        $officerID = Officer::findOrFail($officer->officer_id);

        $officer->update([
            'officer_name' => $name,
            'status' => $status
        ]);

        if ($officer->update()) {
            $successMessage = [
                'message' => 'Data Updated',
                'officier' => $officer
            ];
    
            return response()->json(
                $successMessage, 200
            );
        } else {
            return response()->json([
                'message' => 'Error During Update Data'
            ], 404);
        }

    
    }

}
