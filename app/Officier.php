<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officier extends Model
{
    protected $guarded = ['officier_id'];
    protected $primaryKey = 'officier_id';
    
    public function level() {
        return $this->belongsTo('App\Level');
    }

    public function auction() {
        return $this->belongsToMany(Auction::class);
    }
}
