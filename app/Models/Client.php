<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function orders(){
        return $this->hasMany(Order::class, 'id_client', 'id_1c');
    }

    public function offices(){
        return $this->hasMany(ClientOffice::class);
    }

    public function faces(){
        return $this->hasMany(ClientFace::class);
    }

    public function user(){
        return $this->hasOne(\App\User::class, 'id_1c', 'id');
    }


}
