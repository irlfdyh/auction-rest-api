<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['user_id'];
    protected $primaryKey = 'user_id';

    public function auction() {
        //$this->hasMany(Auction::class);
    }

    public function auctionHistory() {
        //$this->hasMany(AuctionHistory::class);
    }
}
