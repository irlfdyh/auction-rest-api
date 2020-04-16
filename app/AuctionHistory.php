<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionHistory extends Model
{
    protected $guarded = ['history_id'];
    protected $primaryKey = 'history_id';

    public function auction() {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

    public function stuff() {
        return $this->belongsTo(Stuff::class, 'stuff_id');
    }

    public function society() {
        return $this->belongsTo(Society::class, 'society_id');
    } 
}
