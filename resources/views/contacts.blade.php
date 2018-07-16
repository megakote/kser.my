@extends('layouts.app')

@section('content')
    <!-- Section 1 Contacts -->

    <section class="contacts_sect grey-bg">

        <img class="bg_shape bg_shape_33" src="img/shape_14.png" alt="">
        <img class="bg_shape bg_shape_34" src="img/shape_15.png" alt="">

        <div class="row">

            <div class="breadcrumbs_wrapp">
                <ul class="breadcrumbs">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Адреса сервисных центров</a></li>
                </ul>
            </div>

            <h1>Контакты</h1>

            <div class="tabs tabs_2">
                <div class="tabs-links offset-ziro">
                    <div class="contacts_thumb_wrapp">
                        <label class="tab-link" for="tab_2_1"></label>
                        <div class="contacts_thumb">
                            <h3>ООО «Сервис Принт» Филиал «На Ленина»</h3>
                            <ul class="info">
                                <li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>
                                <li><i class="tel-2"></i><a href="tel:88001231212">8 800 123 12 12</a></li>
                                <li><i class="clock-2"></i>Пн - Пт 8.00-20.00<br />Сб - Вс 9.00-17.00</li>
                                <li><i class="envelop-3"></i><a href="mailto:info@print.ru">info@print.ru</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="contacts_thumb_wrapp">
                        <label class="tab-link" for="tab_2_2"></label>
                        <div class="contacts_thumb">
                            <h3>ООО «Сервис Принт» Филиал «На Ленина»</h3>
                            <ul class="info">
                                <li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>
                                <li><i class="tel-2"></i><a href="tel:88001231212">8 800 123 12 12</a></li>
                                <li><i class="clock-2"></i>Пн - Пт 8.00-20.00<br />Сб - Вс 9.00-17.00</li>
                                <li><i class="envelop-3"></i><a href="mailto:info@print.ru">info@print.ru</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="contacts_thumb_wrapp">
                        <label class="tab-link" for="tab_2_3"></label>
                        <div class="contacts_thumb">
                            <h3>ООО «Сервис Принт» Филиал в г. Орел</h3>
                            <ul class="info">
                                <li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>
                                <li><i class="tel-2"></i><a href="tel:88001231212">8 800 123 12 12</a></li>
                                <li><i class="clock-2"></i>Пн - Пт 8.00-20.00<br />Сб - Вс 9.00-17.00</li>
                                <li><i class="envelop-3"></i><a href="mailto:info@print.ru">info@print.ru</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="tabs-content">

                    <input type="radio" name="tabs_2" class="radio-tab" id="tab_2_1">
                    <div class="tab">
                        <div class="contact_map_wrapp">
                            <div class="col-1">
                                <div class="contact_map" id="map_1"></div>
                            </div>
                            <div class="col-2">
                                <div class="contact_info">
                                    <div class="inner">
                                        <p>Можно позвонить нам по телефону круглосуточно:</p>
                                        <a class="tel-link_2" href="tel:88001006550">8(800) 100-65-50</a>
                                    </div>
                                    <div class="inner">
                                        <p>А может, вам удобнее написать нам на почту <a class="link-3" href="mailto:abc@print.ru">abc@print.ru</a> ?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="tabs_2" class="radio-tab" id="tab_2_2">
                    <div class="tab">
                        <div class="contact_map_wrapp">
                            <div class="col-1">
                                <div class="contact_map" id="map_2"></div>
                            </div>
                            <div class="col-2">
                                <div class="contact_info">
                                    <div class="inner">
                                        <p>Можно позвонить нам по телефону круглосуточно:</p>
                                        <a class="tel-link_2" href="tel:88001231212">8 800 123 12 12</a>
                                    </div>
                                    <div class="inner">
                                        <p>А может, вам удобнее написать нам на почту <a class="link-3" href="mailto:info@info.ru">info@info.ru</a> ?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="tabs_2" class="radio-tab" id="tab_2_3">
                    <div class="tab">
                        <div class="contact_map_wrapp">
                            <div class="col-1">
                                <div class="contact_map" id="map_3"></div>
                            </div>
                            <div class="col-2">
                                <div class="contact_info">
                                    <div class="inner">
                                        <p>Можно позвонить нам по телефону круглосуточно:</p>
                                        <a class="tel-link_2" href="tel:88001231212">8 800 123 12 12</a>
                                    </div>
                                    <div class="inner">
                                        <p>А может, вам удобнее написать нам на почту <a class="link-3" href="mailto:info@info.ru">info@info.ru</a> ?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

    <!-- /Section 1 Contacts -->

    <script type="text/javascript" src="{{ asset('vendors/js/infobox.js') }}"></script>
@endsection