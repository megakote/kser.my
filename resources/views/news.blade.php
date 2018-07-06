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
                    <li><a href="/news">Новости</a></li>
                </ul>
            </div>

            <h1>Новости</h1>

            <div class="overflow_hidden">
                <div class="thumbnails_6 offset-ziro">
                    @foreach($news as $article)
                        <div class="thumb-6">
                            <a href="{{ $article->url }}" class="inner">
                                <div class="info-box">
                                    <p>{{ $article->created_at->diffForHumans() }}</p>
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
                {{ $news->links('parts.pagination') }}
            </div>

        </div>

    </section>
@endsection