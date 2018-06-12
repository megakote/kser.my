@extends('layouts.app')

@section('content')
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
@endsection