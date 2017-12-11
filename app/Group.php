<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function activities()
    {
        # one-to-many
        return $this->hasMany('App\Activity');
    }
}
