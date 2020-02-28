<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $guarded = ['officer_id'];
    protected $primaryKey = 'officer_id';
    
    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function auction() {
        return $this->belongsToMany(Auction::class);
    }
}
