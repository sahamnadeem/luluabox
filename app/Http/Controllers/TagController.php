<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function index()
    {
        //gather data
        $tag = Tag::withTrashed()->get();
        //ajax call from data table
        if (request()->ajax()){
            return DataTables::of($tag)
                ->addIndexColumn()
                ->editColumn('actions', function(Tag $tag) {
                    return view('actions.actions_tag', compact('tag'))->render();
                })
                ->editColumn('created_at', function(Tag $tag) {
                    return date('m/d/Y h:i:s a', strtotime($tag->created_at));
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        //rander view
        return view('tags.index');
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
    public function store(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->title = $request->title;
        $tag->save();
        return redirect('/tags');
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
        $tag = Tag::whereId($id)->first();
        return view('tags.index', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect('/tags');
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
                $tag = Tag::whereId($id)->first();
                if ($tag->delete()) {
                    return response()->json(['success' => true, 'message' => 'user deleted successfully!']);
                }
            }
        }
    }

    public function restore($id){
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $tag = Tag::onlyTrashed()->whereId($id)->first();
                if ($tag->restore()) {
                    return response()->json(['success' => true, 'message' => 'user restored successfully!']);
                }
            }
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $tag = Tag::onlyTrashed()->whereId($id)->first();
        if (request()->ajax()) {
            if ($tag->forceDelete()) {
                return response()->json(['success' => true, 'message' => 'User deleted permanently successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
