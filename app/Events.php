<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'start_date',
        'end_date',
        'price',
        'location',
        'author_id',
        'SoftDelete',
        'created_at',
        'updated_at',
    ];
}
