<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    //
    public function login ()
    {
        return view('auth.login');
    }

    public function register ()
    {
        return view('auth.register');
    }

   
    public function registerUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = false;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $user->image = $filename;
        } else {
            $user->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTOkHm3_mPQ5PPRvGtU6Si7FJg8DVDtZ47rw&usqp=CAU'; // Change this to the filename of your default image
        }
        
        $user->save();
        if($user){
            return redirect('/login')->with('success', 'New User has been created successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->status) { // check if user's status is true
                $request->session()->put('LoggedUser', $request->email);
                return redirect('/dashboard')->with('success', 'You have successfully logged in');
            } else {
                auth()->logout();
                return back()->with('fail', 'Your account has been disabled. Please contact the administrator for further assistance.');
            }
        } else {
            return back()->with('fail', 'Incorrect credentials');
        }
    }
    

    public function dashboard()
 {
    $data = array();
    if (Session::has('LoggedUser')) {
        $data = User::where('email', '=', Session::get('LoggedUser'))->first();
    }

    return view('Admin.components.dashboard', compact('data'));
 }


    public function logOut()
    {
        if(Session::has('LoggedUser')){
            Session::pull('LoggedUser');
            return  redirect('/login');
        }
    }

    

}
