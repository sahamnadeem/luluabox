<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','category_id','genre_id','director','writer','story','detail','price', 'cover','trailer'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id');
    }

    public function movies(){
        return $this->belongsToMany(Tag::class,'tag_id');
    }

    public function child(){
        return $this->belongsToMany(Movie::class,'related_movies','movie_id','rmovie_id','id')->withTimestamps();
    }
    public function parent(){
        return $this->belongsToMany(Movie::class,'related_movies','rmovie_id','movie_id','id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'movies_tags','movie_id','tag_id')->withTimestamps();
    }

    public function banners(){
        return $this->hasMany(Banner::class,'movie_id');
    }

    public function related_movies(){
        return $this->belongsToMany(Movie::class,'related_movies','movie_id','rmovie_id','id')->withTimestamps();
    }
}
