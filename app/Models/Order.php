<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $guarded = [];

    public function setTimeCrAttribute($value)
    {
        $this->attributes['time_cr'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setExecTimeAttribute($value)
    {
        $this->attributes['exec_time'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setExecActAttribute($value)
    {
        $this->attributes['exec_act'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setPayAttribute($value)
    {
        $this->attributes['pay'] = ($value == 'истина') ? true : false;
    }

    public function setDocsBackAttribute($value)
    {
        $this->attributes['docs_back'] = ($value == 'истина') ? true : false;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id_1c');
    }

    public function works()
    {
        return $this->hasMany(RepairWorks::class);
    }
}
