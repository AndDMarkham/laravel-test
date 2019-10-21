<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }

    public function movie()
    {
        return $this->belongsToMany('App\Movie');
    }

}
