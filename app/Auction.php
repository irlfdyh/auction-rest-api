<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $guarded = ['auction_id'];
    protected $primaryKey = 'auction_id';

    /**
     * the user can participate many auction and 
     * the auction can have many user which follow
     * this auction
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * the officer only can start the auction for 
     * one stuff
     */
    public function stuff() {
        return $this->hasOne(Stuff::class);
    }

    /**
     * the auction only can start with one officer
     */
    public function officer() {
        return $this->hasOne(Officer::class);
    }
}
