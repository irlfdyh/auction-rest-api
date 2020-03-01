<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

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
}
