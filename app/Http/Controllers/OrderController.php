<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $order = Order::create([
            'order_number' => uniqid('ORD-'),
        ]);
        $order->save();

        return response()->json($order->toArray());
    }

    public function getOrder(Request $request, int $id)
    {
        $order = Order::find($id);

        $response = $order->toArray();
        $response['items'] = $order->items()->with('product')->get();

        return response()->json($response);
    }

    public function addItemToOrder(Request $request)
    {
        $productId = $request->input('product_id');
        $orderId = $request->input('order_id');

        if(!$productId || !$orderId) {
            return response()->json([], 400);
        }


        $existing = OrderItem::where('product_id', $productId)
            ->where('order_id', $orderId)
            ->first();

        if($existing) {
            return response()->json([], 403);
        }

        $oi = OrderItem::create([
            'product_id'=> $productId,
            'order_id' => $orderId,
            'quantity' => $request->input('quantity', 1),
        ]);

        $oi->save();

        return response()->json($oi->toArray());
    }
}
