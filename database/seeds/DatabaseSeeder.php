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

        factory(App\Models\News::class, 50)->create();
        factory(App\Models\MainPageClient::class, 20)->create();
        factory(App\Models\Feedback::class, 50)->create();
        factory(App\Models\Slider::class, 8)->create();
        factory(App\Models\ArticleCategory::class, 5)->create();
        factory(App\Models\Article::class, 66)->create();
        factory(App\Models\Form::class, 30)->create();

//        dispatch(new App\Jobs\Parsers\GetUsers());
//        dispatch(new App\Jobs\Parsers\GetOrders());
    }
}
