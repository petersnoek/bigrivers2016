<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'title',
        'image',
        'url',
        'priority',
        'SoftDelete',
        'author_id',
        'created_at',
        'updated_at',
    ];
}
