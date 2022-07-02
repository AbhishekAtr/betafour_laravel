<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $categories = Categories::where('title', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->get();
        }
        else
        {
            $categories = Categories::all();
        }
        // $categories = Categories::all();
        return view('backend.categories',['categories' => $categories, 'search' => $search]);
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
        $cat = new Categories;
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move('uploads/',$filename);
            $cat-> image = $filename;
        }
        $cat-> title = $request-> input('title');
        $cat-> description = $request-> input('description');
        $cat->save();
        return redirect('/category')->with('success','Data Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Categories::find($id);
        return response()->json([
            'status' => 200,
            'cat' => $cat,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request-> input('id');
        $cat = Categories::find($id);
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move('uploads/',$filename);
            $cat-> image = $filename;
        }
        $cat-> title = $request-> input('title');
        $cat-> description = $request-> input('description');
        $cat->update();
        return redirect('/category')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cat = Categories::findOrFail($id);
        $cat->delete();
        return response()->json(['success'=>'Hurrrryyyy! Your data has been deleted successfully!']);
    }
}
