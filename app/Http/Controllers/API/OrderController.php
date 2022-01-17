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
        return response()->json([
            'data' => $orders,
            'status' => 200,
            'error' => false,
            'meassge' => ''
        ]);
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

        return response()->json([
            'data' => $order,
            'status' => 201,
            'error' => false,
            'meassge' => 'data was created successfuly'
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'table_id' => 'required',
            'status' => 'required'
        ]);

        $order->update($data);

        return response()->json([
            'data' => $order,
            'status' => 200,
            'error' => false,
            'meassge' => 'data was updated successfuly'
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'data' => $order,
            'status' => 200,
            'error' => false,
            'meassge' => 'data was deleted successfuly'
        ]);
    }
}
