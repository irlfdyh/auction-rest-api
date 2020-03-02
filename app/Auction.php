<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $guarded = ['auction_id'];
    protected $primaryKey = 'auction_id';

    /**
     * the society can participate many auction and 
     * the auction can have many society which follow
     * this auction
     */
    public function societys() {
        return $this->belongsToMany(Society::class);
    }

    /**
     * the officer only can start the auction for 
     * one stuff
     */
    public function stuff() {
        return $this->hasOne(Stuff::class, 'stuff_id');
    }

    /**
     * the auction only can start with one officer
     */
    public function officer() {
        return $this->hasOne(Officer::class);
    }

    /**
     * the auction can have many bidders
     */
    public function bidders() {
        return $this->hasMany(Bidders::class, 'auction_id');
    }

    /**
     * this function is used for create auction history
     * data based this auction
     */
    public function auctionHistory() {
        return $this->hasOne(AuctionHistory::class, 'auction_id');
    }
}
