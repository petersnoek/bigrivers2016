@extends('_layout')

@section('title')
    Admin - add artiest
@stop

@section('head')

@stop

@section('content')

    <h1>Optreden toevoegen</h1>
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
        @include('admin/performance/_form', ['ButtonText' => $ButtonText, 'errors' => $errors, 'events' => $events, 'artists' => $artists, 'stages' => $stages])
    </form>

@stop