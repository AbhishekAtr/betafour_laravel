<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Newrelease;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $slider = Slider::all();
        return view('frontend.index',compact('slider','categories'));
    }
    public function cat()
    {
        $categories = Categories::all();
        return view('frontend.catalogue',compact('categories'));
    }
    public function news()
    {
        $categories = Categories::all();
        return view('frontend.news',compact('categories'));
    }
    public function about()
    {
        $categories = Categories::all();
        return view('frontend.about',compact('categories'));
    }
    public function contact()
    {
        $categories = Categories::all();
        return view('frontend.contact',compact('categories'));
    }
    public function new()
    {
        $new = Newrelease::all();
        $categories = Categories::all();
        return view('frontend.newrelease',compact('categories','new'));
    }

    public function newdetails($id)
    {
        // echo gettype(($title));

        if (Newrelease::where('id', $id)) {
            $categories = Categories::all();
            $product = Newrelease::where('id', $id)->first();
            return view('frontend.newproductdetails', compact('product', 'categories'));
        }
    }
   
}
