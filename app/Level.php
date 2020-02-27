<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $guarded = ['level_id'];
    protected $primaryKey = 'level_id';

    public function entity() {
        return $this->hasMany('App\Officier');
    }
}
