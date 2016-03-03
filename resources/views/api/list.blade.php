@extends('_layout')

@section('content')


    @if ($json == null)
        <span style="color:red">No connection to eventkit</span>
    @else
        <table>
        <tr>
            <th>Naam</th>
            <th>website</th>
            <th>youtube</th>

        </tr>


        @foreach($json as $artist)
            <tr>
                <td>{{ $artist->naamartiestband }}</td>
                <td><a href="{{ $artist->youtube }}">Youtube</a></td>
                <td></td>
            </tr>
        @endforeach
    </table>
    @endif

@endsection

@section('nav')
    nav
@endsection