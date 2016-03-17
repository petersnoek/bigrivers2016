@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>
    @foreach ($artists as $artist)
        <div class="artist_block">
            <div class="artist_text">

                <h2><a href="#">{{$artist->NameBand}}</a></h2>
                <p>{{ Str_limit($artist->biography, 1100) }}</p>
            </div>
            <div class="artist_img">
                <img src="/{{$artist->press_photo1}}" alt="" class="artist_list_img">
            </div>
        </div>
        <p><a  class="ReadMore" href="/admin/artist/show/{{$artist->id}}">Lees meer!</a></p>
    @endforeach

@stop

