<?php

namespace App\Http\Controllers;

use App\Category;
use App\Genre;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateGenreRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateGenreRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GenreController extends Controller
{
    public function index()
    {
        //gather data
        $gen = Genre::withTrashed()->get();
        //ajax call from data table
        if (request()->ajax()){
            return DataTables::of($gen)
                ->addIndexColumn()
                ->editColumn('actions', function(Genre $gen) {
                    return view('actions.actions_genre', compact('gen'))->render();
                })
                ->editColumn('created_at', function(Genre $gen) {
                    return date('m/d/Y h:i:s a', strtotime($gen->created_at));
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        //rander view
        return view('genres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(CreateGenreRequest $request)
    {
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->save();
        return redirect('/genres');
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
        $gen = Genre::whereId($id)->first();
        return view('genres.index', compact('gen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->all());
        return redirect('/genres');
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
                $genre = Genre::whereId($id)->first();
                if ($genre->delete()) {
                    return response()->json(['success' => true, 'message' => 'user deleted successfully!']);
                }
            }
        }
    }

    public function restore($id){
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $genre = Genre::onlyTrashed()->whereId($id)->first();
                if ($genre->restore()) {
                    return response()->json(['success' => true, 'message' => 'user restored successfully!']);
                }
            }
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $genre = Genre::onlyTrashed()->whereId($id)->first();
        if (request()->ajax()) {
            if ($genre->forceDelete()) {
                return response()->json(['success' => true, 'message' => 'User deleted permanently successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
