@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <h3></h3>
    @foreach ($Sponsors as $Sponsor)
        <div class="list_block">
            <div class="list_text">

                <h2><a href="#">{{$Sponsor->title}}</a>  <a href="/admin/sponsor/{{$Sponsor->id}}/edit"><i class="edit"></i></a>  <a href="/admin/sponsor/{{$Sponsor->id}}/remove"><i class="remove"></i></a></h2>
            </div>
            <div class="list_img">
                <img src="/{{$Sponsor->image}}" alt="" class="list_img">
            </div>
        </div>
        <p><a  class="ReadMore" href="/admin/news/show/{{$Sponsor->id}}">Lees meer!</a></p>
    @endforeach

@stop

