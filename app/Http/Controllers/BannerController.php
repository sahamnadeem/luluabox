<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\CreateBannerRequest;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::with('movie')->withTrashed()->get();
        $movies = Movie::pluck('title','id')->toArray();
        if (request()->ajax()){
            return DataTables::of($banners)
                ->addIndexColumn()
                ->editColumn('movie', function(Banner $ban) {
                    return ucfirst($ban->movie->title);
                })
                ->editColumn('actions', function(Banner $ban) {
                    return view('actions.actions_banner', compact('ban'))->render();
                })
                ->editColumn('title', function(Banner $ban) {
                    return ucfirst($ban->title);
                })
                ->editColumn('created_at', function(Banner $ban) {
                    return date('m/d/y - H:i A',intval(strtotime($ban->created_at)));
                })
                ->editColumn('image', function(Banner $ban) {
                    return ucfirst($ban->image);
                })
                ->rawColumns(['actions'])
                ->toJson();
        }
        return view('banners.index', compact('banners','movies'));
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
    public function store(Request $request)
    {
//        $data = $request->only('title','movie_id','url','image');
        $banner =  new Banner;
        $banner->create($request->all());
        return redirect()->back();
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
    public function edit($ban)
    {
        $movies = Movie::pluck('title','id');
        $ban = Banner::with('movie')->whereId($ban)->first();
        return view('banners.index', compact('ban','movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBannerRequest $request, Banner $ban)
    {
        if (!$request->image){
            $request['image']=$ban->image;
        }
        $ban->update($request->all());
        return redirect()->back();
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
                $ban = Banner::whereId($id)->first();
                if ($ban->delete()) {
                    return response()->json(['success' => true, 'message' => 'Link deleted successfully!']);
                }
            }
        }
    }

    public function restore($id){
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $ban = Banner::onlyTrashed()->whereId($id)->first();
                if ($ban->restore()) {
                    return response()->json(['success' => true, 'message' => 'Link restored successfully!']);
                }
            }
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $ban = Banner::onlyTrashed()->whereId($id)->first();
        if (request()->ajax()) {
            if ($ban->forceDelete()) {
                return response()->json(['success' => true, 'message' => 'Link deleted permanently successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
