@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($feedback as $feedback_item)
                    <div class="slide">
                        <div class="logo-box">
                            <img src="{{ $feedback_item->logo }}" alt=""/>
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
                @endforeach
            </div>
            <div class="col-12">
                {{ $feedback->links() }}
            </div>
        </div>
    </div>
@endsection