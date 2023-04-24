<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\GuestTable;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function index(Request $request)
    {

        $products = DB::table('products')
            ->join('cart_items', 'products.id', '=', 'cart_items.product_id')
            ->join('users','cart_items.user_id','=','users.id')
            ->select('products.*', 'cart_items.*','users.*')->get();


        $cart_item=CartItem::pluck('id')->isNotEmpty();

        return view('admin.admin',compact('products','cart_item'));

    }

    public function show(Request $request)
    {
        $guest_products=DB::table('guest_items')
            ->join('guest_tables','guest_items.user_id','=','guest_tables.sess_id')
            ->select('guest_items.*','guest_tables.*')->get();

        $guest_id=GuestTable::pluck('id')->isNotEmpty();


        return view('posts.guest',compact('guest_products','guest_id'));
    }

}
