<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name', 'contact', 'comment'];

    // TODO: обозначить какая форма откуда
    const TYPE = [
        1 => 'вфывыф',
        2 => 'ыыыы',
        3 => 'фывфы',
        4 => 'ффф',
        5 => 'сячсчя',
        6 => 'ывфвфыыы',
    ];
}
