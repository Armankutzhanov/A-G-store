<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $cartItems = $request->session()->get('cart.items');
        $totalAmount = $request->session()->get('cart.totalAmount');
        $user = auth()->user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->customer_phone = $request->input('customer_phone');
        $order->total_amount = $totalAmount;
        $order->save();

        foreach ($cartItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        $request->session()->forget('cart');
        return redirect()->back()->with('success', 'Заказ успешно оформлен.');
    }
}
