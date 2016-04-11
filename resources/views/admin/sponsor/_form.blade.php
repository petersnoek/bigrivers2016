<div class="form-group">
    <label name="title">Titel:</label>
    <input type="text" class="form-control" name="title" value="{{ isset($output['attributes']['title']) ? $output['attributes']['title'] : '' }}"/>
</div>

<div class="form-group">
    <label name="image">Foto:</label>
    @if (isset($output['attributes']['image']))
        <input type="file" class="form-control" name="image">
        <p>Actuele foto:</p>
        <img src="/{{$output['attributes']['image']}}" alt="" class="FormImgShow">
    @else
        <input type="file" class="form-control" name="image">
    @endif
</div>

<div class="form-group">
    <label name="url">Website:</label>
    <input type="text" class="form-control" name="url" value="{{ isset($output['attributes']['url']) ? $output['attributes']['url'] : '' }}">
</div>

<div class="form-group">
    <label name="priority">Volgorde:</label>
    <input type="text" class="form-control" name="priority" value="{{ isset($output['attributes']['priority']) ? $output['attributes']['priority'] : '' }}">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddSponsorForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>