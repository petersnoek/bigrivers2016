<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'NameBand',
        'biography',
        'press_photo1',
        'press_photo2',
        'press_photo3',
        'website_url',
        'youtube_url',
        'facebook_url',
        'twitter_url',
        'SoftDelete',
        'created_at',
        'updated_at',
    ];
}
