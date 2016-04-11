@extends('_layout')

@section('title')
    Admin
@stop

@section('head')

@stop

@section('modals')
    <div id="insertModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{--Here needs the text be inserted that needs to be displayed on the modal--}} {{$message or 'Error: variable empty'}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="block">
        <h3>Nieuws</h3>
        <hr>

        <ul>
            <a href="admin/news/add"><li>Voeg nieuwsbericht toe</li></a>
            <a href="admin/news"><li>Beheer nieuwsberichten</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Artiesten</h3>
        <hr>

        <ul>
            <a href="admin/artist/add"><li>Voeg artiest/band toe</li></a>
            <a href="admin/artist"><li>Beheer artiesten</li></a>
            <a href="admin/performance/add"><li>Voeg optreden toe</li></a>
            <a href="#"><li>Beheer optredens</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Evenementen</h3>
        <hr>

        <ul>
            <a href="admin/event/add"><li>Voeg evenement toe</li></a>
            <a href="admin/event"><li>Beheer evenementen</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Sponsoren</h3>
        <hr>

        <ul>
            <a href="admin/sponsor/add"><li>Voeg sponsor toe</li></a>
            <a href="admin/sponsor"><li>Beheer sponsoren</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Podia</h3>
        <hr>

        <ul>
            <a href="admin/stage/add"><li>Voeg podium toe</li></a>
            <a href="admin/stage/"><li>Beheer podia</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Frontpage knoppen</h3>
        <hr>

        <ul>
            <a href="#"><li>Voeg knoppen toe</li></a>
            <a href="#"><li>Beheer knoppen</li></a>
            <a href="#"><li>Beheer widget</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Instellingen</h3>
        <hr>

        <ul>
            <a href="#"><li>Beheer pagina's</li></a>
            <a href="#"><li>Logo en links</li></a>
            <a href="#"><li>Bestanden</li></a>
            <a href="#"><li>Beheer personeel</li></a>
        </ul>
    </div>
@stop

@section('javascript')

@stop