<?php

namespace App\Http\Controllers;

use App\Bidders;
use App\Auction;
use Illuminate\Http\Request;

/**
 * Bidders is people/society who follows an auction
 */

class BiddersController extends Controller
{
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
        $auctionCurrentPrice = Auction::find($auctionId)->current_price;

        // getting auction status
        $auctionStatus = Auction::find($auctionId)->status;

        // getting auction current higher bidders quote
        $higherBidderSociety = Auction::find($auctionId)->society_id;

        // first is checking state are the auction is still opened
        if ($auctionStatus == 'open') {
            // and if the auction is opened the second is check are the new bid
            // price are higher than older
            if ($bidPrice > $auctionCurrentPrice) {
                // and if the new bid price is higher than older, then check are the
                // new bidder are the current higher at this auction
                if ($societyId == $higherBidderSociety) {
                    $message = [
                        'message' => 'Kamu adalah penawar tertinggi untuk saat ini'
                    ];
            
                    return response()->json(
                        $message, 404
                    );
                } else {
                    $bidders = new Bidders ([
                        'auction_id' => $auctionId,
                        'society_id' => $societyId,
                        'bid_price' => $bidPrice
                    ]);
        
                    $update = Auction::with(['auction'])->update([
                        'current_price' => $bidPrice,
                        // society id is need to get the user higher bid
                        // at some auction
                        'society_id' => $societyId
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
            } 
            // the new bid price must be higher than current price
            else if ($bidPrice <= $auctionCurrentPrice) {
                $errorMessage = [
                    'message' => 'Harga harus lebih tinggi dari sebelumnya'
                ];
        
                return response()->json(
                    $errorMessage, 404
                );
            } 
        } else if ($auctionStatus == 'close') {
            $errorMessage = [
                'message' => 'Pelelangan telah ditutup'
            ];
    
            return response()->json(
                $errorMessage, 404
            );
        } 
    }

}
