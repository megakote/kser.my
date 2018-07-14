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
    <link href="{{ asset('vendors/css/select2.css') }}" rel="stylesheet">

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
                        <form action="/search">
                            <input type="text" name="q" placeholder="Поиск по модели, артикулу, производителю и др."/>
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
                        <a href="/page/{{ $main_menu[0]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_01.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> плоттеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[1]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_02.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> принтеров и МФУ</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[2]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_03.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> сканеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[3]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_04.png" alt=""/>
                            </div>
                            <p>Ремонт<br/> шредеров</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[4]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_07.png" alt=""/>
                            </div>
                            <p>Абонентское<br/> обслуживание</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[5]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_05.png" alt=""/>
                            </div>
                            <p>Заправка<br/> картриджей</p>
                        </a>
                    </li>
                    <li>
                        <a href="/page/{{ $main_menu[6]->slug }}">
                            <div class="icon-box">
                                <img src="/img/icon_06.png" alt=""/>
                            </div>
                            <p>Покопийное<br/> обслуживание</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="return false">
                            <div class="icon-box">
                                <img src="/img/icon_08.png" alt=""/>
                            </div>
                            <p>Еще</p>
                        </a>
                        <ul class="inner-nav">
                            <li><a href="/page/{{ $main_menu[7]->slug }}">Ремонт счетчиков блокнот</a></li>
                            <li><a href="/page/{{ $main_menu[8]->slug }}">Обслуживание по договору</a></li>
                            <li><a href="/page/{{ $main_menu[9]->slug }}">Продажа картриджей</a></li>
                            <li><a href="/page/{{ $main_menu[10]->slug }}">Контакты</a></li>
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

<!-- /Content -->

    <!-- Section 9 - Main Page -->

    <section class="sect-9 grad-bg_2">
        <div class="row">
            <h2 class="white">Нужна консультация?<br /> Мы перезвоним в течение 5 минут</h2>
            <div class="callback-form_wrapp">
                <form class="form">
                    <input type="hidden" name="type" value="2">
                    <input type="hidden" name="description" value="Consultation">
                    <div class="callback-form clearfix">
                        <div class="left">
                            <div class="input_wrapp">
                                <i class="user-3"></i>
                                <input type="text" name="name" placeholder="Имя*">
                            </div>
                            <div class="input_wrapp">
                                <i class="phone-2"></i>
                                <input type="text" name="contact" placeholder="Номер телефона или e-mail*">
                            </div>
                        </div>
                        <div class="right">
                            <div class="input_wrapp">
                                <i class="doc-3"></i>
                                <textarea name="comment" placeholder="Текст вопроса "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="submit_wrapp align-center">
                        <button type="submit" class="yellow-pill">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
    <!-- /Section 9 - Main Page -->
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
                        <p>109518, Российская Федерация, г. Москва, ул. Грайвороновская, д.5, стр.1</p>
                    </div>
                </div>
                <div class="thumb-5">
                    <div class="col-1">
                        <i class="phone_2"></i>
                    </div>
                    <div class="col-2">
                        <p><a href="tel:88001006550" class="link-3">8 800 100 65 50</a></p>
                        <p>круглосуточная бесплатная линия</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-2 clearfix">
            <div class="left">
                <div class="col col-1">
                    <p class="copy">@2018, СЕРВИСПРИНТ</p>
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
                <p>ИНН: 7723752090</p>
                <p>ОГРН: 1107746217699</p>
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
                <p id="WorkStatusError"></p>
            </div>
            <div class="popup-form">
                <div class="input_wrapp input_wrapp_2">
                    <input type="text" id="WorkStatusId" placeholder="Серийный номер"/>
                </div>
                <div class="submit_wrapp">
                    <button type="button" id="WorkStatusBtn" class="blue-pill">Проверить</button>
                </div>
            </div>
        </div>
    </div>
    @if(isset($order_info))
    <div class="popup_wrapp scroll" style="display:block;" data-popup="popup_2" id="WorkStatusPopup">
        <div class="popup popup_2">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Статус заказа</h3>
            </div>
            <div class="slidings-boxes">
                @foreach($order->works as $work)
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
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="popup_wrapp scroll" data-popup="popup_3">
        <div class="popup popup_3">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Заказать звонок</h3>
            </div>
            <div class="popup-form">
                <form class="form">
                    <input type="hidden" name="type" value="2">
                    <input type="hidden" name="description" value="Callback">
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
                            <input type="text" name="login" placeholder="Логин*" required/>
                        </div>
                        <div class="input_wrapp">
                            <i class="lock"></i>
                            <input type="password" name="password" placeholder="Пароль*" required/>
                        </div>
                    </div>
                    <div class="align-center">
                        <a href="{{ route('password.request') }}" class="link-2">Забыли пароль?</a>
                    </div>
                    {{--<div class="soc-links_wrapp">
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
                    </div>--}}
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
    @if(Auth::user() && Auth::user()->client)
    <div class="popup_wrapp scroll popup_7_wrapp" data-popup ="popup_7">
        <div class="popup_bg"></div>
        <div class="popup popup_7">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Подать заявку</h3>
            </div>
            <div class="popup-form">
                <form id="addOrder">
                    <input type="hidden" name="type" value="10">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="input_wrapp input_wrapp_5">
                        <div class="select_wrapp">
                            <select name="face" data-placeholder = "Контактное лицо *">
                                @foreach(Auth::user()->client->faces as $face)
                                    <option value="{{ $face->id }}">{{ $face->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <div class="select_wrapp">
                            <select name="office" data-placeholder = "Доп. офис">
                                @foreach(Auth::user()->client->offices as $office)
                                    <option value="{{ $office->login }}">{{ $office->adress }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <input type="tel" name="tel" placeholder="Моб. телефон" value="{{ Auth::user()->client->tel? Auth::user()->client->tel:'' }}">
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <input type="text" name="mob_tel" placeholder="Гор. телефон">
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <input type="email" name="email" placeholder="E mail*" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <div class="select_wrapp">
                            <select name="works" data-placeholder= "Виды работ *">
                                <option value="Не выбрано">Не выбрано</option>
                                <option value="Совместимые">Совместимые</option>
                                <option value="Оригиналы">Оригиналы</option>
                                <option value="Ремонт">Ремонт</option>
                                <option value="Заправка(взятие)">Заправка(взятие)</option>
                                <option value="Замена брака">Замена брака</option>
                                <option value="Доставка документов">Доставка документов</option>
                                <option value="Другая задача">Другая задача</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <input type="text" name="apparat" placeholder="Аппарат">
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <textarea class="textarea_2" name="comment" placeholder="Описание неисправности *"></textarea>
                    </div>
                    <div class="input_wrapp input_wrapp_5">
                        <textarea name="address" placeholder="Адрес *" value="{{ Auth::user()->client->address? Auth::user()->client->address:'' }}"></textarea>
                    </div>
                    <div class="dates_input">
                        <label>Желаемая дата:</label>
                        <div class="dates_wrapp">
                            <div class="date_wrapp">
                                <p>с</p>
                                <input class="date_input" name="date_from" type="text" placeholder="22.12.2015">
                                <i class="calendar"></i>
                            </div>
                            <div class="date_wrapp">
                                <p>до</p>
                                <input class="date_input" name="date_to" type="text" placeholder="22.12.2016">
                                <i class="calendar"></i>
                            </div>
                        </div>
                    </div>
                    <p>Базовые сроки выполнения по условиям договора:<br />
                        Выезд мастера: до 2-х суток с момента обращения;
                        Поставка расходных материалов: 1-2 суток (при отсутствии независящих от поставщика причин);
                        Взятие на заправку - на следующий день после обращения (полный цикл заправки составляет
                        3-4 суток: на работы в цеху уходят сутки, отвоз заправленных происходит на
                        следующий день после выполнения работ).</p>
                    <div class="checkbox-4">
                        <input type="checkbox" required id="ord_ch_1" checked />
                        <label for="ord_ch_1">Согласен на обработку персональных данных</label>
                    </div>
                    <div class="submit_wrapp">
                        <button type="submit" class="blue-pill">Подать заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="popup_wrapp scroll" id="responsePopup" data-popup="popup_8">
        <div class="popup popup_5">
            <button type="button" class="close-popup"></button>
            <div class="popup-header">
                <h3>Внимание!</h3>
            </div>
            <div class="popup-form">
                <p id="responseText" style="font-size: 18px;"></p>
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
    <script type="text/javascript" src="{{ asset('vendors/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/js/rating.min.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoGWEyUlxHOSfMgm2TliQLggP3mej7d_I&callback=initMap"></script>

    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/additional_scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>

    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
        (function(){ var widget_id = 'VfrbmQCNUN';var d=document;var w=window;function l(){
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
    <!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
