<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
}
