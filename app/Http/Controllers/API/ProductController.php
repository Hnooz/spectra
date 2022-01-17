<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Product;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return response()->json(['data' => $products, 'status' => 200]);
    }

}
