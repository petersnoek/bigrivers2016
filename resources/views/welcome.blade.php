@extends('_layout')

@section('title')
    Home
@stop

@section('modals')

    <div id="LogoutSuccessModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    U bent succesvol uitgelogt.
                </div>
            </div>
        </div>
    </div>

@stop

@section('content')
    <h1>Home Page</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#LogoutSuccessModal">Small modal</button>
@endsection

@section('javascript')

@endsection
