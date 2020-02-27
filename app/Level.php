<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function entity() {
        return $this->hasMany(AdminOfficier::class);
    }
}
