<?php

use Illuminate\Database\Seeder;
use App\Models\AboutPageAchievement;
use App\Models\AboutPageSection;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AboutPageSection::create([
            'title' => "Main Text",
            'body' => "
                    <p>Наша компания работает на рынке оптово-розничныхпродаж расходных материалов и запачстей к оргтехнике с <b>2009 года</b>. За это время мы зарекомендовали себя надежным партнером для большого числа заказчиков совершенно разного уровня. Нашими клиентами являются розничные покупатели, гос.копании, банки, региональные сети, тендерные заказчики и региональные партнеры. Прайс-лист нашего интернет-магазина насчитывает более 10000 наименований товаров.</p>

                    <p>Мы являемся партнерами таких компаний как <b>HP, Canon, Xerox, Epson, Brother, Lexmark, Oki, Panasonic, Kyocera, Mita, Ricoh, Samsung, Sharp, Konica, Minolta, Toshiba</b> и др., в продаже имеется как оригинальная, так и высококачественная совместимая продукция таких брендов, как <b>Cactus, Булат, Fuji, Katun, Mitsubishi, AQC, TTI, Tonex, Integral, Imagine Graphics, Print Rite, Fullmark</b>.</p>

                    <p>В подходе к работе мы с самого начала сделали ставку на инновации и современные технологии. Шаг за шагом нами была создана информационная система, выстроена эффективная логистика, складская система и веб-сервис. Все это позволяет нам одновременно выполнять большое количество задач, отслеживать и контролировать все этапы выполнения работ: <b>от оформления заявки, до выполнения заказа, включая закупку, хранение, доставку и прочие этапы</b></p>
            "
        ]);

        AboutPageSection::create([
            'title' => "Философия и Цели",
            'body' => "                <div class=\"thumbnails-8_wrapp\">

                    <h2>Наша философия</h2>

                    <div class=\"overflow_hidden\">
                        <div class=\"thumbnails-8 offset-ziro\">
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Миссия</h3>
                                </div>
                                <p>В процессе инвентаризации показать фактическое настоящее и исключить проблемы в будущем. Донести клиенту удобство независимой инвентаризации, а партнеру по бизнесу – возможность развития в сфере услуг.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Цель</h3>
                                </div>
                                <p>Создать долгосрочное качественное партнерство на основе гарантированно эффективных решений в инвентаризации.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class=\"thumbnails-8_wrapp\">

                    <h2>Наши принципы</h2>

                    <div class=\"overflow_hidden\">
                        <div class=\"thumbnails-8 offset-ziro\">
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Совесть (этика)</h3>
                                </div>
                                <p>Наша компания работает на рынке оптово-розничныхпродаж расходных материалов и запачстей к оргтехнике с <b>2009 года</b>.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Технологии</h3>
                                </div>
                                <p>Запас расходных материалов поддерживается как в офисе заказчика, в отведенном для этого месте, так и на складе поставщика.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Удобные услуги</h3>
                                </div>
                                <p>Сотрудники обслуживающей компании отвечают за прием заявок, организацию выполнения всех работ, отслеживание хода работ, заказ и доставку расходных материалов и запчастей.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Качество работы</h3>
                                </div>
                                <p>Сервисные инженеры по распорядку утвержденному в регламенте обслуживания проводят регулярную диагностику и профилактику всего парка техники.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Скорость</h3>
                                </div>
                                <p>В подходе к работе мы с самого начала сделали ставку на инновации и современные технологии.</p>
                            </div>
                            <div class=\"thumb-8\">
                                <div class=\"thumb-8_title\">
                                    <h3>Постоянное развитие</h3>
                                </div>
                                <p>Поставщик может предоставлять технику в аренду, в этом случае стоимость аренды будет заложена в стоимости отпечатка.</p>
                            </div>
                        </div>
                    </div>

                </div>"
        ]);

        AboutPageSection::create([
            'title' => "В своей работе мы используем",
            'body' => "            <h2>В своей работе мы используем</h2>

            <div class=\"overflow_hidden\">
                <div class=\"thumbnails_1 thumbnails_1_2 no-tooltip offset-ziro\">
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_26.png\" alt=\"\" />
                            </div>
                            <p>Корпоративную информационную систему</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_25.png\" alt=\"\" />
                            </div>
                            <p>Слаженную<br /> работу коллектива</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_24.png\" alt=\"\" />
                            </div>
                            <p>Многоуровневый контроль</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_23.png\" alt=\"\" />
                            </div>
                            <p>Специалисты<br /> высокого уровня</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_22.png\" alt=\"\" />
                            </div>
                            <p>Накопленные<br /> знания и опыт</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_20.png\" alt=\"\" />
                            </div>
                            <p>Интерактивный сайт<br /> интегрированный с B2B</p>
                        </div>
                    </div>
                    <div class=\"thumb-1\">
                        <div class=\"inner\">
                            <div class=\"icon-box\">
                                <img src=\"/img/icon_21.png\" alt=\"\" />
                            </div>
                            <p>Оригинальные<br /> запчасти</p>
                        </div>
                    </div>
                </div>
            </div>"
        ]);

        AboutPageSection::create([
            'title' => "Это дает нам возможность",
            'body' => "<h2>Это дает нам возможность</h2>

            <ul class=\"list-2 clearfix\">
                <li>Вести точный учет и решать одновременно большое количество задач</li>
                <li>Работать с высоким уровнем эффективности и профессионализма</li>
                <li>Подразделениями компании</li>
                <li>Добиваться качества</li>
                <li>Ремонтировать практически любую печатающую технику</li>
                <li>Работать с высоким уровнем эффективности и профессионализма</li>
            </ul>"
        ]);

        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_25.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_26.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_27.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_24.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_27.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_24.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_27.jpg'
        ]);
        AboutPageAchievement::create([
            'title' => 'Managment System Certificate',
            'image' => '/img/362_24.jpg'
        ]);

    }
}
