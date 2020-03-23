<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Stuff;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function __construct() {
        $this->middleware('APIToken')->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getting all auction data with stuff detail
        $auction = Auction::with(['stuff'])->get();

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
        $status = $request->status;

        // Getting current stuff price
        $currentPrice = Stuff::find($stuffId)->started_price;

        // Getting current stuff status
        $stuffStatus = Stuff::find($stuffId)->status;

        $auction = new Auction([
            'stuff_id' => $stuffId,
            'officer_id' => $officerId,
            'society_id' => $userId,
            'auction_date' => $auctionDate,
            'current_price' => $currentPrice,
            'status' => $status
        ]);

        if ($stuffStatus == 'dilelang') {
            return response()->json([
                'message' => 'Barang sudah dilelang sebelumnya.'
            ], 200);
        } else {
            if ($auction->save()) {

                // updating current stuff status
                $update = Stuff::find($stuffId)->update([
                    'status' => 'dilelang'
                ]);
    
                $successMessage = [
                    'message' => 'Auction Started',
                    'auction' => $auction
                ];
                return response()->json(
                    $successMessage, 201
                );
            } else {
                $errorMessage = [
                    'message' => 'Error during starting the auction'
                ];
        
                return response()->json(
                    $errorMessage, 404
                );
            }
        }

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
        ]);

        $auction = Auction::findOrFail($auction->auction_id);

        $status = $request->status;

        $auction->update([
            'status' => $status
        ]);

        if ($auction->update()) {

            // create auction history if the auction is finished
            $auction->auctionHistory()->create([
                'auction_id' => $auction->auction_id,
                'stuff_id' => $auction->stuff_id,
                'society_id' => $auction->society_id ,
                'price_quote' => $auction->current_price
            ]);

            return response()->json([
                'message' => 'Auction Finished',
                'auction' => $auction
            ], 201);
        } else {
            $errorMessage([
                'message' => 'Error when closing the auction'
            ]);
    
            return response()->json(
                $errorMessage, 404
            );
        }

        
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
