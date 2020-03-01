<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidders extends Model
{
    protected $guarded = ['bid_id'];
    protected $primaryKey = 'bid_id';

    /**
     * Bidders can have many auction
     */
    public function auction() {
        return $this->belongsToMany(Auction::class, 'auction_id');
    }
}
