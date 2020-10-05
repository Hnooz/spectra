<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::all();

        return response()->json($meals);
    }

}
