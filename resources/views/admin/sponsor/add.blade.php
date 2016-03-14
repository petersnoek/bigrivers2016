@extends('_layout')

@section('title')
    Admin - sponsor
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuwe sponsor toevoegen</h1>
    <hr>
    <form action="/admin/sponsor/add/" method="post">
        @include('admin/sponsor/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

