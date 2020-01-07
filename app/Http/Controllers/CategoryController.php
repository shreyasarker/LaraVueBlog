<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
    public function store(Request $request){
        $request->validate([
            'cat_name' => 'required|min:2|max:50'
        ]);
        try{
            Category::create([
                'cat_name' => $request->cat_name
            ]);
            return response()->json([
                'message' => 'Category saved successfully!'
            ], 200);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Category not saved!'
            ], 400);
        }
    }
    public function delete($id){
        try{
           Category::findOrFail($id)->delete();

            return response()->json([
                'message' => 'Category deleted successfully!'
            ], 200);
        }catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
