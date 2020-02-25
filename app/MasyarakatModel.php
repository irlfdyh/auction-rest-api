<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasyarakatModel extends Model
{
    // getting user auction stuff
    public function auction() {
        return $this->hasMany(LelangModel::class);
    }

    // getting user auction history
    public function aucitonHistory() {
        return $this->hasMany(HistoryLelangModel::class);
    }
}
