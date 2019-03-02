<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }
}
