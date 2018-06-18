<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait;

    const PLACE = [
        'header' => 'Шапка',
        'footer1' => 'Подвал1',
        'footer2' => 'Подвал2',
    ];
}