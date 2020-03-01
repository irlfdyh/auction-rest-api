<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //use Notifiable;

    protected $guarded = ['user_id'];
    protected $primaryKey = 'user_Id';

    public function officer() {
        return $this->hasOne(Officer::class, 'user_id');
    }

    public function society() {
        return $this->hasOne(Society::class, 'user_id');
    }
}
