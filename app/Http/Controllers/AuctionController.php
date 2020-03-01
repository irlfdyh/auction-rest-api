<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Stuff;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auction = Auction::all();

        $response = ([
            'message' => 'All Auction Data',
            'auction' => $auction
        ]);


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
            'stuff_id' => 'required',
            'officer_id' => 'required',
            'auction_date' => 'required',
            'status' => 'required'
        ]);

        $stuffId = $request->stuff_id;
        $officerId = $request->officer_id;
        $userId = $request->society_id;
        $auctionDate = $request->auction_date;
        $currentPrice = $request->current_price;
        $status = $request->status;

        $currentPrice = Stuff::find($stuffId)->started_price;

        $auction = new Auction([
            'stuff_id' => $stuffId,
            'officer_id' => $officerId,
            'society_id' => $userId,
            'auction_date' => $auctionDate,
            'current_price' => $currentPrice,
            'status' => $status
        ]);

        if ($auction->save()) {
            $successMessage = [
                'message' => 'Auction Started',
                'auction' => $auction
            ];
            return response()->json(
                $successMessage, 201
            );
        }

        $errorMessage = [
            'message' => 'Error during starting the auction'
        ];

        return response()->json(
            $errorMessage, 404
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $auction = Auction::with(['stuff', 'bidders'])->findOrFail($auction->auction_id);
        $response = [
            'message' => 'Detail Data',
            'auction' => $auction
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        // at this update the officer only can change
        // status value
        $this->validate($request, [
            'status' => 'required',
            'final_price' => 'required'
        ]);

        $auction = Auction::findOrFail($auction->auction_id);

        $status = $request->status;
        $finalPrice = $request->final_price;

        if (!$auction->update()) {
            $errorMessage([
                'message' => 'Error when closing the auction'
            ]);
    
            return response()->json(
                $errorMessage, 404
            );
        }

        $auction->update([
            'status' => $status,
            'final_price' => $finalPrice
        ]);

        return response()->json([
            'message' => 'Auction Finished',
            'auction' => $auction
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
