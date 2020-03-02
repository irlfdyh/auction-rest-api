<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //use Notifiable;

    /**
     * Make sure the attribute user_id isn't fillable and make
     * sure the user_id primaryKey
     */
    protected $guarded = ['user_id'];
    protected $primaryKey = 'user_id';

    /**
     * the attribute that should be hidden
     */
    protected $hidden = ['password'];

    /**
     * this function is used for post officer
     * or society profile data
     */
    public function officer() {
        return $this->hasOne(Officer::class, 'user_id');
    }

    public function society() {
        return $this->hasOne(Society::class, 'user_id');
    }
}
