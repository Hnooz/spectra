<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return inertia()->render('Dashboard/orders/index', [
            'orders' => $orders
        ]);
    }
}
