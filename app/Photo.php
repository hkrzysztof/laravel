<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/';

    //accessor
    public function getFileAttribute($photo){
        return $this->uploads.$photo;
    }

    protected $fillable = [
        'file'
    ];
}
