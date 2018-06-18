<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function orders(){
        $this->hasMany(Order::class);
    }
}
