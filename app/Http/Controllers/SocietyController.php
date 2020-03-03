<?php

namespace App\Http\Controllers;

use App\Society;
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
        $society = Society::all();

        $response = [
            'message' => 'All User Data',
            'user' => $society
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        // showing society specific society with user data
        $society = Society::with(['user', 'auctionHistory'])
            ->findOrFail($society->society_id);

        $response = [
            'message' => 'Detail Data',
            'user' => $society
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        // update society profile here
        $societyId = Society::findOrFail($society->society_id);

        $societyName = $request->society_name;
        $phone = $request->phone;
        $status = $request->status;

        $society->update([
            'society_name' => $societyName,
            'phone' => $phone,
            'status' => $status
        ]);

        if ($society->update()) {
            $succesResponse = [
                'message' => 'Data Updated',
                'user' => $society
            ];
    
            return response()->json(
                $succesResponse, 200
            );
        } else {
            return response()->json([
                'message' => 'Error during update data'
            ], 404);
        }

        
    }
}
