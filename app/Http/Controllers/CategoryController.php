<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return inertia()->render('Dashboard/categories/index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);

        Category::create($data);

        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
// dd($category);
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Category deleted successfully'
        ]);

        return redirect()->back();
    }
}
