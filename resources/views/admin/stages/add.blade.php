@extends('_layout')

@section('title')
    Admin - sponsor
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuwe podia toevoegen</h1>
    <hr>
    <form action="/admin/podia/add/" method="post">
        @include('admin/podia/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

