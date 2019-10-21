<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function collection()
    {
        return $this->belongsToMany('App\Collection');
    }


}
