<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'naamartiestband',
        'biografie',
        'persfoto1',
        'persfoto2',
        'persfoto3',
        'website',
        'youtube',
        'facebook',
        'twitter',
        'website',
        'created_at',
        'updated_at',
    ];
}
