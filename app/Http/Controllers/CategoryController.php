<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return response()->json([
            'message' => 'Category saved successfully!'
        ], 200);
    }
}
