<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(NewsTableSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PagesSeeder::class);

        factory(App\Models\News::class, 50)->create();
        factory(App\Models\MainPageClient::class, 20)->create();
        factory(App\Models\Feedback::class, 50)->create();
        factory(App\Models\Slider::class, 8)->create();
        factory(App\Models\ArticleCategory::class, 5)->create();
        factory(App\Models\Article::class, 66)->create();
        factory(App\Models\Form::class, 30)->create();

        for ($i = 0; $i < 3; $i++) {
            \App\Models\Contacts::create([
                'name' => 'ООО «Сервис Принт» Филиал «На Ленина»',
                'address' => '123123 Российская Федерация,<br> г. Москва, ул. Ленина, д. 121',
                'tel' => '8 800 123 12 12',
                'schedule' => 'Пн - Пт 8.00-20.00<br>Сб - Вс 9.00-17.00',
                'mail' => 'info@print.ru',
                'map' => '{"lat": 56.0070264, "lng": 37.4422701}',
            ]);
        }

//        dispatch(new App\Jobs\Parsers\GetUsers());
//        dispatch(new App\Jobs\Parsers\GetOrders());
    }
}
