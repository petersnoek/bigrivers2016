@extends('_layout')

@section('title')
    API
@endsection


@section('head')
<<<<<<< HEAD:resources/views/eventkit/artists_confirm.blade.php
    <script src="js/table-cell-toggle.js" type="text/javascript">
=======
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //$("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();

            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                // show second row as well
                $(this).next("tr").next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            $("#report tr.odd input").click(function(e) {
                e.stopPropagation();
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
        td:nth-child(4), th:nth-child(4) { width: 150px; }
        td:nth-child(5), th:nth-child(5) { width: 300px; }

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
>>>>>>> feature/eventkit:resources/views/api/list.blade.php
@endsection


@section('content')


    @if ($json == null)
        <span style="color:red">No connection to eventkit</span>
    @else
        <form method="post" >

        <table id="report" class="w3-table w3-small w3-bordered">
        <thead>
            <tr>
                <th>Eventkit</th>
                <th>Updated</th>
                <th>-></th>
                <th class="w3-light-blue">Updated</th>
                <th class="w3-light-blue">Bigrivers.nl</th>
            </tr>
        </thead>
        <tbody>
            @foreach($json as $comparison)
            <tr class="odd">
                <td>{{ $comparison->ek_naam }}</td>
                <td>{{ $comparison->ek_updated_at }}</td>
                <td style="text-align: center;">
                    <input type="checkbox" name="update" value="{{ $comparison->ek_naam }}" style="top:3px; height:18px;" class="w3-check" >
                </td>

                @if($comparison->artist)
                    <td class="w3-light-blue">{{ $comparison->at_updated_at }}</td>
                    <td class="w3-light-blue">{{ $comparison->at_naam }}</td>
                @else
                    <td class="w3-light-blue"></td>
                    <td class="w3-light-blue"></td>
                @endif

            </tr>
            <tr class="even w3-tiny w3-example">
                <td colspan="3">{{ $comparison->eventkit->biografie or '&nbsp;' }}</td>
                <td colspan="2">{{ $comparison->artist->biografie or '&nbsp;' }}</td>
            </tr>
            <tr class="even w3-tiny w3-example">
                <td colspan="3">{{ $comparison->eventkit->website or '&nbsp;' }}</td>
                <td colspan="2">{{ $comparison->artist->website or '&nbsp;' }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </form>
    @endif

@endsection

@section('nav-add-items')
    <!-- <li><a href="#">ExtraItem</a></li> -->
@endsection

@section('nav-add-items-right')
    <!-- <li><a href="#">ExtraRight</a></li> -->
@endsection