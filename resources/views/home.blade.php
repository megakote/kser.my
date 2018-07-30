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
                        <form id="form2" method="post" action="" class="form">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="description" value="Consultation">
                            <h3>Оформите заявку онлайн и получите скидку 5% на работу мастера</h3>
                            <div class="input_wrapp">
                                <i class="user-2"></i>
                                <input type="text" class="important" name="name" placeholder="Имя*" />
                                <div class="error-block">
                                    <p>Введите ваше имя</p>
                                </div>
                            </div>
                            <div class="input_wrapp">
                                <i class="contact_i"></i>
                                <input type="text" name="contact" class="contact_input important" placeholder="Номер телефона или e-mail*" />
                                <div class="error-block er_1">
                                    <p>Укажите верный номер телефона</p>
                                </div>
                                <div class="error-block er_2">
                                    <p>Укажите верный эл.адрес</p>
                                </div>
                            </div>
                            <div class="input_wrapp">
                                <i class="doc"></i>
                                <textarea name="comment" class="important" placeholder="Текст вопроса "></textarea>
                                <div class="error-block">
                                    <p>Введите ваше сообщение</p>
                                </div>
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
            {!! $sections[0]->body !!}
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
                    {!! $sections[1]->body !!}
                </div>
                <div class="col-2">
                    <div class="form-2_wrapp">
                        <div class="form-header">
                            <h3>Интересует постоянное обслуживание вашей техники для ее бесперебойной работы?</h3>
                        </div>
                        <p>Оставьте свои контакты и мы вышлем вам выгодное индивидуаульное предложение</p>
                        <div class="form-2">
                            <form  id="form_3" method="post" action="" class="form">
                                <input type="hidden" name="type" value="2">
                                <input type="hidden" name="description" value="Offer">
                                <div class="input_wrapp">
                                    <i class="contact2_i"></i>
                                    <input type="text" class="contact_input important" name="contact" placeholder="Номер телефона или e-mail" />
                                    <div class="error-block er_1">
                                        <p>Укажите верный номер телефона</p>
                                    </div>
                                    <div class="error-block er_2">
                                        <p>Укажите верный эл.адрес</p>
                                    </div>
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
            {!! $sections[2]->body !!}

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
                {!!  $sections[3]->body  !!}
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
            {!! $sections[4]->body !!}
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
