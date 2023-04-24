<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\GuestItem;
use App\Models\GuestTable;
use App\Models\Product;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index(Request $request)
    {

        $user_id = auth()->user()->id;
        $products = DB::table('products')
            ->join('cart_items', 'products.id', '=', 'cart_items.product_id')
            ->select('products.*', 'cart_items.quantity')
            ->where('user_id', $user_id)->get();

        $title="arc";
        $cart_item=CartItem::pluck('id')->isNotEmpty();
        return view('posts.bascet',compact('title','products','cart_item'));
    }
    public function guest(Request $request)
    {
        $user_id = $request->session()->getId();
        $products = DB::table('products')
            ->join('guest_items', 'products.id', '=', 'guest_items.product_id')
            ->select('products.*', 'guest_items.quantity')
            ->where('user_id', $user_id)->get();

        $title="arc";
        $cart_item=GuestItem::pluck('id')->isNotEmpty();
        return view('posts.guestbasket',compact('title','products','cart_item'));
    }



    public function add(Request $request)
    {
        if (Auth::check()) {
            $user_id =$request->session()->getId();
            $product_id = $request->product_id;
            $products = Product::where('id', $product_id)->pluck('price')->implode('price');
            $cart_item = CartItem::where('product_id', $product_id)->pluck('id')->isNotEmpty();
            $quantity = CartItem::where('product_id', $product_id)->pluck('quantity')->implode('quantity');
            $id = CartItem::where('product_id', $product_id)->where('user_id', $user_id)->pluck('user_id')->implode('user_id');

            if ($cart_item) {
                if ($user_id == $id) {
                    DB::table('cart_items')->where('product_id', $product_id)->where('user_id', $id)->increment('quantity');
                } else {
                    CartItem::create([
                        'product_id' => $product_id,
                        'quantity' => 1,
                        'price' => $products,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            } else {
                CartItem::create([
                    'product_id' => $product_id,
                    'quantity' => 1,
                    'price' => $products,
                    'user_id' => $user_id
                ]);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        } else {

            $user_id = $request->session()->getId();
            $product_id = $request->product_id;
            $products = Product::where('id', $product_id)->pluck('price')->implode('price');
            $user_items = GuestItem::where('product_id', $product_id)->pluck('id')->isNotEmpty();
            $id = GuestItem::where('product_id', $product_id)->where('user_id', $user_id)->pluck('user_id')->implode('user_id');


            if ($user_items) {
                if ($user_id == $id) {
                    DB::table('guest_items')->where('product_id', $product_id)->where('user_id', $id)->increment('quantity');
                } else {
                    GuestItem::create([
                        'product_id' => $product_id,
                        'quantity' => 1,
                        'price' => $products,
                        'user_id' => $user_id
                    ]);
                }
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            } else {
                GuestItem::create([
                    'product_id' => $product_id,
                    'quantity' => 1,
                    'price' => $products,
                    'user_id' => $user_id
                ]);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        }
    }

    public function guestadd(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'sess_id'=>'required'
        ]);

        if (GuestTable::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'sess_id'=>$request->sess_id
        ])){
            return redirect()->home();
        }

        return redirect()->back();
    }

    public function show(Product $product)
    {

        return view('product.index', compact('product'));
    }
}
