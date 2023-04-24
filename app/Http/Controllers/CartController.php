<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $product->id => [
                    'product_id' => $product->product_id,
                    'quantity' => 1,
                    'price' => $product->price,
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$product->id] = [
            'product_id' => $product->product_id,
            'quantity' => 1,
            'price' => $product->price,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request, Product $product)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
