@extends('layouts.app')

@section('content')

    <section class="section-1_blog grey-bg">

        <img class="bg_shape bg_shape_22" src="/img/shape_2.png" alt="">
        <img class="bg_shape bg_shape_23" src="/img/shape_3.png" alt="">
        <img class="bg_shape bg_shape_24" src="/img/shape_8.png" alt="">
        <img class="bg_shape bg_shape_25" src="/img/shape_9.png" alt="">

        <div class="row">

            <div class="breadcrumbs_wrapp">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/articles">Статьи</a></li>
                </ul>
            </div>

            <h1>Статьи</h1>

            <div class="filters_wrapp">
                <h3>Фильтры</h3>
                <form action="/articles">
                    <div class="filters_templ offset-ziro">
                        <div class="col col-1">
                            <div class="input_wrapp">
                                <i class="icon-1"></i>
                                <div class="select_wrapp">
                                    <select name="category" data-placeholder="Выберите категорию">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->title }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col col-1">--}}
                            {{--<div class="input_wrapp">--}}
                                {{--<i class="icon-2"></i>--}}
                                {{--<div class="select_wrapp">--}}
                                    {{--<select data-placeholder="Выберите тег">--}}
                                        {{--<option></option>--}}
                                        {{--<option>Тег 1</option>--}}
                                        {{--<option>Тег 2</option>--}}
                                        {{--<option>Тег 3</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col col-2">
                            <div class="input_wrapp">
                                <button type="submit" class="blue-pill">Применить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="overflow_hidden">
                <div class="thumbnails_6 offset-ziro">
                    @foreach($articles as $article)
                        <div class="thumb-6">
                            <a href="{{ $article->url }}" class="inner">
                                <div class="info-box">
                                    <p>{{ $article->category->title }}</p>
                                </div>
                                <div class="img-box">
                                    <img src="{{ $article->img }}" alt="" />
                                </div>
                                <div class="description">
                                    <h3>{{ $article->title }}</h3>
                                    <p>{{ $article->description }}</p>
                                </div>
                                <div class="button_wrapp">
                                    <p class="blue-pill">Читать далее</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pagination_wrapp">
                {{ $articles->links('parts.pagination') }}
            </div>

        </div>

    </section>
@endsection