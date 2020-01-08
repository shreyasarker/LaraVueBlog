<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'desc')->with('user', 'category')->get();

        return response()->json([
            'posts' => $posts,
        ], 200);
    }
}
