<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    protected $fillable = [
        'name',
        'location',
        'color_code',
        'SoftDelete',
        'author_id',
        'created_at',
        'updated_at',
    ];
}
