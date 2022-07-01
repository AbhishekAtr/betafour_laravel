<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $categories = Categories::all();
        return view('backend.products',compact('product','categories'));
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
        
        // if($request->hasfile('image'))
        //  {
        //     foreach($request->file('image') as $image)
        //     {
        //         $name=date('YmdHi').$image->getClientOriginalName();
        //         $image->move('uploads/', $name);  
        //         $data[] = $name;  
        //     }
        //  }

        // $form= new Product;
        // $form->image=json_encode($data);
        // $form-> title = $request-> input('title');
        // $form-> description = $request-> input('description');
        // $form-> category = $request-> input('category');
        // $form->save();
        // return back()->with('success', 'Your images has been successfully');

        
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

        Product::insert( [
            'image'=>  implode(",",$images),
            'title' =>$input['title'],
            'description'=>$input['description'],
            'category'=>$input['category'],
            //you can put other insertion here
        ]);

        return redirect('/product')->with('success','Data Insert Successfully');
    }

    // public function stored(Request $request)
    // {
        
    //     $product = new Product;
        
    //     if($request->hasFile('image'))
    //     {
    //         $file = $request->file('image');
            
    //         $filename = date('YmdHi').$file->getClientOriginalName();
    //         $file-> move('uploads/',$filename);
    //         $product-> image = $filename;
    //     }
    //     $product-> title = $request-> input('title');
    //     $product-> description = $request-> input('description');
    //     $product-> category = $request-> input('category');
    //     $product->save();
    //     return redirect('/product')->with('success','Data Insert Successfully');




    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request-> input('id');
        $product = Product::find($id);
        
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
        return redirect('/product')->with('success','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products)
    {
        //
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['success'=>'Hurrrryyyy! Your data has been deleted successfully!']);
    }
}
