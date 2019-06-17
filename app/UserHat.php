<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHat extends Model
{
    protected $fillable = [
        'name'
    ];

    public function owner() {
        return $this->belongsToMany('App\User', 'user_hats');
    }
}