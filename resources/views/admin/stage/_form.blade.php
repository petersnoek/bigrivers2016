<div class="form-group">
    <label name="name">Naam:</label>
    <input type="text" class="form-control" name="name"/>
</div>

<div class="form-group">
    <label name="location">Locatie:</label>
    <input type="text" class="form-control" name="location">
</div>

<div class="form-group">
    <label name="color_code">Kleur code:</label>
    <input type="text" class="form-control" name="color_code">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddStagesForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>