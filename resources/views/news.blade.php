@extends('layouts.app')

@section('content')
    @foreach($news as $item)
        {{ $item->title }}
        <br>
        {{ $item->body }}
        <br><hr>
    @endforeach
@endsection
