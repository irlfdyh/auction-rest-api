<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    // 
    public function auction() {
        return $this->hasOne(LelangModel::class);
    }


    public function auctionHistory() {
        return $this->hasOne(HistoryLelangModel::class);
    }

    // get stuff category Id
    public function stuffCategory() {
        return $thus->belongsTo(KategoriModel::class);
    }
}
