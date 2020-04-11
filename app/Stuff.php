<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{

    /**
     * Make sure that stuff id is can't filled by user
     */
    protected $guarded = ['stuff_id'];

    /**
     * Make sure that stuff_id is a primary key
     */
    protected $primaryKey = 'stuff_id';

    /**
     * Get relation from stuff category
     */
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * This stuff only can Opened for the Auction
     * just once.
     */
    public function auction() {
        return $this->hasOne(Auction::class, 'stuff_id');
    }

    /**
     * to know who officer has add this stuff
     */
    public function officer() {
        return $this->belongsTo(Officer::class, 'officer_id');
    }

}
