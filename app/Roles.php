<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
     /**
      * Get users with a certain role
      */
     public function users()
     {
         return $this->belongsToMany('User', 'user_role');
     }
}
