<div class="form-group">
    <label name="Title">Title:</label>
    <input type="text" class="form-control" name="Title"/>
</div>

<div class="form-group">
    <label name="short_description">Korte omschrijving:</label>
    <textarea name="short_description" id="" cols="30" rows="3" class="form-control"></textarea>
</div>

<div class="form-group">
    <label name="description">Voledige omschrijving:</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
</div>

<div class="form-group">
    <label name="image">Foto:</label>
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <label name="start_date">Begin datum:</label>
    <input type="date" class="form-control" name="start_date">
</div>

<div class="form-group">
    <label name="end_date">Eind datum:</label>
    <input type="date" class="form-control" name="end_date">
</div>

<div class="form-group">
    <label name="price">Prijs:</label>
    <input type="text" class="form-control" name="price">
</div>

<div class="form-group">
    <label name="location">Locatie:</label>
    <input type="text" class="form-control" name="location">
</div>

<div class="form-group">
    <button type="submit" name="SubmitAddArtistForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>