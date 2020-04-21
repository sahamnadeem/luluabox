<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];

    public function movies(){
        return $this->hasMany(Movie::class,'category_id');
    }
    public function firstfive() {
        return $this->movies()->latest()->nPerGroup('category_id', 5);
    }
}
