@extends('_layout')

@section('title')
    Admin - evenement
@stop

@section('head')
    <link rel="stylesheet" href="/css/google-location.css">

    <script src="/js/Place-Autocomplete-Address.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMU4HmO9IcL7dHmgV9tanqGQ5iQZ7S6c&libraries=places"></script>

        @stop

@section('content')

    <h1>Nieuw evenement toevoegen</h1>
    <hr>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li class="error_list">{{$error}}</li>
            @endforeach
        </ul>
        <hr>
    @endif

    <form method="post" enctype="multipart/form-data">
        @include('admin/event/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

