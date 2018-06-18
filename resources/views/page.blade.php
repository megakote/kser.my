@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> {{ $title }} </h1>
                <hr>
                {!! $body !!}
            </div>
        </div>
    </div>

@endsection
