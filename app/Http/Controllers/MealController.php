<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Category;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::all();

        return inertia()->render('Dashboard/meals/index',[
            'meals' => $meals
        ]);

    }


    public function create()
    {
        $categories = Category::all();
        return inertia()->render('Dashboard/meals/create', [
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'image' => 'required',
            'category_id' => 'required',
        ]);

        Meal::create([
            'name' => $request->name,
            'price' => $request->price,
            // 'image' => $request->image,
            'category_id' => $request->category_id
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Meal created successfully'
        ]);

        return redirect()->route('meals.index');
    }

    public function edit(Meal $meal)
    {
        $categories = Category::all();
        return inertia()->render('Dashboard/meals/edit', [
            'meal' => $meal,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Meal $meal)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'image' => 'required',
            'category_id' => 'required',
        ]);

        $meal->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Meal updated successfully'
        ]);

        return redirect()->route('meals.index');

    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Meal deleted successfully'
        ]);

        return redirect()->back();
    }
}
