<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name', 'contact', 'comment'];

    // TODO: обозначить какая форма откуда
    const TYPE = [
        1 => "Подача заявки",
        2 => "Заказ звонка",
        3 => "Напишите нам, мы обязательно вам ответим",
        4 => "Не нашли подходящего товара",
        5 => "Оформление подписки",
        7 => "Сообщение об ошибке",
        8 => "Напишите руководителю",
        9 => "Отзыв магазину"
    ];
}
