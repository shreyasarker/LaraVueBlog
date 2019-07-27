<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost(){
        $posts = Post::with('user', 'category')->get();
        return $posts;
    }
}
