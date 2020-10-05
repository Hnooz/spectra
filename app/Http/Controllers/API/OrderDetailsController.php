<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{

    public function index()
    {
        $orderDetails = OrderDetails::all();

        return response()->json($orderDetails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'meal_id' => 'required',
            'quantity' => 'required'
        ]);

        $orderDetail = OrderDetails::create([
            'order_id' => $request->order_id,
            'meal_id' => $request->meal_id,
            'quantity' => $request->quantity
        ]);

        return response()->json($orderDetail);
    }


    public function update(Request $request, OrderDetails $orderDetails)
    {
        //
    }

    public function destroy(OrderDetails $orderDetails)
    {
        //
    }
}
