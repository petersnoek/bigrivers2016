<div class="form-group">
    <label name="NameBand">Band naam:</label>
    <input type="text" class="form-control" name="NameBand"/>
</div>

<div class="form-group">
    <label name="biography">Biografie:</label>
    <textarea name="biography" id="" cols="30" rows="10" class="form-control"></textarea>
</div>

<div class="form-group">
    <label name="Genre">Genre:</label>
    <input name="Genre" class="form-control"/>
</div>

<div class="form-group">
    <label name="press_photo1">Pers foto 1:</label>
    <input type="file" class="form-control" name="press_photo1">
</div>

<div class="form-group">
    <label name="press_photo2">Pers foto 2:</label>
    <input type="file" class="form-control" name="press_photo2">
</div>

<div class="form-group">
    <label name="press_photo3">Pers foto 3:</label>
    <input type="file" class="form-control" name="press_photo3">
</div>

<div class="form-group">
    <label name="website_url">Website:</label>
    <input type="text" class="form-control" name="website_url">
</div>

<div class="form-group">
    <label name="youtube_url">Youtube:</label>
    <input type="text" class="form-control" name="youtube_url">
</div>
<div class="form-group">
    <label name="facebook_url">Facebook:</label>
    <input type="text" class="form-control" name="facebook_url">
</div>

<div class="form-group">
    <label name="twitter_url">Twitter:</label>
    <input type="text" class="form-control" name="twitter_url">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddArtistForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>