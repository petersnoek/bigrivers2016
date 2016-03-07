@extends('_layout')

@section('head')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();

            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>

    <style>
        td {vertical-align: middle; }
        table#report {table-layout: fixed; height: 400px;}
        th { text-decoration: underline; }
        th, td {
            padding: 5px;
            text-align: left;
        }

        td:nth-child(1), th:nth-child(1) { width: 300px; }
        td:nth-child(2), th:nth-child(2) { width: 150px; }
        td:nth-child(3), th:nth-child(3) { width: 50px; }
        td:nth-child(4), th:nth-child(4) { width: 50px; }
        td:nth-child(5), th:nth-child(5) { width: 150px; }
        td:nth-child(6), th:nth-child(6) { width: 300px; }

        thead tr {
            display: block;
            position: relative;
        }

        tbody {
            display: block;
            overflow: auto;
            width: 100%;
            height: 350px;
        }


    </style>
@endsection


@section('content')


    @if ($json == null)
        <span style="color:red">No connection to eventkit</span>
    @else
        <div class="w3-row w3-small">
            <div class="w3-col m4 l3">
                <p>
                    I will occupy 12 columns on a small screen, 4 on a medium screen, and 3 on a large screen.
                </p>
            </div>
            <div class="w3-col m8 l9">
                <p>
                    I will occupy 12 columns on a small screen, 8 on a medium screen, and 9 on a large screen.
                </p>
            </div>
        </div>


        <table id="report" class="w3-table w3-small w3-bordered w3-striped">
        <thead>
            <tr>
                <th>Eventkit</th>
                <th>Updated</th>
                <th>-></th>
                <th class="w3-light-blue"><-</th>
                <th class="w3-light-blue">Updated</th>
                <th class="w3-light-blue">Bigrivers.nl</th>
            </tr>
        </thead>
        <tbody>
            @foreach($json as $eventkit_artist)
            <tr>
                <td>{{ $eventkit_artist->naamartiestband }}</td>
                <td>{{ $eventkit_artist->lastupdate }}</td>
                <td style="text-align: center;">
                    <input style="top:3px; height:18px;" class="w3-check" type="checkbox">
                </td>
                <td class="w3-light-blue" style="text-align: center;">
                    <input style="top:3px; height:18px;" class="w3-check" type="checkbox">
                </td>
                <td class="w3-light-blue">{{ $eventkit_artist->lastupdate }}</td>
                <td class="w3-light-blue">{{ $eventkit_artist->naamartiestband }}</td>
            </tr>
            <tr>
                <td colspan="3">details go here...</td>
                <td colspan="3">details go here...</td>
            </tr>
            @endforeach
        </tbody>

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

@section('nav-add-items')
    <!-- <li><a href="#">ExtraItem</a></li> -->
@endsection

@section('nav-add-items-right')
    <!-- <li><a href="#">ExtraRight</a></li> -->
@endsection