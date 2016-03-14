@extends('_layout')

@section('title')
    Admin - news
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuwe news toevoegen</h1>
    <hr>
    <form action="/admin/news/add/" method="post">
        @include('admin/news/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

