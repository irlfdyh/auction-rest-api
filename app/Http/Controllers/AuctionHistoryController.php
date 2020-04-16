<?php

namespace App\Http\Controllers;

use App\AuctionHistory;
use Illuminate\Http\Request;

class AuctionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = AuctionHistory::with(['auction'])->get();

        $response = ([
            'message' => 'All auction history data',
            'history' => $history
        ]);

        return response()->json(
            $response, 200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = AuctionHistory::with(['auction', 'stuff', 'society'])
            ->findOrFail($id);

        $response = ([
            'message' => 'Detail auction history data',
            'history' => $history
        ]);

        return response()->json(
            $response, 200
        );
    }
    
}
