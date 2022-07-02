<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Newrelease;
use App\Models\Categories;
use Illuminate\Http\Request;

class NewreleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $newrelease = Newrelease::where('category', 'LIKE', "%$search%")->orwhere('title', 'LIKE', "%$search%")->get();
        }
        else
        {
            $newrelease = Newrelease::all();
        }
        // $newrelease = Newrelease::all();
        $categories = Categories::all();
        return view('backend.new-release',['newrelease' => $newrelease, 'search' => $search, 'categories'=> $categories]);
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
        $this->validate($request, [

            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',

    ]);
    $input=$request->all();
        $images=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('uploads/',$name);
                $images[]=$name;
            }
        }
        /*Insert your data*/

        Newrelease::insert( [
            'image'=>  implode(",",$images),
            'title' =>$input['title'],
            'description'=>$input['description'],
            'category'=>$input['category'],
            //you can put other insertion here
        ]);

        return redirect('/new-release')->with('success','Data Insert Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newrelease  $newrelease
     * @return \Illuminate\Http\Response
     */
    public function show(Newrelease $newrelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newrelease  $newrelease
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Newrelease::find($id);
        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newrelease  $newrelease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request-> input('id');
        $product = Newrelease::find($id);
        
        $images=array();
        if($files=$request->file('image')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('uploads/',$name);
                $images[]=$name;
            }
        }
        $product->image =  implode(",",$images);
        $product-> title = $request-> input('title');
        $product-> category = $request-> input('category');
        $product-> description = $request-> input('description');
        $product->update();
        return redirect('/new-release')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newrelease  $newrelease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newrelease $newrelease)
    {
        //
    }
    public function delete($id)
    {
        $product = Newrelease::findOrFail($id);
        $product->delete();
        return response()->json(['success'=>'Hurrrryyyy! Your data has been deleted successfully!']);
    }
}
