@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>
    @foreach ($Events as $Event)
        <div class="list_block">
            <div class="list_text">

                <h2><a href="#">{{$Event->title}}</a>  <a href="/admin/event/{{$Event->id}}/edit"><i class="edit"></i></a>  <a href="/admin/event/{{$Event->id}}/remove"><i class="remove"></i></a></h2>
                <p>{{ Str_limit(!empty($Event->short_description) ? $Event->short_description : $Event->description , 1100) }}</p>
            </div>
            <div class="list_img">
                <img src="/{{$Event->image}}" alt="" class="list_img">
            </div>
        </div>
        <p><a  class="ReadMore" href="/admin/event/show/{{$Event->id}}">Lees meer!</a></p>
    @endforeach

@stop

