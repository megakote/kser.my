<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name', 'contact', 'comment', 'type'];

    // TODO: обозначить какая форма откуда
    const TYPE = [
        0 => "Неизвестно",
        1 => "Подача заявки",
        2 => "Заказ звонка",
        3 => "Напишите нам, мы обязательно вам ответим",
        4 => "Не нашли подходящего товара",
        5 => "Оформление подписки",
        6 => "Оформление подписки2",
        7 => "Сообщение об ошибке",
        8 => "Напишите руководителю",
        9 => "Отзыв магазину",
        10 => "Заявка из ЛК"
    ];

    public function getContactsAttribute()
    {
        $contact = $this->attributes['contact'];
        $data = [
            'email' => '',
            'tel' => ''
        ];
        if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $contact))
        {
            $data['email'] = $contact;
        }
        else {
            $data['tel'] = $contact;
        }

        return $data;
    }
}
