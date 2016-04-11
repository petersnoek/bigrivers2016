<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genresrelationtoartist extends Model
{
    protected $fillable = [
        'artist_id',
        'genre_id',
        'created_at',
        'updated_at',
    ];

    protected $table = "genresrelationtoartist";
}
