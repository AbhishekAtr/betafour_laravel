<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::all();
        return view('backend.home-slider',['slider' => $data]);
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
        $slider = new Slider;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move('uploads/',$filename);
            $slider -> image = $filename;
        }
        $slider->save();
        return redirect('/home-slider')->with('success','Data Insert Successfully');
    }

    public function show(Slider $slider)
    {
        //
    }

    
    public function edit($id)
    {
        $slider = Slider::find($id);
        return response()->json([
            'status' => 200,
            'slider' => $slider,
        ]);
    }

    
    public function update(Request $request)
    {
        $id = $request-> input('id');
        $slider = Slider::find($id);
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move('uploads/',$filename);
            $slider -> image = $filename;
        }
        $slider->update();
        return redirect('/home-slider')->with('success','Data update Successfully');
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return response()->json(['success'=>'Hurrrryyyy! Your data has been deleted successfully!']);
    }

    
    public function destroy(Slider $slider)
    {
        //
    }
}
