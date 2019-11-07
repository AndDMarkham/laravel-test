<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // protected $table = 'people';

    public $timestamps = false;


    // GREENLIST FOR FILLABLE COLUMNS
    protected $fillable = [
        'name',
        'photo_url',
        'biography',
        'profession_id'

    ];  

    // // BLACKLIST FOR UNFILLABLE COLUMNS
    // // if empty, everthing is fillable
    // protected $guarded = [
    //     ''
    // ]
}
