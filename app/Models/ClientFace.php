<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientFace extends Model
{
    protected $guarded = [];

    public function office()
    {
        return $this->hasOne(ClientOffice::class, 'id_dop', 'office');
    }
}
