<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Cart;
use App\Models\Carts;
use App\Models\Category;
use Session;
use DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function showCart(){
        
        $data = Auth::User();

        $cart = Carts::all();
        $product = Products::all();
        return view('admin.cart.show',compact('data' ,'cart' ,'product'));
    }

    public function shop()
    {
        $products = Products::where('status', 1)
            ->orderBy('product_name')
            ->take(10)
            ->get();
        return view('client.shop', compact("products"));
    }
    


    public function addToCart($id)
    {
        // $product = Products::find($id);

        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return back();
    }



    public function cart()
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);;
    }

    public function update_quantity(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);
        return back();
    }

    public function removeItem($product_id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back();
    }



    public function checkout()
    {
        $categories = Category::latest()->paginate(4);
        return view('client.checkout',compact('categories'));
    }


  

    // public function store(Request $request)
    // {
    //     $oldCart = Session::has('cart')? Session::get('cart'):null;
    //     $cart = new Cart($oldCart);

    //     $cart = new Cart();
    //     $cart->name = $request->name;
    //     $cart->address = $request->address;
    //     $cart->cart = serialize($cart);
    //     $cart->save();

    //     Session::forget('cart');
    //       return redirect('/');
    // }


    public function storeOrders(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
    
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
    
        $cartModel = new Carts();
        $cartModel->name = $request->name;
        $cartModel->phone = $request->phone;
        $cartModel->email = $request->email;
        $cartModel->cart = serialize($cart);
        $cartModel->save();
    
        Session::forget('cart');
    
        return redirect('/')
            ->with('success', 'Order placed successfully. Thank you for your purchase!');
    }
    
    
}


