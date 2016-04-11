@extends('_layout')

@section('title')
    list
@stop

@section('head')

@stop

@section('content')
    <table>
        <tr>
            <th>Naam</th><th>locatie</th><th>kleur code</th><th>actie</th>
        </tr>
        @foreach ($Stages as $Stage)
        <tr>
            <td>{{$Stage->name}}</td><td>{{$Stage->location}}</td><td>{{$Stage->color_code}}</td><td><a href="/admin/stage/{{$Stage->id}}/edit"><i class="edit"></i></a>  <a href="/admin/stage/{{$Stage->id}}/remove"><i class="remove"></i></a></td>
        </tr>
 @endforeach
    </table>

@stop

