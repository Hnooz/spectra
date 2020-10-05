<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required',
            'status' => 'required'
        ]);

        $order = Order::create([
            'table_id' => $request->table_id,
            'status' => $request->status
        ]);

        return response()->json($order);

    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'table_id' => 'required',
            'status' => 'required'
        ]);

        $order->update($data);

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        //
    }
}
