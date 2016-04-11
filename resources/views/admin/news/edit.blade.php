@extends('_layout')

@section('title')
    Admin - edit nieuws
@stop

@section('head')

@stop

@section('content')

    <h1>Nieuws bijwerken</h1>
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
        @include('admin/news/_form', ['ButtonText' => $ButtonText, 'errors' => $errors, 'output' => $output])
    </form>

@stop

@section('javascript')
@stop