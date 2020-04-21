<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable=['title'];

    public function movies(){
        return $this->belongsToMany(Movie::class,'movies_tags','tag_id','movie_id');
    }
}
