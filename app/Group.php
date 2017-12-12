<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function upcomingActivities()
    {
        return $this->activities()->whereDate('date_start', '>=', date('Y-m-d'));
    }

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
