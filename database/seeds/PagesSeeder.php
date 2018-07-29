<?php

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\MainPageSection;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 11; $i++){
            Page::create([
                'title' => $i,
            ]);
        }

        MainPageSection::create([
            'title' => "Приемущества",
            'body'  => "<div class=\"overflow_hidden\">
                <div class=\"thumbnails_1 offset-ziro\">
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"img/icon_11.png\" alt=\"\" />
                            </div>
                            <p>Бесплатная диагностика</p>
                            <div class=\"tooltip\">
                                <p>Бесплатная диагностика</p>
                            </div>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"img/icon_09.png\" alt=\"\" />
                            </div>
                            <p>Гарантия на<br /> все работы</p>
                            <div class=\"tooltip\">
                                <p>Гарантия на<br /> все работы</p>
                            </div>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"img/icon_12.png\" alt=\"\" />
                            </div>
                            <p>Программа лояльности</p>
                            <div class=\"tooltip\">
                                <p>Накапливайте баллы и получите<br /> <b>скидки от 10% до 50%</b><br /> на все наши услуги</p>
                            </div>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"img/icon_10.png\" alt=\"\" />
                            </div>
                            <p>Гарантия<br /> лучшей цены</p>
                            <div class=\"tooltip\">
                                <p>Гарантия<br /> лучшей цены</p>
                            </div>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"img/icon_13.png\" alt=\"\" />
                            </div>
                            <p>Дополнительные бесплатные услуги</p>
                            <div class=\"tooltip\">
                                <p>Дополнительные бесплатные услуги</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>"
        ]);

        MainPageSection::create([
            'title' => "Мы обслуживаем и ремонтируем",
            'body' => "<div class=\"overflow_hidden\">
                        <div class=\"thumbnails-2 offset-ziro\">
                            <div class=\"thumb-2\">
                                <div class=\"descript\">
                                    <ol>
                                        <li>Широкоформатные принтерые</li>
                                        <li>Принтеры</li>
                                    </ol>
                                </div>
                                <div class=\"img-box\">
                                    <img src=\"img/image_01.png\" alt=\"\" />
                                </div>
                            </div>
                            <div class=\"thumb-2\">
                                <div class=\"descript\">
                                    <ol>
                                        <li>Копиры</li>
                                        <li>МФУ</li>
                                        <li>Сканеры</li>
                                    </ol>
                                </div>
                                <div class=\"img-box\">
                                    <img src=\"img/image_02.png\" alt=\"\" />
                                </div>
                            </div>
                            <div class=\"thumb-2\">
                                <div class=\"descript\">
                                    <ol>
                                        <li>Плоттеры</li>
                                        <li>Шредеры</li>
                                        <li>Факсы</li>
                                        <li>И другую оргтехнику</li>
                                    </ol>
                                </div>
                                <div class=\"img-box\">
                                    <img src=\"img/image_03.png\" alt=\"\" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"buttons_wrapp_2\">
                        <a href=\"/Servis_print_presentation_4.pdf\" download class=\"transparent-pill_2 blue-pill_2\"><i class=\"doc-2\"></i>Смотреть презентацию</a>
                    </div>"
        ]);

        MainPageSection::create([
            'title' => "Цены на наши услуги",
            'body' => "<h2>Цены на наши услуги</h2>
            <p class=\"h-desc\"><b>Ремонт оргтехники и заправка картриджей</b> — выполняем ремонт и заправку принтеров таких марок, как: Canon (Кэнон), HP (Hewlett Packard), Samsung (Самсунг), Xerox (Ксерокс), Epson, Lexmark, Brother, Panasonic, OKI и моделей менее популярных производителей.</p>
"
        ]);

        MainPageSection::create([
            'title' => "Схема работы",
            'body' => "<div class=\"thumbnails-3 offset-ziro\">
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_14.png\" alt=\"\" />
                        </div>
                        <p>Вы вызываете мастера<br /> (или заказываете доставку)</p>
                    </div>
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_15.png\" alt=\"\" />
                        </div>
                        <p>Мастер производит диагностику и называет стоимость ремонта.</p>
                    </div>
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_16.png\" alt=\"\" />
                        </div>
                        <p>Выполняется ремонт с применением оригинальных деталей</p>
                    </div>
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_17.png\" alt=\"\" />
                        </div>
                        <p>Вы проверяете<br /> технику</p>
                    </div>
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_18.png\" alt=\"\" />
                        </div>
                        <p>Оплачиваете<br /> выставленный счет</p>
                    </div>
                    <div class=\"thumb-3\">
                        <div class=\"icon-box\">
                            <img src=\"img/icon_19.png\" alt=\"\" />
                        </div>
                        <p>Получаете отлично работающий аппарат</p>
                    </div>
                </div>"
        ]);
        MainPageSection::create([
            'title' => "О нас",
            'body' => "
            <h2 class=\"h2_2\">О нас</h2>
            <div class=\"article-2 clearfix\">
                <div class=\"left\">
                    <div class=\"slider-2\">
                        <div class=\"slide\">
                            <img src=\"img/sl_2.jpg\" alt=\"\" />
                        </div>
                        <div class=\"slide\">
                            <img src=\"img/sl_2.jpg\" alt=\"\" />
                        </div>
                        <div class=\"slide\">
                            <img src=\"img/sl_2.jpg\" alt=\"\" />
                        </div>
                        <div class=\"slide\">
                            <img src=\"img/sl_2.jpg\" alt=\"\" />
                        </div>
                        <div class=\"slide\">
                            <img src=\"img/sl_2.jpg\" alt=\"\" />
                        </div>
                    </div>
                </div>
                <div class=\"right\">
                    <img class=\"logo\" src=\"img/logo.png\" alt=\"\" />
                    <p>За эти годы  Мы накопили огромный опыт в сфере обслуживание офисной оргтехники, режущих плоттеров, широкоформатных плоттеров, ризографов, биндеров, лазерных и струйных принтеров, уничтожителей бумаги, мониторов, системных блоков и факсимильных аппаратов, а также заправки и восстановление картриджей.</p>
                    <ol>
                        <li>Честность и ответственность</li>
                        <li>Скорость (и оперативность)</li>
                        <li>Удобные услуги (удобство услуг)</li>
                        <li>Качество (работы)</li>
                        <li>Системность и командность</li>
                        <li>Постоянное развитие</li>
                    </ol>
                    <a href=\"#\" class=\"transparent-pill_2\">Больше о нас</a>
                </div>
            </div>"
        ]);
    }
}
