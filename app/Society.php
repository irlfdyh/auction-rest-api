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

    /**
     * getting society auction history
     */
    public function auctionHistory() {
        return $this->hasMany(Bidders::class, 'society_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
