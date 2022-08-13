<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products')); 
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|max:191',
            'category_id'=>'required',
        ]);

        $product = Product::create($request->all());
        $categories = Category::all();
        return redirect()->route('product.home')->with('status', "Product Created Successfully!");
    }
    
   
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories')); 
    }


    public function edit(Request $request, $id)
    {


        $request->validate([
            'product_name'=>'required|max:191',
            'category_id'=>'required',
        ]);

        $product = Product::find($id);

        $product->product_name=$request->product_name;
        $product->category_id=$request->category_id;
        $product->save();

        $products = Product::all();
        return redirect()->route('product.home')->with('status', "Product Edited Successfully!");
        
    }

    public function destroy($id)
    {
      
        Product::destroy($id);
        return redirect()->route('product.home')->with('status', 'Product deleted!');  
    }
    
}
