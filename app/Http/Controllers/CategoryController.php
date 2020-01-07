<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('id', 'desc')->get();

        return response()->json([
            'categories' => $categories
        ], 200);
    }
    public function store(CategoryRequest $request){

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
    public function edit($id){
        $category = Category::findOrFail($id);

        return response()->json([
            'category' => $category
        ], 200);
    }
    public function update($id, CategoryRequest $request){

        try{

            $category = Category::findOrFail($id);
            $category->update($request->all());

            return response()->json([
                'message' => 'Category updated successfully!'
            ], 200);

        }catch (\Exception $e){

            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
