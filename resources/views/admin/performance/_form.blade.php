<div class="form-group">
    <label name="Event_id">Evenement:</label>
    <select class="form-control" name="Event_id">
        <option value=""></option>
        @foreach ($events as $event)
            <option value="{{$event->id}}">{{$event->title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label name="artist_id">Artist/Band:</label>
    <select class="form-control" name="artist_id">
        <option value=""></option>
        @foreach ($artists as $artist)
            <option value="{{$artist->id}}">{{$artist->NameBand}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label name="stage_id">Podium:</label>
    <select class="form-control" name="stage_id">
        <option value=""></option>
        @foreach ($stages as $stage)
            <option value="{{$stage->id}}">{{$stage->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label name="start">Begint:</label>
    <input type="time" class="time-input form-control" name="start_time">
    <input type="date" class="date-input form-control" name="start_date">
</div>

<div class="form-group">
    <label name="finish">Eindigt:</label>
    <input type="time" class="time-input form-control" name="finish_time">
    <input type="date" class="date-input form-control" name="finish_date">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <button type="submit" name="SubmitAddPerformenceForm" class="btn btn-primary form-control">{{$ButtonText}}</button>
</div>