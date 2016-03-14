<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenresRelationToArtist extends Model
{
    protected $fillable = [
        'artist_id',
        'genre_id',
        'created_at',
        'updated_at',
    ];
}
