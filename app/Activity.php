<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }
}
