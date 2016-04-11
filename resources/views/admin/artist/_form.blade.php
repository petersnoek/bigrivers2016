<div class="form-group">
    <label name="NameBand">Band naam:</label>
    <input type="text" class="form-control" name="NameBand" value="{{ isset($output['attributes']['NameBand']) ? $output['attributes']['NameBand'] : '' }}"/>
</div>

<div class="form-group">
    <label name="biography">Biografie:</label>
    <textarea name="biography" id="" cols="30" rows="10" class="form-control">{{ isset($output['attributes']['biography']) ? $output['attributes']['biography'] : '' }}</textarea>
</div>

<div class="form-group">
    <label name="Genre">Genre:</label>
    <input name="Genre" class="form-control" value="{{ isset($output['attributes']['Genre']) ? $output['attributes']['Genre'] : '' }}"/>
</div>

<div class="form-group">
    <label name="press_photo1">Pers foto 1:</label>
    @if (isset($output['attributes']['press_photo1']))
        <input type="file" class="form-control" name="press_photo1">
        <p>Actuele foto:</p>
        <img id="press_photo1_img" src="/{{$output['attributes']['press_photo1']}}" alt="" class="FormImgShow">
    @else
        <input type="file" class="form-control" name="press_photo1">
    @endif
</div>

<div class="form-group">
    <label name="press_photo2">Pers foto 2:</label>
    @if (isset($output['attributes']['press_photo2']))
        <input type="file" class="form-control" name="press_photo2">
        <p>Actuele foto:</p>
        <img id="press_photo2_img" src="/{{$output['attributes']['press_photo2']}}" alt="" class="FormImgShow">
    @else
        <input type="file" class="form-control" name="press_photo2">
    @endif
</div>

<div class="form-group">
    <label name="press_photo3">Pers foto 3:</label>
    @if (isset($output['attributes']['press_photo3']))
        <input type="file" class="form-control" name="press_photo3">
        <p>Actuele foto:</p>
        <img id="press_photo3_img" src="/{{$output['attributes']['press_photo3']}}" alt="" class="FormImgShow">
    @else
        <input type="file" class="form-control" name="press_photo3">
    @endif
</div>

<div class="form-group">
    <label name="website_url">Website:</label>
    <input type="text" class="form-control" name="website_url" value="{{ isset($output['attributes']['website_url']) ? $output['attributes']['website_url'] : '' }}">
</div>

<div class="form-group">
    <label name="youtube_url">Youtube:</label>
    <input type="text" class="form-control" name="youtube_url" value="{{ isset($output['attributes']['youtube_url']) ? $output['attributes']['youtube_url'] : '' }}">
</div>
<div class="form-group">
    <label name="facebook_url">Facebook:</label>
    <input type="text" class="form-control" name="facebook_url" value="{{ isset($output['attributes']['facebook_url']) ? $output['attributes']['facebook_url'] : '' }}">
</div>

<div class="form-group">
    <label name="twitter_url">Twitter:</label>
    <input type="text" class="form-control" name="twitter_url" value="{{ isset($output['attributes']['twitter_url']) ? $output['attributes']['twitter_url'] : '' }}">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddArtistForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>