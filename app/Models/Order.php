<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['*'];

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
        $this->belongsTo(Client::class);
    }

    public function works()
    {
        $this->hasMany(RepairWorks::class);
    }
}
