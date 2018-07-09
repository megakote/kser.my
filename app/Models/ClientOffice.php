<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientOffice extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function face()
    {
        return $this->hasOne(ClientFace::class, 'office', 'id_dop');
    }
}
