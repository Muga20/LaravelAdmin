<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }

    public function showCategory()
    {
        $data = array();
        if (Session::has('LoggedUser')) {
        $data = User::where('email', '=', Session::get('LoggedUser'))->first();
    }

        $categories = Category::all();

        return view('admin.category.show' ,compact('data' ,'categories'));
    }

  
    public function createCategory()
    {
        $data = Auth::user();
        return view('admin.category.create', compact('data'));
    }
    
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        
        $category = new Category();
        $category->name = $request->input('name');
        $category->user_id = Auth::user()->id;
        $category->save();
        
        return redirect()->back()->with('status', 'Category Created Successfully');
    }
    

    public function editCategory(Category $category)
    {
        $data = array();
        if (Session::has('LoggedUser')) {
        $data = User::where('email', '=', Session::get('LoggedUser'))->first();
    }


        return view('admin.category.edit' ,compact('data' ,'category'));
    }


    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);
        
        $name = $request->input('name');
        $category->name = $name;
        $category->user_id = Auth::user()->id;
        $category->save();
        
        return redirect()->back()->with('status', 'Category Created Successfully');

    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }
}
