@extends('layouts.app')

@section('content')
    <!-- Section 1 - About Page -->

    <section class="sect-1_2">

        <img class="bg_shape bg_shape_35" src="/img/shape_2.png" alt="" />
        <img class="bg_shape bg_shape_36" src="/img/shape_16.png" alt="" />
        <img class="bg_shape bg_shape_37" src="/img/shape_17.png" alt="" />
        <img class="bg_shape bg_shape_38" src="/img/shape_18.png" alt="" />
        <img class="bg_shape bg_shape_39" src="/img/shape_19.png" alt="" />
        <img class="bg_shape bg_shape_40" src="/img/shape_20.png" alt="" />
        <img class="bg_shape bg_shape_41" src="/img/shape_21.png" alt="" />

        <div class="row">

            <div class="breadcrumbs_wrapp">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a href="#">О Нас</a></li>
                </ul>
            </div>

            <h1>О нас</h1>

            <div class="article-3 clearfix">
                <div class="left">
                    <div class="img-box">
                        <img src="/img/about.jpg" alt="">
                    </div>
                </div>
                <div class="right">
                    {{ $sections[0]->body }}
                </div>
            </div>

            <div class="align-center">
                <a href="#" class="yellow-pill yellow-pill_2 show_popup" data-popup-name="popup_12">Написать руководителю</a>
            </div>

            <div>

                {{ $sections[1]->body }}

            </div>

            <div class="blue-pill_3_wrapp align-center">
                <a href="/Servis_print_presentation_4.pdf" download class="blue-pill blue-pill_3"><i class="doc-3"></i>Смотреть презентацию</a>
            </div>

            {{ $sections[2]->body }}

            {{ $sections[3]->body }}

        </div>

    </section>

    <!-- /Section 1 - About Page -->

    <!-- Section 2 - About Page -->

    <section class="sect-2_2 grey-bg">

        <img class="bg_shape bg_shape_42" src="/img/shape_22.png" alt="" />
        <img class="bg_shape bg_shape_43" src="/img/shape_23.png" alt="" />

        <div class="row">

            <h2>Наши достижения</h2>

            <div class="slider_3">
                @foreach($achievements as $achievement)
                    <div class="slide">
                        <a href="{{ $achievement->image }}" class="sertificate" data-popup-name = "popup_8">
                            <div class="green-icon"></div>
                            <div class="img-box">
                                <img src="{{ $achievement->image }}" alt="" />
                            </div>
                            <p>{{ $achievement->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Section 2 - About Page -->

    <!-- Section 3 - About Page -->
{{--
    <section class="sect-3_2">
        <div class="row">

            <h2 class="white">Наш коллектив</h2>

            <div class="overflow_hidden">
                <div class="thumbnails-9 offset-ziro">
                    <div class="thumb-9">
                        <div class="col-1">
                            <div class="img-box">
                                <img src="/img/team_01.jpg">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="thumb_title">
                                <h3>Артем Герасимов</h3>
                                <p>Руководитель департамента продаж</p>
                            </div>
                            <div class="description">
                                <p><b>12</b>-летний стаж управления бизнесом. <b>3</b> динамично развивающихся компании.</p>
                                <p><b>15</b> проведенных вебинаров.</p>
                                <p><b>7</b> выступлений на бизнес-конференциях в роли спикера.</p>
                            </div>
                            <div class="align-right">
                                <a href="#" class="yellow-pill">Написать</a>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-9">
                        <div class="col-1">
                            <div class="img-box">
                                <img src="/img/team_02.jpg">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="thumb_title">
                                <h3>Олег Винников</h3>
                                <p>Руководитель технического департамента</p>
                            </div>
                            <div class="description">
                                <p>Разработал <b>на базе 1C</b> и запатентовал <b>ПО для ORRLA</b>.</p>
                                <p><b>24367</b> проведенных технически контролируемых инв. смен.</p>
                                <p><b>5632</b> вовремя выявленных и ликвидированных ошибки.</p>
                                <p><b>24 часа</b> в сутки на связи.</p>
                            </div>
                            <div class="align-right">
                                <a href="#" class="yellow-pill">Написать</a>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-9">
                        <div class="col-1">
                            <div class="img-box">
                                <img src="/img/team_03.jpg">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="thumb_title">
                                <h3>Герман кеп</h3>
                                <p>Главный инженер</p>
                            </div>
                            <div class="description">
                                <p class="italic">«Мы накопили огромный опыт в сфере обслуживание офисной оргтехники»</p>
                                <ol>
                                    <li>Честность</li>
                                    <li>Скорость</li>
                                    <li>Удобные услуги</li>
                                </ol>
                            </div>
                            <div class="align-right">
                                <a href="#" class="yellow-pill">Написать</a>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-9">
                        <div class="col-1">
                            <div class="img-box">
                                <img src="/img/team_04.jpg">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="thumb_title">
                                <h3>Максим Пономаренко</h3>
                                <p>Главный инженер</p>
                            </div>
                            <div class="description">
                                <p class="italic">«Мы накопили огромный опыт в сфере обслуживание офисной оргтехники»</p>
                                <ol>
                                    <li>Честность</li>
                                    <li>Скорость</li>
                                    <li>Удобные услуги</li>
                                </ol>
                            </div>
                            <div class="align-right">
                                <a href="#" class="yellow-pill">Написать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
--}}
    <!-- /Section 3 - About Page -->
@endsection