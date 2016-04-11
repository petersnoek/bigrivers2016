@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>

    @foreach ($artists as $artist)
        <div class="list_block">
            <div class="list_text">
                <h2><a href="#">{{$artist->NameBand}}</a>  <a href="/admin/artist/{{$artist->id}}/edit"><i class="edit"></i></a>  <a href="/admin/artist/{{$artist->id}}/remove"><i class="remove"></i></a></h2>
                <p>{{ Str_limit($artist->biography, 490) }}</p>
            </div>
            <div class="list_img">
                <img src="/{{$artist->press_photo1}}" alt="" class="list_img">
            </div>
        </div>
        <p><a  class="ReadMore" href="/admin/artist/show/{{$artist->id}}">Lees meer!</a></p>
    @endforeach

@stop

