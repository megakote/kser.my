@extends('layouts.app')

@section('content')
    <section class="sect-1-reviews">

        <img class="bg_shape bg_shape_26" src="/img/shape_2.png" alt="">
        <img class="bg_shape bg_shape_27" src="/img/shape_3.png" alt="">
        <img class="bg_shape bg_shape_28" src="/img/shape_10.png" alt="">
        <img class="bg_shape bg_shape_29" src="/img/shape_11.png" alt="">
        <img class="bg_shape bg_shape_30" src="/img/shape_12.png" alt="">
        <img class="bg_shape bg_shape_31" src="/img/shape_13.png" alt="">

        <div class="row">

            <div class="breadcrumbs_wrapp">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a href="{{ route('feedback') }}">Отзывы</a></li>
                </ul>
            </div>

            <h1>Отзывы</h1>

            <div class="two-cols_templ clearfix">
                <div class="left">
                    <p class="middle-rait">{{ $arithmetic }}</p>
                    <p class="middle-rait-desc">Средняя оценка на основании {{ $all }} отзывов</p>
                    <div class="rates_wrapp">
                        @foreach($stars as $i => $star)
                            <div class="rat">
                                <div class="add-rating" id="rate_0{{ $i }}" data-rate="{{ $i }}"></div>
                                <div class="rat_line">
                                    <span class="rat-val" style="width:{{ $star['percent'] }}%"></span>
                                </div>
                                <div class="rat-percent">
                                    <p>{{ $star['percent'] }}%</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right">
                    <div class="review_form_wrapp">
                        <h3>оставить отзыв</h3>
                        <div>
                            @if(session('status'))
                                {{ session('status') }}
                            @else
                             <form method="POST" id="addFeedback">
                                <div class="rates_wrapp_2">
                                    <p>Поставьте оценку магазину</p>
                                    <input type="hidden" name="stars">
                                    {{ csrf_field() }}
                                    <div id="review_rat"></div>
                                    <div class="error-block er_1">
                                        <p>Поставьте Вашу оценку</p>
                                    </div>
                                </div>
                                <div class="review_form clearfix">
                                    <div class="left">
                                        <div class="input_wrapp">
                                            <i class="user-3"></i>
                                            <input type="text" name="name" class="important" placeholder="Имя*">
                                            <div class="error-block">
                                                <p>Заполните это поле</p>
                                            </div>
                                        </div>
                                        <div class="input_wrapp">
                                            <i class="contact_i"></i>
                                            <input type="tel" name="contact" class="important contact_input" placeholder="Номер телефона или e-mail*">
                                            <div class="error-block er_1">
                                                <p>Укажите верный номер телефона</p>
                                            </div>
                                            <div class="error-block er_2">
                                                <p>Укажите верный эл.адрес</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="input_wrapp">
                                            <i class="doc-3"></i>
                                            <textarea name="body" class="important" placeholder="Текст отзыва*"></textarea>
                                            <div class="error-block">
                                                <p>Введите ваше сообщение</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit_wrapp">
                                        <button type="submit" class="blue-pill">Отправить</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-thumbs_wrapp">

                <h2>О нас говорят</h2>

                <div class="overflow_hidden">
                    <div class="testimonials offset-ziro">
                        @foreach($feedback as $feedback_item)
                            <div class="testimonial">
                                <div class="logo-box">
                                    <img src="{{ $feedback_item->logo }}" alt="" />
                                </div>
                                <h3>{{ $feedback_item->name }}</h3>
                                <ul class="info">
                                    <li><i class="data"></i>{{ date('d.m.y', strtotime($feedback_item->created_at )) }}</li>
                                    <li><i class="map-mark_2"></i>{{ $feedback_item->city }}</li>
                                </ul>
                                <div class="rate_2" id="rate_{{ $feedback_item->id }}" data-rate="{{ $feedback_item->stars }}"></div>
                                <div class="descript">
                                    <p>{{ $feedback_item->body }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="pagination_wrapp">
                    {{ $feedback->links('parts.pagination') }}
                </div>

            </div>

        </div>

    </section>




@endsection