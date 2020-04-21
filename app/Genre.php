<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];

    public function movies(){
        return $this->hasMany(Movie::class,'genre_id');
    }
}
