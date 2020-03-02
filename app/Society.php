<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $guarded = ['society_id'];
    protected $primaryKey = 'society_id';

    public function auction() {
        return $this->hasMany(Auction::class);
    }

    public function auctionHistory() {
        return $this->hasMany(AuctionHistory::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
