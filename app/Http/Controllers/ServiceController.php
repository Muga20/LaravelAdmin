<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }


    public function showServices( ){


        $data = Auth::user();
        $user_id = session('user_id');
        $users = User::where('id', '!=', $user_id)->get();
   
        $services = Service::all();
        return view('admin.service.show', compact('services',  'users' ,'data'));

    }



    public function createServices(){

        $data = Auth::user();
    
        return view('admin.service.create', compact('data'));
    }

   

    public function storeServices(Request $request){
        
       $request->validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'required | image',
           'price' => 'required',
          
       ]);
       
       $name = $request->input('name');
  
       $description =$request->input('description');
       if(Service::latest()->first() !== null){
      $productId = Service::latest()->first()->id + 1;
       } else{
         $productId = 1;
       }

       $slug = Str::slug($name, '-') . '-' . $productId;
       $user_id = Auth::user()->id;
       $price  = $request->input('price');

       //File upload
       $image = 'storage/' . $request->file('image')->store('ServiceImages', 'public');

     $services = new Service();
     $services->name = $name;
     $services->slug = $slug;
     $services->description = $description; 
     $services->user_id = $user_id;
     $services->price = $price;
     $services->image = $image;

     $services->save();
       
       return redirect()->back()->with('status', 'Product Created Successfully');
    }

    public function editServices(Service $service){

        $data = Auth::User();
 

        return view('admin.service.edit', compact('service' ,'data'));
    }



    public function updateServices(Request $request,  Service $service ){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required | image',
            'price' => 'required',
       
        ]);
        
        $name = $request->input('name');
        $description = $request->input('description');
     
        $productId = $product->id;
        $slug = Str::slug($name, '-') . '-' . $productId;
        $price = $request->input('price');
        $user_id = Auth::user()->id;
        //File upload
        $image = 'storage/' . $request->file('image')->store('ServiceImages', 'public');
    
        $product->name = $name;
        $product->slug = $slug;
        $product->price=$price;
        $product->description = $description;
        $product->user_id = $user_id; // corrected variable name
        $product->image = $image;
        $product->save();
        
        return redirect()->back()->with('status', 'Product Edited Successfully');
    }
    
    

    public function deleteServices(Service $service){
      $service->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully');
    }
}
