<div class="form-group">
    {!! Form::label('NameBand', 'Band naam:') !!}
    {!! Form::text('NameBand', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('biography', 'Biografie:') !!}
    {!! Form::text('biography', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('press_photo', 'Pers foto 1:') !!}
    {!! Form::text('press_photo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('press_photo2', 'Pers foto 2:') !!}
    {!! Form::text('press_photo2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('press_photo3', 'Pers foto 3:') !!}
    {!! Form::text('press_photo3', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('website_url', 'Website:') !!}
    {!! Form::text('website_url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('youtube_url', 'Youtube:') !!}
    {!! Form::text('youtube_url', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('facebook_url', 'Facebook:') !!}
    {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('twitter_url', 'Twitter:') !!}
    {!! Form::text('twitter_url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($ButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>