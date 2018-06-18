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

        factory(App\Models\News::class, 50)->create();
        factory(App\Models\Client::class, 20)->create();
        factory(App\Models\Feedback::class, 50)->create();
        factory(App\Models\Slider::class, 8)->create();
    }
}
