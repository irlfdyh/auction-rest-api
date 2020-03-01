<?php

namespace App\Http\Controllers;

use App\Stuff;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all stuff data
        $stuff = Stuff::all();

        $response = [
            'message' => 'All Stuff Data',
            'stuff' => $stuff
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation
        $this->validate($request, [
            'stuff_name' => 'required',
            'started_price' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        // get data input
        $categoryId = $request->category_id;
        $name = $request->stuff_name;
        $price = $request->started_price;
        $description = $request->description;
        $date = $request->date;

        // create new stuff object for gave data was created before
        $stuff = new Stuff([
            'category_id' => $categoryId,
            'stuff_name' => $name,
            'started_price' => $price,
            'description' => $description,
            'date' => $date
        ]);

        // returning response when data is succesfully created
        if ($stuff->save()) {
            $message = [
                'message' => 'Data Created',
                'stuff' => $stuff
            ];
            return response()->json($message, 201);
        }

        // returning response when error during create new stuff data
        $response = [
            'message' => 'Error during creation'
        ];
        return response()->json($response, 404);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function show(Stuff $stuff)
    {
        $stuff = Stuff::with(['category'])->findOrFail($stuff->stuff_id);

        $response = [
            'message' => 'Detail Data',
            'stuff' => $stuff
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stuff $stuff)
    {
        // data validation
        $this->validate($request, [
            'stuff_name' => 'required',
            'started_price' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $stuffId = Stuff::findOrFail($stuff->stuff_id);

        // get data input
        $categoryId = $request->category_id;
        $name = $request->stuff_name;
        $price = $request->started_price;
        $description = $request->description;
        $date = $request->date;

        $stuff->update([
            'category_id' => $categoryId,
            'stuff_name' => $name,
            'started_price' => $price,
            'description' => $description,
            'date' => $date
        ]);
        
        if (!$stuff->update()) {
            return response()->json([
                'message' => 'Error during update data'
            ], 404);
        }

        $response = [
            'message' => 'Stuff data updated',
            'stuff_data' => $stuff
        ];

        return response()->json(
            $response, 200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stuff $stuff)
    {
        $stuffId = Stuff::findOrFail($stuff->stuff_id);

        if (!$stuff->delete()) {
            return reseponse()->json([
                'message' => 'Data is not deleted'
            ], 404);
        }

        return response()->json([
            'message' => 'Stuff Deleted'
        ], 200);
    }

}
