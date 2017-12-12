<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function users()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
