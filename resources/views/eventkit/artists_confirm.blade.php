@extends('_layout')

@section('title')
    API
@endsection

@section('content')

    <h1>confirm</h1>

        <form method="post" >

        <table id="report" class="w3-table w3-small w3-bordered">
        <thead>
            <tr>
                <th>Existing ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($updates as $update)
            <tr class="odd">
                <td>{{ $update->existing_id }}</td>
                <td>{{ $update->name }}</td>
                <td>{{ $update->updated_at }}</td>
                <td>Update</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </form>


@endsection

@section('nav-add-items')
    <!-- <li><a href="#">ExtraItem</a></li> -->
@endsection

@section('nav-add-items-right')
    <!-- <li><a href="#">ExtraRight</a></li> -->
@endsection