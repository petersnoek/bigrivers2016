@extends('_layout')

@section('title')
    Admin - sponsor
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuwe podia toevoegen</h1>
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
        @include('admin/stage/_form', ['ButtonText' => $ButtonText])
    </form>

@stop

