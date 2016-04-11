@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>
    @foreach ($artist as $artist_show)
        <div class="artist_block">
            <div class="artist_text">

                <h2><a href="#">{{$artist_show->NameBand}}</a></h2>
                <p>{{ Str_limit($artist_show->biography, 1100) }}</p>
            </div>
            <div class="artist_img">
                <img src="/{{$artist_show->press_photo1}}" alt="" class="artist_show_img">
            </div>
        </div>
    @endforeach

@stop

