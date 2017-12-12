<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        # many-to-one
        return $this->belongsTo('App\User');
    }
}
