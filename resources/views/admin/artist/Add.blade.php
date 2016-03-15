@extends('_layout')

@section('title')
    Admin - artiest
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuwe artiest toevoegen</h1>
    <hr>
    <form action="/admin/artist/add/" method="POST" enctype="multipart/form-data">
        @include('admin/artist/_form', ['ButtonText' => $ButtonText])
    </form>
@stop

