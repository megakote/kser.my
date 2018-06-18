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
            'url' => ''
        ]);
        Menu::create([
            'parent_id' => '1',
            'title' => 'Главная',
            'url' => '/'
        ]);
        Menu::create([
            'place' => 'footer1',
            'title' => 'Нижнее1',
            'url' => ''
        ]);
        Menu::create([
            'place' => 'footer2',
            'title' => 'Нижнее2',
            'url' => ''
        ]);
    }
}
