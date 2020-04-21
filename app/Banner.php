<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable=['title','url','image','movie_id'];

    public function movie(){
        return $this->belongsTo(Movie::class,'movie_id');
    }
}
