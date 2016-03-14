@extends('_layout')

@section('title')
    Admin - evenement
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuw evenement toevoegen</h1>
    <hr>
    <form action="/admin/evenement/add/" method="post">
        @include('admin/evenement/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

