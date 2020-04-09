<?php

namespace App\Http\Controllers;

use App\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    
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
