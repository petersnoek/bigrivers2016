<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsItems extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'author_id',
        'SoftDelete',
        'created_at',
        'updated_at',
    ];
}
