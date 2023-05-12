<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $data = array();
    if (Session::has('LoggedUser')) {
        $data = User::where('email', '=', Session::get('LoggedUser'))->first();
    }

    $cart = session()->get('cart', []);
    $cartItems = collect($cart)->values();
    $cartTotalQuantity = $cartItems->sum('quantity');

    return view('admin.index', compact('data' ,'cart', 'cartTotalQuantity'));
    }
}
