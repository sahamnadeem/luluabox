<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Category;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\MovieCollection;
use App\Movie;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class MovieController extends Controller
{
    public function index(Request $request){
        $categories = Category::with('firstfive')->paginate(5);
        return Response($categories, 200);
    }
    public function banner(Request $request)
    {
        $banner = Banner::with('movie')->offset(0)->limit(5)->get();
        return new BannerCollection($banner);
    }
    public function moviesInCategory(Request $request, $id){
        $movies = Movie::where('category_id',$id)->paginate(10);
        return Response($movies, 200);
    }
    public function movie($id){
        $onmovie = Movie::with(['tags','related_movies'=>function($query){
            return $query->select('rmovie_id','title','cover')->offset(0)->limit(5);
        },'category:id,title','genre:id,title'])->where('id',$id)->first();
        if ($onmovie){
            return Response($onmovie,200);
        }else{
            return Response(['message'=>'Page not fount'],404);
        }
    }

    public function relatedMovies($id){
        $related = Movie::with('related_movies')->whereId($id)->first();
        if ($related){
            $related = $related->related_movies->paginate(5);
            return new BannerCollection($related);
        }else{
            $related = new Collection([]);
            return new BannerCollection($related);
        }
    }

    public function saperate(){
        $categories = Category::all();
        foreach ($categories as $category){
            $movies[$category->title] = Movie::where('category_id',$category->id)->with('genre')->offset(0)->limit(5)->get();
        }
        $movies = new Collection($movies);
        $movies = $movies->paginate(5);
        return new MovieCollection($movies);
    }
}
