<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    public function activities()
    {
        # many-to-one
        return $this->belongsTo('App\Group');
    }
}
