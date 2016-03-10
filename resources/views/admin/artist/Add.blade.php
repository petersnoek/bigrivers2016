@extends('_layout')

@section('title')
    Admin
@stop

@section('head')

@stop

@section('content')

    {!! Form::open(['url' => '/admin/artist/add/']) !!}
        @include('admin/_form', ['ButtonText' => $ButtonText])
    {!! Form::close() !!}

@stop

