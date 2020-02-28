<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticable
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
