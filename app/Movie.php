<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function collection()
    {
        return $this->belongsToMany('App\Collection');
    }

    public function favorited_by_users()
    {
        return $this->belongsToMany('App\User', 'favorite_movies');
    }
}
