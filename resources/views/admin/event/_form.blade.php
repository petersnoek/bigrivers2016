<div class="form-group">
    <label name="title">Title:</label>
    <input type="text" class="form-control" name="title" value="{{ isset($output['attributes']['title']) ? $output['attributes']['title'] : '' }}"/>
</div>

<div class="form-group">
    <label name="short_description">Korte omschrijving:</label>
    <textarea name="short_description" id="" cols="30" rows="3" class="form-control">{{ isset($output['attributes']['short_description']) ? $output['attributes']['short_description'] : '' }}</textarea>
</div>

<div class="form-group">
    <label name="description">Voledige omschrijving:</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ isset($output['attributes']['description']) ? $output['attributes']['description'] : '' }}</textarea>
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
    <div style="float: left; margin-right: 10px">
        <label name="start_date">Begin datum:</label>
        <input type="date" class="form-control date-input" name="start_date" value="{{ isset($output['attributes']['start_date']) ? $output['attributes']['start_date'] : '' }}">
    </div>

    <label name="end_date">Eind datum:</label>
    <input type="date" class="form-control date-input" name="end_date" value="{{ isset($output['attributes']['end_date']) ? $output['attributes']['end_date'] : '' }}">
</div>

<div class="form-group">
    <label name="price">Prijs:</label>
    <input type="text" class="form-control price-input" name="price" value="{{ isset($output['attributes']['price']) ? $output['attributes']['price'] : '' }}"/>
</div>

<div class="form-group">
    <label name="location">Locatie:</label>
        <input type="text" class="form-control" name="location" value="{{ isset($output['attributes']['location']) ? $output['attributes']['location'] : '' }}">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddArtistForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>