<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'place' => 'header',
            'title' => 'Верхнее',
            'url'   => ''
        ]);
        Menu::create([
            'parent_id' => '1',
            'title'     => 'Главная',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => '1',
            'title'     => 'Статьи',
            'url'       => '/articles'
        ]);
        Menu::create([
            'parent_id' => '1',
            'title'     => 'Отзывы',
            'url'       => '/feedback'
        ]);
        Menu::create([
            'parent_id' => 1,
            'title'     => 'Адреса сервисных центров',
            'url'       => '/contacts'
        ]);
        Menu::create([
            'parent_id' => 1,
            'title'     => 'О нас',
            'url'       => '/about'
        ]);
        $footer1 = Menu::create([
            'place' => 'footer1',
            'title' => 'Нижнее1',
            'url'   => ''
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Заправка картриджей',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Замена картриджа',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Вечный картридж',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Ремонт принтеров',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Обслуживание принтеров',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Ремонт плоттеров',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Покопийное обслуживание',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer1->id,
            'title'     => 'Другие услуги',
            'url'       => '/'
        ]);


        $footer2 = Menu::create([
            'place' => 'footer2',
            'title' => 'Нижнее2',
            'url'   => ''
        ]);


        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Услуги',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Главная',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'О компании',
            'url'       => '/about'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Акции',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Новости',
            'url'       => '/news'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Отзывы',
            'url'       => '/feedback'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Статьи',
            'url'       => '/'
        ]);
        Menu::create([
            'parent_id' => $footer2->id,
            'title'     => 'Контакты',
            'url'       => '/contacts'
        ]);


    }
}
