<?php

namespace App\Http\Controllers;

use App\Category;
use App\Genre;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Movie;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MovieController extends Controller
{
    public function index()
    {
        //gather data
        $categories = Category::pluck('title','id')->toArray();
        $tags = Tag::pluck('title','id')->toArray();
        $genre = Genre::pluck('title','id')->toArray();
        $movies_list = Movie::pluck('title','id')->toArray();
        $movies = Movie::with('category','genre','child','tags')->withTrashed()->get();
        //ajax call from data table
        if (request()->ajax()){
            return DataTables::of($movies)
                ->addIndexColumn()
                ->editColumn('actions', function(Movie $movies) {
                    return view('actions.actions_movie', compact('movies'))->render();
                })
                ->editColumn('created_at', function(Movie $movie) {
                    return date('m/d/Y h:i:s a', strtotime($movie->created_at));
                })
                ->editColumn('category', function(Movie $movie) {
                    return $movie->category->title;
                })
                ->editColumn('genre', function(Movie $movie) {
                    return $movie->genre->title;
                })
                ->editColumn('details', function(Movie $movie) {
                    return view('popups.movies_detail_popup',compact('movie'))->render();
                    //return true;
                })
                ->rawColumns(['actions','details'])
                ->toJson();
        }

        //rander view
        return view('movies.index', compact('categories','genre','movies_list','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uplaod(Request $request){
        dd($request->all());
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        $movie = new Movie;
        $request['cover'] = $request->file('image')->store('public/movies-covers/');
        $request['cover'] = Storage::url($request['cover']);
        $request['cover'] = asset($request['cover']);
        $movie = $movie->create($request->all());
        $movie->child()->attach($request->rmovies,['movie_id'=>$movie->id]);
        $movie->tags()->attach($request->tags,['movie_id'=>$movie->id]);
        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('title','id')->toArray();
        $tags = Tag::pluck('title','id')->toArray();
        $genre = Genre::pluck('title','id')->toArray();
        $movies_list = Movie::pluck('title','id')->toArray();
        $movie = Movie::with('category','genre','child','tags')->whereId($id)->first();
        return view('movies.index', compact('categories','genre','movies_list','tags','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        if (!$request->image){
            $request['cover'] = $movie->cover;
        }else{
            $request['cover'] = $request->file('image')->store('public/movies-covers/');
            $request['cover'] = Storage::url($request['cover']);
            $request['cover'] = asset($request['cover']);
        }
        $movie->update($request->all());
        $movie->child()->sync($request->rmovies);
        $movie->tags()->sync($request->tags);
        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $movie = Movie::whereId($id)->first();
                if ($movie->delete()) {
                    return response()->json(['success' => true, 'message' => 'user deleted successfully!']);
                }
            }
        }
    }

    public function restore($id){
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $movie = Movie::onlyTrashed()->whereId($id)->first();
                if ($movie->restore()) {
                    return response()->json(['success' => true, 'message' => 'user restored successfully!']);
                }
            }
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $movie = Movie::onlyTrashed()->whereId($id)->first();
        if (request()->ajax()) {
            if ($movie->forceDelete()) {
                return response()->json(['success' => true, 'message' => 'User deleted permanently successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
