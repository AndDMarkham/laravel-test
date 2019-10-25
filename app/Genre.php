<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }
    public function collection()
    {
        return $this->hasMany('App\Collection');
    }
}
