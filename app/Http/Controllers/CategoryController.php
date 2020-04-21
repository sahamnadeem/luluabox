<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        //gather data
       $category = Category::withTrashed()->get();

        //ajax call from data table
        if (request()->ajax()){
            return DataTables::of($category)
                ->addIndexColumn()
                ->editColumn('actions', function(Category $cat) {
                    return view('actions.actions_category', compact('cat'))->render();
                })
                ->editColumn('created_at', function(Category $cat) {
                    return date('m/d/Y h:i:s a', strtotime($cat->created_at));
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        //rander view
        return view('categories.index');
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
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return redirect('/categories');
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
        $cat = Category::whereId($id)->first();
        return view('categories.index', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect('/categories');
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
                $cat = Category::whereId($id)->first();
                if ($cat->delete()) {
                    return response()->json(['success' => true, 'message' => 'user deleted successfully!']);
                }
            }
        }
    }

    public function restore($id){
        if (request()->ajax()) {
            if (isset($id) && !empty($id)) {
                $cat = Category::onlyTrashed()->whereId($id)->first();
                if ($cat->restore()) {
                    return response()->json(['success' => true, 'message' => 'user restored successfully!']);
                }
            }
        }
    }

    public function deletePermanently(Request $request, $id)
    {
        $cat = Category::onlyTrashed()->whereId($id)->first();
        if (request()->ajax()) {
            if ($cat->forceDelete()) {
                return response()->json(['success' => true, 'message' => 'User deleted permanently successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
