<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="{{ asset('responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="favicon/favicon.ico" sizes="16x16">
</head>
<body>
<div class="wrapper">
<!-- Header -->
<header>
    <div class="header-row row-1 resp-fixed">
        <div class="row clearfix">
            <div class="left">
                <div class="nav-1_wrapp main-nav_wrapp">
                    <div class="append-elem" data-append-elem="2"></div>
                    <div class="append-elem align-center" data-append-elem="4"></div>
                    <ul class="nav-1 main-nav">
                        @foreach($menu_header as $item)
                            <li><a href="{{ $item->url }}" {{ (request()->path() == $item->url) ? 'class="active"' : '' }}>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                    <div class="append-elem align-center" data-append-elem="3"></div>
                </div>
                <div class="append-elem logo-resp" data-append-elem="1"></div>
            </div>
            <div class="right">
                <div class="buttons_wrapp append-elem" data-append-desktop-elem="4" data-min-screen="768">
                    @auth
                        <a href="{{ route('lk') }}" class="grey-pill"><i class="user"></i>Личный кабинет</a>
                    @else
                        <a href="#" class="grey-pill show_popup" data-popup-name="popup_4"><i class="user"></i>Вход /
                            регистрация</a>
                    @endauth
                    <a href="#" class="blue-pill show_popup" data-popup-name="popup_1">Узнать статус ремонта</a>
                </div>
                <button class="respmenubtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <button type="button" class="respsidebar_show">ОТКРЫТЬ МЕНЮ</button>
    </div>
    <div class="header-row row-2">
        <div class="row clearfix">
            <div class="col-1 left">
                <div class="append-elem" data-append-desktop-elem="1" data-min-screen="1124">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="/img/logo.png" alt=""/>
                    </a>
                </div>
            </div>
            <div class="col-2 left">
                <div class="append-elem" data-append-desktop-elem="2" data-min-screen="768">
                    <div class="search_wrapp">
                        <form>
                            <input type="text" placeholder="Поиск по модели, артикулу, производителю и др."/>
                            <button type="button" class="search-btn"></button>
                        </form>
                    </div>
                </div>
                <div class="overflow_hidden">
                    <ul class="contacts-list">
                        <li><i class="clock"></i>Пн-пт 8.00-18.00</li>
                        <li><i class="envelop"></i><a href="mailto:abc@print.ru">abc@print.ru</a></li>
                        <li><i class="map-mark"></i>Ваш город <a href="#" class="link-2 show_popup"
                                                                 data-popup-name="popup_6">Москва</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-3 left">
                <div class="append-elem" data-append-desktop-elem="3" data-min-screen="768">
                    <a href="tel:88001006550" class="tel-link">8(800) 100-65-50</a><br/>
                    <a href="#" class="transparent-pill show_popup" data-popup-name="popup_3">Заказать звонок</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-row row-3 active" id="respsidebar">
        <button type="button" class="respsidebar_hide">СКРЫТЬ МЕНЮ</button>
        <div class="row">
            <div class="nav-2_wrapp">
                <ul class="nav-2">
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_01.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> плоттеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_02.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> принтеров и МФУ</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_03.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> сканеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_04.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> шредеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_07.png" alt=""/>
                            </div>
                            <p>Абонентское<br/> обслуживание</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_05.png" alt=""/>
                            </div>
                            <p>Заправка<br/> картриджей</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_06.png" alt=""/>
                            </div>
                            <p>Покопийное<br/> обслуживание</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <img src="/img/icon_08.png" alt=""/>
                            </div>
                            <p>Еще</p>
                        </a>
                        <ul class="inner-nav">
                            <li><a href="#">Ремонт счетчиков блокнот</a></li>
                            <li><a href="#">Обслуживание по договору</a></li>
                            <li><a href="#">Продажа картриджей</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
<!-- /Header -->

<!-- Content -->
<div class="content">
@yield('content')
</div>
<!-- /Content -->


<!-- Footer -->
<footer>

    <div class="footer">
        <div class="row row-1 clearfix">
            <div class="left clearfix">
                <div class="col-1">
                    <ul class="seo-text">
                        @foreach($menu_footer1 as $item)
                            <li><a href="{{ $item->url }}" {{ (request()->path() == $item->url) ? 'class="active"' : '' }}>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-2">
                    <ul class="seo-text seo-text_2">
                        @foreach($menu_footer2 as $item)
                            <li><a href="{{ $item->url }}" {{ (request()->path() == $item->url) ? 'class="active"' : '' }}>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="thumb-5">
                    <div class="col-1">
                        <i class="map-mark_2"></i>
                    </div>
                    <div class="col-2">
                        <p>123123 Российская Федерация, г. Москва, ул. Ленина, д. 121</p>
                    </div>
                </div>
                <div class="thumb-5">
                    <div class="col-1">
                        <i class="phone_2"></i>
                    </div>
                    <div class="col-2">
                        <p><a href="tel:88001231212" class="link-3">8 800 123 12 12 </a></p>
                        <p>круглосуточная бесплатная линия</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-2 clearfix">
            <div class="left">
                <div class="col col-1">
                    <p class="copy">@2017, СЕРВИСПРИНТ</p>
                </div>
                <div class="col overflow_hidden">
                    <ul class="soc-links">
                        <li><a href=""><img src="/img/vk.png" alt="" /></a></li>
                        <li><a href=""><img src="/img/twitter.png" alt="" /></a></li>
                        <li><a href=""><img src="/img/youtube.png" alt="" /></a></li>
                        <li><a href=""><img src="/img/instagram.png" alt="" /></a></li>
                        <li><a href=""><img src="/img/facebook.png" alt="" /></a></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <p>ИНН 123123123</p>
                <p>ЕГРЮЛ 123123123</p>
            </div>
        </div>
    </div>

</footer>
<!-- /Footer -->

</div>
<!-- Popups -->

    <div class="popup_wrapp scroll" data-popup="popup_1">
        <div class="popup">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Узнать статус<br/> заказа</h3>
                <p>Узнайте, на каком этапе находится ремонт вашей техники! Просто введите серийный номер, который
                    указано в сервисной квитанции</p>
            </div>
            <div class="popup-form">
                <div class="input_wrapp input_wrapp_2">
                    <input type="text" placeholder="Серийный номер"/>
                </div>
                <div class="submit_wrapp">
                    <button type="button" class="blue-pill">Проверить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="popup_wrapp scroll" data-popup="popup_2">
        <div class="popup popup_2">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Статус заказа</h3>
            </div>
            <div class="slidings-boxes">
                <div class="sliding_wrapp">
                    <div class="sliding-header">
                        <div class="cell cell-1">
                            <p>Заказ</p>
                        </div>
                        <div class="cell cell-2">
                            <p>№ 04978406-0081</p>
                        </div>
                        <div class="cell cell-3">
                            <p>08 марта 2012</p>
                        </div>
                        <div class="cell cell-4">
                            <p>открытый</p>
                        </div>
                        <button type="button" class="slide-btn"></button>
                    </div>
                    <div class="sliding-box">
                        <div class="cell cell-1">
                            <p>Установка и настройка Windows Server</p>
                        </div>
                        <div class="cell cell-2">
                            <p>346 р</p>
                        </div>
                    </div>
                </div>
                <div class="sliding_wrapp">
                    <div class="sliding-header">
                        <div class="cell cell-1">
                            <p>Заказ</p>
                        </div>
                        <div class="cell cell-2">
                            <p>№ 04978406-0081</p>
                        </div>
                        <div class="cell cell-3">
                            <p>08 марта 2012</p>
                        </div>
                        <div class="cell cell-4">
                            <p>открытый</p>
                        </div>
                        <button type="button" class="slide-btn"></button>
                    </div>
                    <div class="sliding-box">
                        <div class="cell cell-1">
                            <p>Установка и настройка Windows Server</p>
                        </div>
                        <div class="cell cell-2">
                            <p>346 р</p>
                        </div>
                    </div>
                </div>
                <div class="sliding_wrapp">
                    <div class="sliding-header">
                        <div class="cell cell-1">
                            <p>Заказ</p>
                        </div>
                        <div class="cell cell-2">
                            <p>№ 04978406-0081</p>
                        </div>
                        <div class="cell cell-3">
                            <p>08 марта 2012</p>
                        </div>
                        <div class="cell cell-4">
                            <p>открытый</p>
                        </div>
                        <button type="button" class="slide-btn"></button>
                    </div>
                    <div class="sliding-box">
                        <div class="cell cell-1">
                            <p>Установка и настройка Windows Server</p>
                        </div>
                        <div class="cell cell-2">
                            <p>346 р</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup_wrapp scroll" data-popup="popup_3">
        <div class="popup popup_3">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Заказать звонок</h3>
            </div>
            <div class="popup-form">
                <form class="form">
                    <input type="hidden" name="type" value="1">
                    <div class="input_wrapp">
                        <i class="user-2"></i>
                        <input type="text" name="name" placeholder="Имя*"/>
                    </div>
                    <div class="input_wrapp">
                        <i class="tel"></i>
                        <input type="tel" name="contact" placeholder="Номер телефона или e-mail*"/>
                    </div>
                    <div class="input_wrapp">
                        <i class="doc"></i>
                        <textarea name="comment" placeholder="Текст вопроса "></textarea>
                    </div>
                    <div class="submit_wrapp">
                        <button type="submit" class="blue-pill">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="popup_wrapp scroll" data-popup="popup_4">
        <div class="popup popup_4">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Вход</h3>
            </div>
            <div class="popup-form">
                <form id="auth" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="inputs_wrapp">
                        <div class="input_wrapp">
                            <i class="envelop-3"></i>
                            <input type="email" name="email" placeholder="Email*" required/>
                        </div>
                        <div class="input_wrapp">
                            <i class="lock"></i>
                            <input type="password" name="password" placeholder="Пароль*" required/>
                        </div>
                    </div>
                    <div class="align-center">
                        <a href="{{ route('password.request') }}" class="link-2">Забыли пароль?</a>
                    </div>
                    <div class="soc-links_wrapp">
                        <div class="col">
                            <p>Войти через:</p>
                        </div>
                        <div class="col overflow_hidden">
                            <ul class="soc-links">
                                <li><a href=""><img src="/img/vk.png" alt=""/></a></li>
                                <li><a href=""><img src="/img/twitter.png" alt=""/></a></li>
                                <li><a href=""><img src="/img/facebook.png" alt=""/></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="submit_wrapp">
                        <button type="submit" class="blue-pill">Войти</button>
                        <a href="{{ route('register') }}" class="transparent-pill_2">Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="popup_wrapp scroll" data-popup="popup_5">
        <div class="popup popup_5">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Регистрация</h3>
            </div>
            <div class="popup-form">
                <form class="form">
                    <input type="hidden" name="type" value="3">
                    <div class="inputs_wrapp">
                        <div class="input_wrapp">
                            <i class="user-2"></i>
                            <input type="email" placeholder="Имя*"/>
                        </div>
                        <div class="input_wrapp">
                            <i class="envelop-3"></i>
                            <input type="email" placeholder="Email*"/>
                        </div>
                        <div class="input_wrapp">
                            <i class="lock"></i>
                            <input type="password" placeholder="Пароль*"/>
                        </div>
                        <div class="input_wrapp">
                            <i class="lock"></i>
                            <input type="password" placeholder="Повторите пароль*"/>
                        </div>
                    </div>
                    <div class="soc-links_wrapp">
                        <div class="col">
                            <p>Войти через:</p>
                        </div>
                        <div class="col overflow_hidden">
                            <ul class="soc-links">
                                <li><a href=""><img src="/img/vk.png" alt=""/></a></li>
                                <li><a href=""><img src="/img/twitter.png" alt=""/></a></li>
                                <li><a href=""><img src="/img/facebook.png" alt=""/></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="submit_wrapp">
                        <button type="submit" class="blue-pill">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="popup_wrapp scroll" data-popup="popup_6">
        <div class="popup popup_5">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>выбрать город</h3>
            </div>
            <div class="popup-form">
                <form>
                    <div class="cities-box scroll">
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_01">
                            <label for="city_01">Москва</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_02">
                            <label for="city_02">Нижний Новгород</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_03">
                            <label for="city_03">Новосибирск</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_04">
                            <label for="city_04">Красноярск</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_05">
                            <label for="city_05">Ростов-на-Дону</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_06">
                            <label for="city_06">Тюмень</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_07">
                            <label for="city_07">Самара</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_08">
                            <label for="city_08">Хабаровск</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_09">
                            <label for="city_09">Город</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_10">
                            <label for="city_10">Город</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="cicty" id="city_11">
                            <label for="city_11">Город</label>
                        </div>
                    </div>
                    <div class="submit_wrapp">
                        <button type="submit" class="blue-pill">Выбрать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /Popups -->
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('vendors/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/js/smoothscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/js/swipe.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/js/jquery.maskedinput.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/additional_scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>

</body>
</html>
