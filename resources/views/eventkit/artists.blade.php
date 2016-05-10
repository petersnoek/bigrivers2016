@extends('_layout')

@section('head')
    <script src="/js/table-cell-toggle.js" type="text/javascript" ></script>

    <script type="text/javascript" >
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox' & cbs[i].name != 'toggle[]') {
                    cbs[i].checked = bx.checked;
                }
            }
        }
        function checkInserts(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox' && cbs[i].name == 'insert[]' ) {
                    cbs[i].checked = bx.checked;
                }
            }
        }
        function checkUpdates(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox' && cbs[i].name == 'update[]' ) {
                    cbs[i].checked = bx.checked;
                }
            }
        }

    </script>

@endsection

@section('content')

    @if (isset($message))
        <span class="w3-green">{{$message}}</span>
    @endif

    @if ($json == null)
        <span class="w3-red">No connection to eventkit</span>
    @else
        <form method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="checkbox" name="toggle[]" onclick="checkAll(this)" > Check all
            <input type="checkbox" name="toggle[]" onclick="checkInserts(this)" > Check inserts
            <input type="checkbox" name="toggle[]" onclick="checkUpdates(this)" > Check updates<br/>

            <input type="submit" name="submit" value="Synchroniseren" />


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
                            <input type="checkbox" name="update[]" value="{{ $comparison->ek_id }}" style="top:3px; height:18px;" class="w3-check" >
                        </td>

                        <td class="w3-light-blue">{{ $comparison->at_naam }}</td>
                        <td class="w3-light-blue">{{ $comparison->at_updated_at }}<td>
                    @else
                        <td style="text-align: center;">
                            <input type="checkbox" name="insert[]" {{ ($comparison->checked ? 'checked="checked"':'') }} value="{{ $comparison->ek_id }}" style="top:3px; height:18px;" class="w3-check" >
                        </td>

                        <td class="w3-light-blue"></td>
                        <td class="w3-light-blue"></td>
                    @endif

                </tr>
                <tr class="even w3-tiny w3-example">
                    <td colspan="3">{{ $comparison->ek_short_bio or '&nbsp;' }}</td>
                    <td colspan="2">{{ $comparison->at_short_bio or '&nbsp;' }}</td>
                </tr>
                <tr class="even w3-tiny w3-example">
                    <td colspan="3">{{ $comparison->eventkit->website or '&nbsp;' }}</td>
                    <td colspan="2">{{ $comparison->artist->website_url or '&nbsp;' }}</td>
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