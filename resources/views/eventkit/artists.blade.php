@extends('_layout')

@section('head')
    <script src="/js/table-cell-toggle.js" type="text/javascript" ></script>
@endsection


@section('content')

    @if ($json == null)
        <span class="w3-red">No connection to eventkit</span>
    @else
        <form method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table id="report" class="w3-table w3-small w3-bordered">
        <thead>
            <tr>
                <th>Eventkit</th>
                <th>Updated</th>
                <th>-></th>
                <th class="w3-light-blue">Bigrivers.nl</th>
                <th class="w3-light-blue">Updated</th>

            </tr>
        </thead>
        <tbody>
            @foreach($json as $comparison)
            <tr class="odd">
                <td>{{ $comparison->ek_naam }}</td>
                <td>{{ $comparison->ek_updated_at }}</td>

                @if($comparison->artist)
                    <td style="text-align: center;">
                        <input type="checkbox" name="update[]" value="{{ $comparison->ek_naam }}" style="top:3px; height:18px;" class="w3-check" >
                    </td>

                    <td class="w3-light-blue">{{ $comparison->at_naam }}</td>
                    <td class="w3-light-blue">{{ $comparison->at_updated_at }}<td>
                @else
                    <td style="text-align: center;">
                        <input type="checkbox" name="insert[]" value="{{ $comparison->ek_naam }}" style="top:3px; height:18px;" class="w3-check" >
                    </td>

                    <td class="w3-light-blue"></td>
                    <td class="w3-light-blue"></td>
                @endif

            </tr>
            <tr class="even w3-tiny w3-example">
                <td colspan="3">{{ $comparison->short_bio or '&nbsp;' }}</td>
                <td colspan="3">{{ $comparison->artist->biografie or '&nbsp;' }}</td>
            </tr>
            <tr class="even w3-tiny w3-example">
                <td colspan="3">{{ $comparison->eventkit->website or '&nbsp;' }}</td>
                <td colspan="3">{{ $comparison->artist->website or '&nbsp;' }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

            <input type="submit" name="submit" value="Synchroniseren" />
        </form>
    @endif

@endsection

@section('nav-add-items')
    <!-- <li><a href="#">ExtraItem</a></li> -->
@endsection

@section('nav-add-items-right')
    <!-- <li><a href="#">ExtraRight</a></li> -->
@endsection