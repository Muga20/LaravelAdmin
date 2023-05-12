<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class ProductsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }


    public function showProducts( ){


        $data = Auth::user();


        $user_id = session('user_id');
        $users = User::where('id', '!=', $user_id)->get();
        $categories = Category::all();
        $products = Products::latest()->paginate(5);
        return view('admin.products.show', compact('products', 'categories' , 'users' ,'data'));

    }



    public function createProducts(){

        $data = Auth::user();
        $categories = Category::all();
        return view('admin.products.create', compact('categories' ,'data'));
    }

   

    public function storeProducts(Request $request){
        
       $request->validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'required | image',
           'price' => 'required',
           'category_id' => 'required'
       ]);
       
       $name = $request->input('name');
       $category_id = $request->input('category_id');
       $description =$request->input('description');
       if(Products::latest()->first() !== null){
      $productId = Products::latest()->first()->id + 1;
       } else{
         $productId = 1;
       }

       $slug = Str::slug($name, '-') . '-' . $productId;
       $user_id = Auth::user()->id;
       $price  = $request->input('price');

       //File upload
       $image = 'storage/' . $request->file('image')->store('ProductImages', 'public');

     $products = new Products();
     $products->name = $name;
     $products->category_id = $category_id;
     $products->slug = $slug;
     $products->description = $description; 
     $products->user_id = $user_id;
     $products->price = $price;
     $products->image = $image;


     $products->save();
       
       return redirect()->back()->with('status', 'Product Created Successfully');
    }

    public function editProducts(Products $product){

        $data = Auth::User();
        $categories = Category::all();

        return view('admin.products.edit', compact('product' , 'categories' ,'data'));
    }



    public function updateProducts(Request $request, Products $product){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required | image',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        
        $name = $request->input('name');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $productId = $product->id;
        $slug = Str::slug($name, '-') . '-' . $productId;
        $price = $request->input('price');
        $user_id = Auth::user()->id;
        //File upload
        $image = 'storage/' . $request->file('image')->store('ProductImages', 'public');
    
        $product->name = $name;
        $product->slug = $slug;
        $product->price=$price;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->user_id = $user_id; // corrected variable name
        $product->image = $image;
        $product->save();
        
        return redirect()->back()->with('status', 'Product Edited Successfully');
    }
    
    

    public function deleteProducts(Products $product){
      $product->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully');
    }
}
