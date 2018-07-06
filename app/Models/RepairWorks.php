<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairWorks extends Model
{
    protected $guarded = [];

    public function order(){
        $this->belongsTo(Order::class);
    }
}
