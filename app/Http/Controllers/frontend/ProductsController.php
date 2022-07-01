<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($title)
    {
        // echo gettype(($title));
        if (Categories::where('title', $title)->exists()) {
            $categories = Categories::all();
            $category = Categories::where('title', $title)->firstorFail();
            $products = Product::where('category', $category->title)->get();
            // echo $products[0]->title;
            return view('frontend.products', compact('products', 'categories', 'category'));
        }
    }

    public function details($id)
    {
        // echo gettype(($title));
        
            if(Product::where('id', $id))
            {
                $categories = Categories::all();
                $product = Product::where('id', $id)->first();
                return view('frontend.productdetails', compact('product', 'categories'));
            }
            
        }
    
}
