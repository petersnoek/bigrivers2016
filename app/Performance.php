<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
        'artist_id',
        'stage_id',
        'event_id',
        'start',
        'finish',
        'delete_at',
        'created_at',
        'updated_at',
    ];
}
