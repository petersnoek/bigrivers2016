@extends('_layout')

@section('title')
    Admin
@stop

@section('head')

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
            <a href="#"><li>Voeg optreden toe</li></a>
            <a href="#"><li>Beheer optredens</li></a>
        </ul>
    </div>
    <div class="block">
        <h3>Evenementen</h3>
        <hr>

        <ul>
            <a href="admin/evenement/add"><li>Voeg evenement toe</li></a>
            <a href="admin/evenement"><li>Beheer evenementen</li></a>
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
            <a href="#"><li>Voeg poduim toe</li></a>
            <a href="#"><li>Beheer podia</li></a>
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