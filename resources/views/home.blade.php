@extends('layouts.app')

@section('content')
    <!-- Section 1 - Promo Section - Main Page -->

    <section class="promo-section">
        <div class="row">
            <div class="promo-article clearfix">
                <div class="left">
                    <div class="promo-slider">
                        @foreach($slider as $slide)
                            <div class="slide">
                                <h3>{{ $slide->title }}</h3>
                                <p>{{ $slide->description }}</p>
                                <img src="{{ $slide->image }}" alt="{{ $slide->title }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right clearfix">
                    <div class="form_wrapp">
                        <form class="form">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="description" value="Consultation">
                            <h3>Оформите заявку онлайн и получите скидку 5% на работу мастера</h3>
                            <div class="input_wrapp">
                                <i class="user-2"></i>
                                <input type="text" name="name" placeholder="Имя*" />
                            </div>
                            <div class="input_wrapp">
                                <i class="tel"></i>
                                <input type="tel" name="contact" placeholder="Номер телефона или e-mail*" />
                            </div>
                            <div class="input_wrapp">
                                <i class="doc"></i>
                                <textarea name="comment" placeholder="Текст вопроса "></textarea>
                            </div>
                            <p>Мы свяжемся с Вами в течение 5 минут</p>
                            <div class="submit_wrapp">
                                <button type="submit" class="blue-pill">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Section 1 - Promo Section - Main Page -->

    <!-- Section 2 - Main Page -->

    <section>
        <div class="row">

            <div class="overflow_hidden">
                <div class="thumbnails_1 offset-ziro">
                    <div class="thumb-1">
                        <div class="inner">
                            <div class="icon-box">
                                <img src="img/icon_11.png" alt="" />
                            </div>
                            <p>Бесплатная диагностика</p>
                            <div class="tooltip">
                                <p>Бесплатная диагностика</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-1">
                        <div class="inner">
                            <div class="icon-box">
                                <img src="img/icon_09.png" alt="" />
                            </div>
                            <p>Гарантия на<br /> все работы</p>
                            <div class="tooltip">
                                <p>Гарантия на<br /> все работы</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-1">
                        <div class="inner">
                            <div class="icon-box">
                                <img src="img/icon_12.png" alt="" />
                            </div>
                            <p>Программа лояльности</p>
                            <div class="tooltip">
                                <p>Накапливайте баллы и получите<br /> <b>скидки от 10% до 50%</b><br /> на все наши услуги</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-1">
                        <div class="inner">
                            <div class="icon-box">
                                <img src="img/icon_10.png" alt="" />
                            </div>
                            <p>Гарантия<br /> лучшей цены</p>
                            <div class="tooltip">
                                <p>Гарантия<br /> лучшей цены</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-1">
                        <div class="inner">
                            <div class="icon-box">
                                <img src="img/icon_13.png" alt="" />
                            </div>
                            <p>Дополнительные бесплатные услуги</p>
                            <div class="tooltip">
                                <p>Дополнительные бесплатные услуги</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- /Section 2 - Main Page -->

    <!-- Section 3 - Main Page -->

    <section class="sect-3 grad-bg_2">

        <img class="bg_shape bg_shape_1" src="img/shape_5.png" alt="" />
        <img class="bg_shape bg_shape_2" src="img/shape_5.png" alt="" />
        <img class="bg_shape bg_shape_3" src="img/shape_5.png" alt="" />
        <img class="bg_shape bg_shape_4" src="img/shape_5.png" alt="" />
        <img class="bg_shape bg_shape_5" src="img/shape_5.png" alt="" />
        <img class="bg_shape bg_shape_6" src="img/shape_5.png" alt="" />

        <div class="row">

            <h2 class="white">Мы обслуживаем и ремонтируем</h2>

            <div class="article-1">
                <div class="col-1">
                    <div class="overflow_hidden">
                        <div class="thumbnails-2 offset-ziro">
                            <div class="thumb-2">
                                <div class="descript">
                                    <ol>
                                        <li>Широкоформатные принтерые</li>
                                        <li>Принтеры</li>
                                    </ol>
                                </div>
                                <div class="img-box">
                                    <img src="img/image_01.png" alt="" />
                                </div>
                            </div>
                            <div class="thumb-2">
                                <div class="descript">
                                    <ol>
                                        <li>Копиры</li>
                                        <li>МФУ</li>
                                        <li>Сканеры</li>
                                    </ol>
                                </div>
                                <div class="img-box">
                                    <img src="img/image_02.png" alt="" />
                                </div>
                            </div>
                            <div class="thumb-2">
                                <div class="descript">
                                    <ol>
                                        <li>Плоттеры</li>
                                        <li>Шредеры</li>
                                        <li>Факсы</li>
                                        <li>И другую оргтехнику</li>
                                    </ol>
                                </div>
                                <div class="img-box">
                                    <img src="img/image_03.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons_wrapp_2">
                        <a href="/Servis_print_presentation_4.pdf" class="transparent-pill_2 blue-pill_2"><i class="doc-2"></i>Смотреть презентацию</a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-2_wrapp">
                        <div class="form-header">
                            <h3>Интересует постоянное обслуживание вашей техники для ее бесперебойной работы?</h3>
                        </div>
                        <p>Оставьте свои контакты и мы вышлем вам выгодное индивидуаульное предложение</p>
                        <div class="form-2">
                            <form class="form">
                                <input type="hidden" name="type" value="2">
                                <input type="hidden" name="description" value="Offer">
                                <div class="input_wrapp">
                                    <i class="envelop-2"></i>
                                    <input type="email" name="contact" placeholder="Ваш e-mail" />
                                </div>
                                <div class="submit_wrapp">
                                    <button type="submit" class="yellow-pill">Заказать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- /Section 3 - Main Page -->

    <!-- Section 4 - Main Page -->

    <section class="sect-4 grey-bg">

        <img class="bg_shape bg_shape_7" src="img/shape_2.png" alt="" />
        <img class="bg_shape bg_shape_8" src="img/shape_2.png" alt="" />

        <div class="row">

            <h2>Цены на наши услуги</h2>
            <p class="h-desc"><b>Ремонт оргтехники и заправка картриджей</b> — выполняем ремонт и заправку принтеров таких марок, как: Canon (Кэнон), HP (Hewlett Packard), Samsung (Самсунг), Xerox (Ксерокс), Epson, Lexmark, Brother, Panasonic, OKI и моделей менее популярных производителей.</p>

            <div class="tabs">
                <div class="tabs-links offset-ziro">
                    @foreach($pricesTabs as $tab)
                        <label class="tab-link" for="tab_{{ $tab->id }}">{{ $tab->title }}</label>
                    @endforeach
                </div>
                <div class="tabs-content">
                    @foreach($pricesTabs as $tab)
                        <input type="radio" name="tabs" data-title="{{ $tab->title }}" class="radio-tab" id="tab_{{ $tab->id }}">
                        <div class="tab">
                            {!! $tab->body !!}
                        </div>
                    @endforeach
                </div>
                <div class="align-center">
                    <a href="#" class="yellow-pill">Заказать</a>
                </div>
            </div>

        </div>
    </section>

    <!-- /Section 4 - Main Page -->

    <!-- Section 5 - Main Page -->

    <section class="sect-5">
        <img class="bg_shape bg_shape_9" src="img/shape_2.png" alt="" />
        <img class="bg_shape bg_shape_10" src="img/shape_3.png" alt="" />
        <img class="bg_shape bg_shape_11" src="img/shape_2.png" alt="" />
        <div class="row">
            <h2>Схема работы</h2>
            <div class="overflow_hidden">
                <div class="thumbnails-3 offset-ziro">
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_14.png" alt="" />
                        </div>
                        <p>Вы вызываете мастера<br /> (или заказываете доставку)</p>
                    </div>
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_15.png" alt="" />
                        </div>
                        <p>Мастер производит диагностику и называет стоимость ремонта.</p>
                    </div>
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_16.png" alt="" />
                        </div>
                        <p>Выполняется ремонт с применением оригинальных деталей</p>
                    </div>
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_17.png" alt="" />
                        </div>
                        <p>Вы проверяете<br /> технику</p>
                    </div>
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_18.png" alt="" />
                        </div>
                        <p>Оплачиваете<br /> выставленный счет</p>
                    </div>
                    <div class="thumb-3">
                        <div class="icon-box">
                            <img src="img/icon_19.png" alt="" />
                        </div>
                        <p>Получаете отлично работающий аппарат</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Section 5 - Main Page -->

    <!-- Section 6 - Main Page -->

    <section class="sect-6 grey-bg">
        <img class="bg_shape bg_shape_12" src="img/shape_4.png" alt="" />
        <img class="bg_shape bg_shape_13" src="img/shape_3.png" alt="" />
        <img class="bg_shape bg_shape_14" src="img/shape_6.png" alt="" />
        <img class="bg_shape bg_shape_15" src="img/shape_7.png" alt="" />
        <img class="bg_shape bg_shape_16" src="img/shape_7.png" alt="" />
        <img class="bg_shape bg_shape_17" src="img/shape_7.png" alt="" />
        <img class="bg_shape bg_shape_18" src="img/shape_7.png" alt="" />
        <div class="row">
            <h2>О нас говорят</h2>
            <div class="testimonial-sl">
                @foreach($feedback as $feedback_item)
                    <div class="slide">
                        <div class="testimonial">
                            <div class="logo-box">
                                <img src="{{ $feedback_item->logo }}" alt="" />
                            </div>
                            <h3>{{ $feedback_item->name }}</h3>
                            <ul class="info">
                                <li><i class="data"></i>{{ $feedback_item->created_at->diffForHumans() }}</li>
                                <li><i class="map-mark_2"></i>{{ $feedback_item->city }}</li>
                            </ul>
                            <div class="descript">
                                {{ $feedback_item->body }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="align-center">
                <a href="{{ route('feedback') }}" class="yellow-pill more_btn">Все отзывы</a>
            </div>
        </div>
    </section>

    <!-- /Section 6 - Main Page -->

    <!-- Section 7 - Main Page -->

    <section class="sect-7 grad-bg">
        <img class="bg_shape bg_shape_19" src="img/shape_4.png" alt="">
        <img class="bg_shape bg_shape_20" src="img/shape_3.png" alt="">
        <img class="bg_shape bg_shape_21" src="img/shape_7.png" alt="">
        <div class="row">
            <h2 class="h2_2">О нас</h2>
            <div class="article-2 clearfix">
                <div class="left">
                    <div class="slider-2">
                        <div class="slide">
                            <img src="img/sl_2.jpg" alt="" />
                        </div>
                        <div class="slide">
                            <img src="img/sl_2.jpg" alt="" />
                        </div>
                        <div class="slide">
                            <img src="img/sl_2.jpg" alt="" />
                        </div>
                        <div class="slide">
                            <img src="img/sl_2.jpg" alt="" />
                        </div>
                        <div class="slide">
                            <img src="img/sl_2.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="right">
                    <img class="logo" src="img/logo.png" alt="" />
                    <p>За эти годы  Мы накопили огромный опыт в сфере обслуживание офисной оргтехники, режущих плоттеров, широкоформатных плоттеров, ризографов, биндеров, лазерных и струйных принтеров, уничтожителей бумаги, мониторов, системных блоков и факсимильных аппаратов, а также заправки и восстановление картриджей.</p>
                    <ol>
                        <li>Честность и ответственность</li>
                        <li>Скорость (и оперативность)</li>
                        <li>Удобные услуги (удобство услуг)</li>
                        <li>Качество (работы)</li>
                        <li>Системность и командность</li>
                        <li>Постоянное развитие</li>
                    </ol>
                    <a href="#" class="transparent-pill_2">Больше о нас</a>
                </div>
            </div>

        </div>
    </section>

    <!-- /Section 7 - Main Page -->

    <!-- Section 8 - Main Page -->

    <section class="sect-8">
        <div class="row">
            <h2>Это наши Клиенты</h2>
            <div class="clients-sl">
                @foreach($clients as $client)
                    <div class="slide">
                        <a href="{{ $client->link }}" class="thumb-4">
                            <img src="{{ $client->logo }}" alt="{{ $client->name }}" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- /Section 8 - Main Page -->
@endsection
