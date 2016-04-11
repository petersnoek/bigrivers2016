@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>
    @foreach ($Newsitems as $Newsitem)
        <div class="list_block">
            <div class="list_text">

                <h2><a href="#">{{$Newsitem->title}}</a>  <a href="/admin/news/{{$Newsitem->id}}/edit"><i class="edit"></i></a>  <a href="/admin/news/{{$Newsitem->id}}/remove"><i class="remove"></i></a></h2>
                <p>{{ Str_limit($Newsitem->body, 1100) }}</p>
            </div>
            <div class="list_img">
                <img src="/{{$Newsitem->image}}" alt="" class="list_img">
            </div>
        </div>
        <p><a  class="ReadMore" href="/admin/news/show/{{$Newsitem->id}}">Lees meer!</a></p>
    @endforeach

@stop

