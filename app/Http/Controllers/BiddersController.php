<?php

namespace App\Http\Controllers;

use App\Bidders;
use App\Auction;
use App\Stuff;
use Illuminate\Http\Request;

/**
 * Bidders is people/society who follows an auction
 */

class BiddersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Bidders $bidders)
    {

        $this->validate($request, [
            'auction_id' => 'required',
            'society_id' => 'required',
            'bid_price' => 'required'
        ]);

        $auctionId = $request->auction_id;
        $societyId = $request->society_id;
        $bidPrice = $request->bid_price;

        // getting current price from auction
        $auctionCurrentPrice = Auction::find($auctionId)->final_price;

        // getting auction status
        $auctionStatus = Auction::find($auctionId)->status;

        if ($bidPrice > $auctionCurrentPrice && $auctionStatus == 'open') {
            $bidders = new Bidders ([
                'auction_id' => $auctionId,
                'society_id' => $societyId,
                'bid_price' => $bidPrice
            ]);

            $update = Auction::with(['auction'])->update([
                'final_price' => $bidPrice
            ]);

            if ($bidders->save()) {
                $successMessage = [
                    'message' => 'Berhasil mengikuti pelelangan',
                    'data' => $bidders,
                    'new' => $update
                ];
                return response()->json(
                    $successMessage, 201
                );
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
