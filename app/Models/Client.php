<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function orders(){
        return $this->hasMany(Order::class, 'id_client');
    }

    public function user(){
        return $this->hasOne(\App\User::class, 'id_1c', 'id');
    }


}
