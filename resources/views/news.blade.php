@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($news as $item)
                    {{ $item->title }}
                    <br>
                    {{ $item->body }}
                    <br><hr>
                @endforeach
            </div>
            <div class="col-12">
                {{ $news->links() }}
            </div>
        </div>
    </div>

@endsection
