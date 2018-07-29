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
        for ($i = 0; $i < 3; $i++) {
            \App\Models\MainPagePricesTabs::create([
                'title' => 'Ремонт плоттеров',
                'body' => "			<h4>Цена на ремонт проттеров</h4>
									<div class=\"scroll_x mCustomScrollbar _mCS_8 mCS_no_scrollbar\"><div id=\"mCSB_8\" class=\"mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside\" tabindex=\"0\" style=\"max-height: none;\"><div id=\"mCSB_8_container\" class=\"mCSB_container mCS_x_hidden mCS_no_scrollbar_x\" style=\"position: relative; top: 0px; left: 0px; width: 100%;\" dir=\"ltr\">
										<div class=\"table\">
											<div class=\"table-row table-header\">
												<div class=\"cell cell-1\">
													<p>Модель</p>
												</div>
												<div class=\"cell\">
													<p>Цена ремонта 1 категории</p>
												</div>
												<div class=\"cell\">
													<p>Цена ремонта 2 категории</p>
												</div>
												<div class=\"cell\">
													<p>Цена ремонта 3 категории</p>
												</div>
											</div>
											<div class=\"table-row\">
												<div class=\"cell cell-1\">
													<p>Плоттер HP DesignJet 510</p>
												</div>
												<div class=\"cell\">
													<p>510 руб</p>
												</div>
												<div class=\"cell\">
													<p>620 руб</p>
												</div>
												<div class=\"cell\">
													<p>900 руб</p>
												</div>
											</div>
											<div class=\"table-row\">
												<div class=\"cell cell-1\">
													<p>Плоттер HP DesignJet T520</p>
												</div>
												<div class=\"cell\">
													<p>670 руб</p>
												</div>
												<div class=\"cell\">
													<p>900 руб</p>
												</div>
												<div class=\"cell\">
													<p>970 руб</p>
												</div>
											</div>
											<div class=\"table-row\">
												<div class=\"cell cell-1\">
													<p>Плоттер HP DesignJet T120</p>
												</div>
												<div class=\"cell\">
													<p>1690 руб</p>
												</div>
												<div class=\"cell\">
													<p>1720 руб</p>
												</div>
												<div class=\"cell\">
													<p>1870 руб</p>
												</div>
											</div>
											<div class=\"table-row\">
												<div class=\"cell cell-1\">
													<p>Плоттер HP DesignJet 510</p>
												</div>
												<div class=\"cell\">
													<p>1260 руб</p>
												</div>
												<div class=\"cell\">
													<p>1890 руб</p>
												</div>
												<div class=\"cell\">
													<p>1960 руб</p>
												</div>
											</div>
											<div class=\"table-row\">
												<div class=\"cell cell-1\">
													<p>Плоттер HP DesignJet 510</p>
												</div>
												<div class=\"cell\">
													<p>2900 руб</p>
												</div>
												<div class=\"cell\">
													<p>3200 руб</p>
												</div>
												<div class=\"cell\">
													<p>4900 руб</p>
												</div>
											</div>
										</div>
									</div><div id=\"mCSB_8_scrollbar_horizontal\" class=\"mCSB_scrollTools mCSB_8_scrollbar mCS-light mCSB_scrollTools_horizontal\" style=\"display: none;\"><div class=\"mCSB_draggerContainer\"><div id=\"mCSB_8_dragger_horizontal\" class=\"mCSB_dragger\" style=\"position: absolute; min-width: 30px; width: 0px; left: 0px;\"><div class=\"mCSB_dragger_bar\"></div></div><div class=\"mCSB_draggerRail\"></div></div></div></div></div>"
            ]);
        }

//        dispatch(new App\Jobs\Parsers\GetUsers());
//        dispatch(new App\Jobs\Parsers\GetOrders());
    }
}
