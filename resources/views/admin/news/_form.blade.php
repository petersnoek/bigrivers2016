<div class="form-group">
    <label name="title">Titel:</label>
    <input type="text" class="form-control" name="title" value="{{ isset($output['attributes']['title']) ? $output['attributes']['title'] : '' }}"/>
</div>

<div class="form-group">
    <label name="body">Body:</label>
    <input type="text" class="form-control" name="body" value="{{ isset($output['attributes']['body']) ? $output['attributes']['body'] : '' }}">
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

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddNewsForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>