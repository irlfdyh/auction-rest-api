<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionHistory extends Model
{
    protected $guarded = ['history_id'];
    protected $primaryKey = 'history_id';

    public function auction() {
        return $this->hasOne(Auction::class);
    }

    public function stuff() {
        return $this->hasOne(Stuff::class);
    }

    public function societys() {
        return $this->belongsToMany(Society::class);
    } 
}
